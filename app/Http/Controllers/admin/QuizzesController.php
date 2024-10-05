<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Services\QuizzesService;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{

   public $quizzesService;
    public function __construct(QuizzesService $quizzesService){
        $this->quizzesService = $quizzesService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.quizzes.index',['quizzes'=>$this->quizzesService->getQuizzes()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {
        $this->quizzesService->createQuiz($request);
        return to_route('quizzes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.quizzes.show',['content'=>$this->quizzesService->showQuiz($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.quizzes.edit',['content'=>$this->quizzesService->showQuiz($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizRequest $request, string $id)
    {
        $this->quizzesService->updateQuiz($id,$request);
        return to_route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->quizzesService->deleteQuiz($id);
        return to_route('quizzes.index');
    }
}
