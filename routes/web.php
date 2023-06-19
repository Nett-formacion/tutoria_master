<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/',[MainController::class,"index"]);


Route::get("prueba", function () {
    return view("prueba");
});
Route::get("about", fn() => view("about"));
Route::view("contact", "contacta")->name("contacta");
Route::view("proyectos", "proyectos");
Route::get("alumnos/{numero}", fn($num) => "<h1>Valor del almuno $num</h1>")
    ->where("numero", "[0-9]*");

Route::fallback(function () {
    $ruta = request()->getRequestUri();
    return "<h1>La ruta $ruta no existe</h1> ";


});

