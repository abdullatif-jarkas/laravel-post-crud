<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::middleware(['auth'])->group(function () {
    // Post routes
    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/add', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    // Category routes
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/add', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/category', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/admin/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

    // ManageUsers routes
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    // Tags routes
    Route::resource('tags', TagController::class);
    
    // Logout route
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});
