<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\AlumnoController;

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
    return view('main');
})->name("main");


Route::get("alumnos/paginate",[AlumnoController::class ,'get_paginate']);
Route::view("about","nav.about")->name("about");
Route::resource("alumnos", AlumnoController::class);


//Route::get("alumnos",[\App\Http\Controllers\AlumnosControler::class,"index"])
//    ->name("alumnos")
//    ->middleware("auth");;
Route::view("proyectos","nav.proyectos")
    ->name("proyectos")
    ->middleware("auth");

Route::view("contacta","nav.contacta")
    ->name("contacta");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


