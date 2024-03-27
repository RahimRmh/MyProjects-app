<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Taskcontroller;
use App\Models\task;
use Illuminate\Support\Facades\Route;
use carbon\carbon ;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/projects',ProjectController::class)->middleware('auth');
Route::post('/projects/{project}/tasks',[Taskcontroller::class,'store']);
Route::patch('/projects/{project}/tasks/{task}',[Taskcontroller::class,'update']);
Route::delete('/projects/{project}/tasks/{task}',[Taskcontroller::class,'destroy']);
Route::get('/profile',[profileController::class,'index']);
