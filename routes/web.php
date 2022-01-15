<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todo/create', [TodoController::class, 'create']);
Route::get('/todo/update/{id}', [TodoController::class,'edit']);
Route::post('/todo/update/{id}', [TodoController::class, 'update']);
Route::get('/todo/delete/{id}', [TodoController::class, 'remove']);
Route::post('/todo/delete/{id}', [TodoController::class, 'delete']);



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
