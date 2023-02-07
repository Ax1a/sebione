<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Company Routes
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/add', [CompanyController::class, 'create'])->name('companies.add-company');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit-company');

    // Company Methods
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
    Route::put('/companies/{company}', [CompanyController::class, 'update']);
    Route::get('/companies/search', [CompanyController::class, 'search'])->name('companies.search');

    // Employee Routes
    Route::get('/companies/{company}', [EmployeeController::class, 'index']);
    Route::get('/companies/{company}/add-employee', [EmployeeController::class, 'create'])->name('employees.add-employee');
    Route::get('/companies/{company}/edit-employee/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit-employee');

    // Employee Methods
    Route::post('/companies/{company}/add-employee', [EmployeeController::class, 'store']);
    Route::put('/companies/{company}/edit-employee/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/companies/{company}/delete-employee/{employee}', [EmployeeController::class, 'destroy']);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
