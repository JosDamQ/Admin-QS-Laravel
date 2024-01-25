<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->middleware('verified')->name('dashboard');
    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');*/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/status', function () {
        return view('statuses.index');
    })->middleware('verified')->name('status.index');
    Route::get('/packages', function () {
        return view('packages.index');
    })->middleware('verified')->name('packages.index');
    Route::get('/customers', function () {
        return view('customers.index');
    })->middleware('verified')->name('customers.index');
    Route::get('/prueba', function () {
        return view('prueba.index');
    })->middleware('verified')->name('prueba.index');
});

require __DIR__.'/auth.php';
