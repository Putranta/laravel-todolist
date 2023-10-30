<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestOnlyMiddleware;
use App\Http\Middleware\MemberOnlyMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware(GuestOnlyMiddleware::class);
    Route::post('/login', 'doLogin')->middleware(GuestOnlyMiddleware::class);
    Route::post('/logout', 'doLogout')->middleware(MemberOnlyMiddleware::class);
});

Route::controller(TodolistController::class)
    ->middleware(MemberOnlyMiddleware::class)->group(function () {
        Route::get("/todolist", 'todolist');
        Route::post("/todolist", 'addTodo');
        Route::post("/todolist/{id}/delete", 'removeTodo');
    });
