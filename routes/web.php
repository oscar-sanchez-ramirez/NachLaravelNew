<?php

use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, 'usuarios'])->name('usuarios');
Route::get('users/export/', [UserController::class,'export'])->name('export');
Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');
Route::get('users/listado', [UserController::class, 'listado'])->name('users.listado');

