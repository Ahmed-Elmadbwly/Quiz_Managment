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
        return view('user.index', ['id' => $id, 'content' => $this->QuizzesService->showQuiz($id)]);
    }

    public function store(Request $request)
    {
        return view('user.submit', ['content' => $this->QuizzesService->submitQuiz($request)]);
    }
    public function show($id)
    {
        return view('user.show',['score'=>$this->QuizzesService->getScore($id),'content'=>$this->QuizzesService->showQuiz($id)]);
    }
}
