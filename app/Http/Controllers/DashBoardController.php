<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DashBoardServices;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public $DashBoardServices;
    public function __construct(DashBoardServices $DashBoardServices){
        $this->DashBoardServices = $DashBoardServices;
    }
    public function index(){
        if(auth()->user()->role == 'admin') {
            return view('dashboard', [
                'students' => $this->DashBoardServices->getStudent(),
                'admin' => $this->DashBoardServices->getAdmin(),
                'quizzes' => $this->DashBoardServices->getQuizzes()
            ]);
        }else{
            return to_route('quizzes.index');
        }
    }
}
