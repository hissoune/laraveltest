<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Livewire\Counter;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/index', [CategoryController::class, 'index'])->name('categories');
// Route::get('/', [homecontroller::class ,'index'])->name('home.index');
// Route::get('/all', [homecontroller::class ,'all'])->name('home.all');
// Route::resource('/category', CategoryController::class);
// Route::get('/serch', [CategoryController::class, 'search'])->name('category.search');
// Route::resource('/products', ProductsController::class);
// Route::get('/search', [ProductsController::class, 'search'])->name('products.search');

require __DIR__.'/auth.php';
