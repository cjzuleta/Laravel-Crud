<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
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


Route::get('/tareas', [TodosController::class,'index'])->name('todos'); 

Route::post('/tareas', [TodosController::class,'store'])->name('todos'); //enviar 

Route::get('/tareas/{id}', [TodosController::class,'show'])->name('todos-edit');//mostrar un elemento individualmente
Route::patch('/tareas/{id}', [TodosController::class,'store'])->name('todos-update'); //actualiza tal cual

Route::delete('/tareas{id}', [TodosController::class,'destroy'])->name('todos-destroy'); //eliminar

Route::resource('categories', CategoriesController::class);

