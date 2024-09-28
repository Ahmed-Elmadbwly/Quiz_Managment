<?php

namespace App\Services;


use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;



class QuizzesService
{
    public function getQuizzes()
    {
        return Quiz::all();
    }

    public function createQuiz($data)
    {
        $quiz = Quiz::create([
            'title'=>$data->title,
            'description'=>$data->description,
            'createdBy'=>auth()->id(),
            'time'=>$data->time
        ]);

        foreach ($data->questionText as $questionData) {
            $question = Question::create([
                'question_text' => $questionData['text'],
                'quizId' => $quiz->id,
            ]);

            foreach ($questionData['optionText'] as $index => $optionText) {
                Option::create([
                    'optionText' => $optionText,
                    'isCorrect' => ($questionData['isCorrect'] == $index  ? 1 : 0),
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
                'options' => $options->toArray()
            ];
            $content['questions'][] = $questionArray;
        }
        return $content;
    }


}
