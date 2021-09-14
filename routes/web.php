<?php

use App\Http\Controllers\ContinentController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/equipes', EquipeController::class);

Route::resource('/joueurs', JoueurController::class);

Route::resource('/continents', ContinentController::class);

Route::resource('/roles', RoleController::class);

Route::resource('/photos', PhotoController::class);
