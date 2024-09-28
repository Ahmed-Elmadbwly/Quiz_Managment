<?php

use App\Http\Controllers\admin\QuizzesController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::middleware('auth')->prefix('admin')->controller(QuizzesController::class)->group(function () {
    Route::get("/quizzes", "index")->name("quizzes.index");
    Route::get("/quiz/create", "create")->name("quiz.create");
    Route::post("/quiz", "store")->name("quiz.store");
    Route::get("/quiz/{id}/show", "show")->name("quiz.show");
    Route::get("/quiz/{id}/edit", "edit")->name("quiz.edit");
    Route::post("/quiz/{id}", "update")->name("quiz.update");
    Route::delete("/quiz/{id}", "delete")->name("quiz.delete");
});
