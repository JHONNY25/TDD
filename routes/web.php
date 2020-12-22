<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [TaskController::class, 'index'])->name('home');
    Route::get('/get-task', [TaskController::class, 'getTask'])->name('getTask');
    Route::get('/create-task', [TaskController::class, 'create'])->name('createTask');
    Route::post('/save-task', [TaskController::class, 'store'])->name('saveTask');
});
