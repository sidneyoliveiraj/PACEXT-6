<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Counter;

// Página pública 
Route::view('/', 'welcome')->name('home');


Route::get('/counter', Counter::class);

// Visitantes (não logados): login e registro
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

// Autenticados: dashboard + logout
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', LogoutController::class)->name('logout');
});
