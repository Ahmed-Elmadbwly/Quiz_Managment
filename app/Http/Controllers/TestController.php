<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Services\QuizzesService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $QuizzesService;
    public function __construct(QuizzesService $QuizzesService)
    {
        $this->QuizzesService=$QuizzesService;
    }
    public function index($id){
        return view('user.index',['id'=>$id,'content'=>$this->QuizzesService->showQuiz($id)]);
    }
}