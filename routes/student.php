<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'prefix' => 'student',
    'controller' => TestController::class,
], function () {
    Route::get('test/{id}', 'index')->name('test.index');
    Route::get('showAnswer/{id}', 'show')->name('test.show');
    Route::post('test', 'store')->name('test.store');
});
