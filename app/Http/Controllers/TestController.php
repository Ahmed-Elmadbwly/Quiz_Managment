<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Services\QuizzesService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $QuizzesService;
    public function __construct(QuizzesService $QuizzesService)
    {
        $this->QuizzesService = $QuizzesService;
    }
    public function index($id)
    {
        $quiz = Quiz::find($id);

        // check if quiz in done or no
        $quizAttempt = QuizAttempt::where('quizId', $quiz->id)->first();
        if ($quizAttempt) {
            return view('user.submit', ['content' => $quizAttempt]);
        }
        
        return view('user.index', ['id' => $id, 'content' => $this->QuizzesService->showQuiz($id)]);
    }

    public function store(Request $request)
    {
        return view('user.submit', ['content' => $this->QuizzesService->submitQuiz($request)]);
    }
}