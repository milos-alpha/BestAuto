<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProductController::class, 'index'])->name('home.index');
Route::get("/products", [HomeController::class, 'products'])->name('home.products');
Route::get("/products/search", [HomeController::class, 'search'])->name('home.search');

Route::get("/products/add", [ProductController::class,"create"])->name("product.create");
Route::post("/products/add", [ProductController::class,"store"])->name("product.store");
Route::delete("/products/{product}", [ProductController::class,"destroy"])->name("product.delete");

// User handlers
Route::get("/user/register", [UserController::class, 'create'])->name("user.register");
Route::post('/user/register', [UserController::class, 'store'])->name("user.store");
Route::get("/user/login", [UserController::class, 'index'])->name("user.login");
Route::post('/user/login', [AuthController::class, 'login'])->name("user.signup");
Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
Route::get('/dashboard/users/add', [DashboardController::class, 'addUser'])->name('dashboard.addUsers');
Route::post('/dashboard/users/add/create', [DashboardController::class, 'createUsers'])->name('dashboard.createUsers');
Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
Route::get('/dashboard/categories', [DashboardController::class, 'categories'])->name('dashboard.categories');

// cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/edit', [CartController::class, 'edit'])->name('cart.edit');