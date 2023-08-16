<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login controller
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login')->middleware('guest');
    Route::get('/auth', 'index')->name('login')->middleware('guest');
    Route::post('/auth', 'authenticate')->name('auth.verif')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout');
});

// Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Plants controller
Route::resource('plants', PlantController::class, ['except' => ['show']])->middleware('auth');
Route::resource('plants', PlantController::class, ['only' => ['show']]);
Route::post('plants-imp', [PlantController::class,'import'])->name('plants.import');

// Categories controller
Route::resource('categories', CategoryController::class)->middleware('auth');

// Locations controller
Route::resource('locations', LocationController::class)->middleware('auth');
