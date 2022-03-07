<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/hola/{name}', function(string $name){
    return "Hola {$name}";
});

/*
 * Route::get('/empleados', function (){
    return view('templates.index');
});
 */

Route::get('/employees', [EmpleadosController::class, 'index'])->name('empleados');
Route::post('/employees', [EmpleadosController::class, 'store'])->name('empleados');

Route::get('/employees/{id}', [EmpleadosController::class, 'show'])->name('empleados-edit');
Route::patch('/employees/{id}', [EmpleadosController::class, 'update'])->name('empleados-update');
Route::delete('/employees/{id}', [EmpleadosController::class, 'destroy'])->name('empleados-destroy');

Route::resource('categories', CategoriesController::class);
