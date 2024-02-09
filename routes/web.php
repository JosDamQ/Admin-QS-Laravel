<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Status;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
    Route::resource('status', StatusController::class)->middleware('verified');

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
    Route::get('/users', [UserController:: class, 'index'])->middleware(['verified'/*, 'role:master'*/])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware(['verified'/*, 'role:master'*/])->name('users.create');
    Route::post('/users', [UserController:: class, 'store'])->middleware(['verified'/*, 'role:master'*/])->name('users.store');
    Route::get('/users/{user}/edit', [UserController:: class, 'edit'])->middleware(['verified'/*, 'role:master'*/])->name('users.edit');
    Route::put('/users/{user}', [UserController:: class, 'update'])->middleware(['verified'/*, 'role:master'*/])->name('users.update');
    Route::delete('/users/{user}', [UserController:: class, 'destroy'])->middleware(['verified'/*, 'role:master'*/])->name('users.destroy');

    //Rutas para Roles
    Route::get('/roles', [RoleController:: class, 'index'])->middleware(['verified'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware(['verified'])->name('roles.create');
    Route::post('/roles', [RoleController:: class, 'store'])->middleware(['verified'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController:: class, 'edit'])->middleware(['verified'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController:: class, 'update'])->middleware(['verified'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController:: class, 'destroy'])->middleware(['verified'])->name('roles.destroy');


    //Ruta para error
    Route::fallback(function () {
        return redirect('/status');
    });

});

require __DIR__.'/auth.php';
