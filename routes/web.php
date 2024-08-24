<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/users', [UserController::class,'index']);
Route::get('/users', [UserController::class,'index'])->name('index');
Route::get('/add-user', [UserController::class,'add']);
Route::post('/insert-user', [UserController::class,'insert']);
Route::get('/search', [UserController::class, 'search'])->name('search');
