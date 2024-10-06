<?php

use App\Http\Controllers\student\TestController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('student')->controller(TestController::class)->group(function () {
    Route::get('test/{id}', "index")->name("student.test.index");
});
