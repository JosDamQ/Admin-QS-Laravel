<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Status;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Status Routes
    Route::get('/status', [StatusController:: class, 'index'])->middleware('verified')->name('status.index');
    Route::get('/status/create', [StatusController::class, 'create'])->name('status.create');
    Route::post('/status', [StatusController:: class, 'store'])->middleware('verified')->name('status.store');
    Route::get('/status/{id}/edit', [StatusController:: class, 'edit'])->middleware('verified')->name('status.edit');
    Route::put('/status/{status}', [StatusController:: class, 'update'])->middleware('verified')->name('status.update');
    Route::delete('/status/{status}', [StatusController:: class, 'destroy'])->middleware('verified')->name('status.destroy');

    //Customer Routes
    Route::get('/customers', [CustomerController:: class, 'index'])->middleware('verified')->name('customers.index');

    //Package Routes
    Route::get('/packages', [PackageController:: class, 'index'])->middleware('verified')->name('packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/packages', [PackageController:: class, 'store'])->middleware('verified')->name('packages.store');
    Route::get('/packages/{package}/edit', [PackageController:: class, 'edit'])->middleware('verified')->name('packages.edit');
    Route::put('/packages/{package}', [PackageController:: class, 'update'])->middleware('verified')->name('packages.update');
    Route::delete('/packages/{package}', [PackageController:: class, 'destroy'])->middleware('verified')->name('packages.destroy');

});

require __DIR__.'/auth.php';
