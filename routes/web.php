<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Company Routes
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/add', [CompanyController::class, 'create'])->name('companies.add-company');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit']);
    Route::get('/companies/{company}', [CompanyController::class, 'show']);

    // Company Methods
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.index');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
    Route::put('/companies/{company}', [CompanyController::class, 'update']);

    // Employee Routes
    Route::get('/companies/{company}/add', [EmployeeController::class, 'create'])->name('employees.add-employee');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
