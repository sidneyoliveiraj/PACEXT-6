<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter; 


// Esta é a rota que já existia (página inicial)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);