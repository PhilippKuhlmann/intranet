<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UTMController;
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





Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('welcome');
    });

    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');




    //UTM
    Route::get('/utm', [UTMController::class, 'index'])->name('utm.index');
    Route::post('/utm', [UTMController::class, 'store'])->name('utm.store');
    Route::get('/utm/create', [UTMController::class, 'create'])->name('utm.create');
    Route::get('/utm/{utm}', [UTMController::class, 'edit'])->name('utm.edit');
    Route::patch('/utm/{utm}', [UTMController::class, 'update'])->name('utm.update');
    Route::delete('/utm/{utm}', [UTMController::class, 'destroy'])->name('utm.destroy');

    // Service
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/service/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::patch('/service/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
