<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;


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


Route::get('/profile', function () {
    return view('profile');
})->name('profile');








// Display the profile edit form
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

// Handle the profile update (including profile picture upload)
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');



Route::get('/', [ImageController::class, 'index'])->name('gallery');
Route::get('/upload', [ImageController::class, 'create'])->name('upload.form');
Route::post('/upload', [ImageController::class, 'store'])->name('upload.store');


use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);






