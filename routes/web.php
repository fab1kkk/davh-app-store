<?php

use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\panel\DashboardController;
use App\Http\Controllers\admin\panel\ProductController as AdminProductController;
use App\Http\Controllers\admin\panel\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\products\ProductCategoryController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/find', [SearchController::class, 'index'])->name('search.index');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/categories', [ProductCategoryController::class, 'index'])->name('category.index');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product:slug}', [ProductController::class, 'showEach'])->name('product.showEach');
Route::get('/categories/{category:slug}/products', [ProductController::class, 'showAllPerCategory'])->name('product.showAllPerCategory');

Route::prefix('admin')->middleware('admin.auth')->name('admin.dashboard.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('/dashboard/products', [AdminProductController::class, 'index'])->name('products');
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
});
