<?php

namespace App\Services;


use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Auth;



class QuizzesService
{
    public function getQuizzes()
    {
        return Quiz::all();
    }

    public function createQuiz($data)
    {

        $quiz = Quiz::create([
            'title' => $data->title,
            'description' => $data->description,
            'createdBy' => auth()->id(),
            'time' => $data->time
        ]);

        foreach ($data->questionText as $questionData) {
            $question = Question::create([
                'question_text' => $questionData['text'],
                'quizId' => $quiz->id,
                'score' => $questionData['score'],
            ]);

            foreach ($questionData['optionText'] as $index => $optionText) {
                Option::create([
                    'optionText' => $optionText,
                    'isCorrect' => ($questionData['isCorrect'] == $index ? 1 : 0),
                    'questionId' => $question->id,
                ]);
            }
        }
    }

    public function showQuiz($id)
    {
        $quiz = Quiz::find($id);

        $content['quizId'] = $quiz->id;
        $content['title'] = $quiz->title;
        $content['description'] = $quiz->description;
        $content['time'] = $quiz->time;
        $content['questions'] = [];
        $questions = Question::where('quizId', $quiz->id)->get();
        foreach ($questions as $question) {
            $options = Option::where('questionId', $question->id)->get();
            $questionArray = [
                'id' => $question->id,
                'questionText' => $question->question_text,
                'score' => $question->score,
                'options' => $options->toArray()
            ];
            $content['questions'][] = $questionArray;
        }

        return $content;
    }

    public function submitQuiz($request)
    {
        $validatedData = $request->validate([
            'quiz_id' => 'required|integer',
            'time' => 'required|integer',
            'questionText.*.questionId' => 'required|integer',
            'questionText.*.optionText.*' => 'required|string',
            'questionText.*.isCorrect' => 'nullable|integer',
        ]);

        $quizId = $validatedData['quiz_id'];
        // $timeTaken = $validatedData['time'];
        $questions = $validatedData['questionText'];
        $userId = Auth::id();
        $totalScore = 0;

        foreach ($questions as $question) {
            $questionId = $question['questionId'];
            $isCorrect = $question['isCorrect'] ?? null;
            $options = $question['optionText'];
            $score = Question::where('id', $questionId)->value('score');

            foreach ($options as $optionId => $option) {
                $optionTrue = Option::where('id', $isCorrect)->where('isCorrect', 1)->first();
            }

            // calc score question
            if ($optionTrue) {
                $totalScore += $score;
            }
        }

        // Store score in quiz_attempts
        $content = QuizAttempt::create([
            'userId' => $userId,
            'quizId' => $quizId,
            'score' => $totalScore,
        ]);

        return $content;
    }

    public function updateQuiz($id, $data)
    {
        $quiz = Quiz::find($id);
        $quiz->update([
            'title' => $data->title,
            'description' => $data->description,
            'time' => $data->time,
        ]);
        foreach ($data->questionText as $questionData) {
            $question = Question::where('quizId', $quiz->id)->where('id', $questionData['questionId'])->first();
            if ($question) {
                $question->update(['questionText' => $questionData['text'], 'score' => $questionData['score']]);
                $i = 1;
                foreach ($questionData['optionText'] as $index => $optionText) {
                    $option = Option::where('questionId', $question->id)->where('id', $index)->first();
                    if ($option) {
                        $option->update([
                            'optionText' => $optionText,
                            'isCorrect' => ($questionData['isCorrect'] == $i ? 1 : 0),
                        ]);
                    }
                    $i++;
                }
            }
        }
    }
    public function deleteQuiz($id)
    {
        $quiz = Quiz::find($id);
        foreach ($quiz->questions as $question) {
            $question->options()->delete();
            $question->delete();
        }
        $quiz->delete();
    }

}
