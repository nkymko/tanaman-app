<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlantController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth', 'index')->name('login');
    Route::post('/auth', 'authenticate')->name('auth.verif');
    Route::get('/logout', 'logout')->name('logout');
})->middleware('guest');

Route::resource('plants', PlantController::class, ['except' => ['show']])->middleware('auth');
Route::resource('plants', PlantController::class, ['only' => ['show']]);
