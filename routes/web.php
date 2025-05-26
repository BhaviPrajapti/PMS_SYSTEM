<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
// Project Route
Route::get('/index', [ProjectController::class, 'index'])->name('index');
Route::post('/store', [ProjectController::class, 'store'])->name('addproject');
Route::get('/list', [ProjectController::class, 'get'])->name('listproject');
Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('editproject');
Route::post('/update/{id}', [ProjectController::class, 'update'])->name('updateproject');
Route::delete('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');

// Task Route
Route::get('/index', [TaskController::class, 'index'])->name('index');
Route::post('/store', [TaskController::class, 'store'])->name('addtask');
Route::get('/list', [TaskController::class, 'get'])->name('list');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('delete');
