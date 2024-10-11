<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'prefix' => 'student',
    'as' => 'student.',
    'controller' => TestController::class,
], function () {
    Route::get('test/{id}', 'index')->name('test.index');
    Route::post('test', 'store')->name('test.store');
});