<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;


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

//タスク管理システム
Route::get('/', [AuthController::class, 'index']);
Route::get('/task/list', [TaskController::class, 'list']);
Route::post('/login', [AuthController::class, 'login']);

//テスト用
Route::get('/welcome', [WelcomeController::class, 'index']);
Route::get('/welcome/second', [WelcomeController::class, 'second']);

//form入力テスト用
Route::get('/test', [Testcontroller::class, 'index']);
Route::post('/test/input', [TestController::class, 'input']);