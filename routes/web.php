<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;





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
Route::get('/gallery', [ImageController::class, 'index'])->name('gallery');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});


Auth::routes();


use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return view('home'); // Make sure `resources/views/home.blade.php` exists
})->name('home');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


//ckd


use App\Http\Controllers\ImageUploadController;

Route::get('/post-form', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store'])->name('post.store');

// ✅ Image upload for CKEditor
Route::post('/upload/image', [ImageUploadController::class, 'upload']);

use App\Http\Controllers\UploadController;

Route::post('/upload/image', [UploadController::class, 'upload'])->name('ckeditor.upload');
