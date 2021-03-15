<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('house', App\Http\Controllers\HouseController::class);

Route::resource('car', App\Http\Controllers\CarsController::class);

Route::resource('parking', App\Http\Controllers\ParkingController::class);

Route::resource('parkingTypes', App\Http\Controllers\ParkingTypesController::class);

Route::resource('rent', App\Http\Controllers\RentsController::class);
