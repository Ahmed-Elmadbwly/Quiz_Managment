<?php

use App\Http\Controllers\admin\QuizzesController;
use App\Http\Controllers\admin\ResultsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashBoardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->prefix('admin')->controller(QuizzesController::class)->group(function () {
    Route::get("/quizzes", "index")->name("quizzes.index");
    Route::get("/quiz/create", "create")->name("quiz.create");
    Route::post("/quiz", "store")->name("quiz.store");
    Route::post("/quiz/results", "store")->name("quiz.results");
    Route::get("/quiz/{id}/show", "show")->name("quiz.show");
    Route::get("/quiz/{id}/edit", "edit")->name("quiz.edit");
    Route::post("/quiz/{id}", "update")->name("quiz.update");
    Route::delete("/quiz/{id}", "delete")->name("quiz.delete");
});

Route::middleware('auth')->prefix('admin')->controller(UserController::class)->group(function () {
    Route::get("/{role}", "index")->name("student.index");
    Route::get("/{role}/create", "create")->name("student.create");
    Route::post("/{role}", "store")->name("student.store");
    Route::get("/{role}/{id}/edit", "edit")->name("student.edit");
    Route::post("/{role}/{id}", "update")->name("student.update");
    Route::delete("/{role}/{id}", "delete")->name("student.delete");
});

Route::middleware('auth')->prefix('admin')->controller(ResultsController::class)->group(function () {
    Route::get("/results/{id}", "show")->name("results.show");
});
