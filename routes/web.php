<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Status;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;

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
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController:: class, 'store'])->middleware('verified')->name('customers.store');
    Route::get('/customers/{customer}/edit', [CustomerController:: class, 'edit'])->middleware('verified')->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController:: class, 'update'])->middleware('verified')->name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController:: class, 'destroy'])->middleware('verified')->name('customers.destroy');

    //Package Routes
    Route::get('/packages', [PackageController:: class, 'index'])->middleware('verified')->name('packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/packages', [PackageController:: class, 'store'])->middleware('verified')->name('packages.store');
    Route::get('/packages/{package}/edit', [PackageController:: class, 'edit'])->middleware('verified')->name('packages.edit');
    Route::put('/packages/{package}', [PackageController:: class, 'update'])->middleware('verified')->name('packages.update');
    Route::delete('/packages/{package}', [PackageController:: class, 'destroy'])->middleware('verified')->name('packages.destroy');

    //Rutas para Users
    Route::get('/users', [UserController:: class, 'index'])->middleware('verified')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('verified')->name('users.create');
    Route::post('/users', [UserController:: class, 'store'])->middleware('verified')->name('users.store');
    Route::get('/users/{user}/edit', [UserController:: class, 'edit'])->middleware('verified')->name('users.edit');
    Route::put('/users/{user}', [UserController:: class, 'update'])->middleware('verified')->name('users.update');
    Route::delete('/users/{user}', [UserController:: class, 'destroy'])->middleware('verified')->name('users.destroy');

    //Ruta para error
    Route::fallback(function () {
        return redirect('/status');
    });

});

require __DIR__.'/auth.php';
