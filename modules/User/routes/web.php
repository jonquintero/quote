<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {

    Route::resource('users', UsersController::class);
    Route::put('users/{user}/restore', [UsersController::class, 'restore'])
        ->name('users.restore');

});

