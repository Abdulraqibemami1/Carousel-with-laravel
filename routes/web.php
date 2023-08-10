<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarouselController;

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

Route::get('/',[CarouselController::class,'index']);
Route::get('/dashboard',[CarouselController::class,'dashboard']);
Route::get('/create', [CarouselController::class,'create'])->name('create');
Route::post('/save', [CarouselController::class,'store'])->name('save');
Route::get('/show/{id}', [CarouselController::class,'show'])->name('show');
Route::get('/edit/{id}', [CarouselController::class,'edit'])->name('edit');
Route::put('/update/{id}', [CarouselController::class,'update'])->name('update');
Route::delete('remove/{id}', [CarouselController::class,'destroy'])->name('remove');