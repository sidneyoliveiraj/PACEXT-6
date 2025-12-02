<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes - Authentication
|--------------------------------------------------------------------------
*/

// Rotas de Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas de Registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rotas de Recuperação de Senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Web Routes - Public
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produtos (Público)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Serviços (Público)
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Carrinho (Público)
Route::get('/cart', function () {
    return view('cart.index');
})->name('cart.index');

/*
|--------------------------------------------------------------------------
| Web Routes - Customer (Authenticated)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Perfil do usuário
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

    // Pedidos
    Route::get('/orders', function () {
        return view('orders.index');
    })->name('orders.index');

    Route::get('/orders/{id}', function ($id) {
        return view('orders.show', compact('id'));
    })->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| Web Routes - Admin (Authenticated + Admin Role)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Produtos
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    // Serviços
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

    // Pedidos
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('orders.index');

    Route::get('/orders/{id}', function ($id) {
        return view('admin.orders.show', compact('id'));
    })->name('orders.show');

    // Relatórios
    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports');
});