<?php

use App\Http\Controllers\backend\BackendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/add-caregory', [BackendController::class, 'addCategory'])->name('add-caregory');
Route::post('/store-category', [BackendController::class, 'storeCategory'])->name('store-category');
