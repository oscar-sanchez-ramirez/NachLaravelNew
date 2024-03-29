<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users', [UserController::class,'index'])->name('users.index');
Route::get('test', [UserController::class, 'test'])->name('test');
Route::post('testPost', [UserController::class, 'testPost'])->name('testPost');
Route::post('testEdit/{user}', [UserController::class, 'testEdit'])->name('testEdit');
Route::post('correo', [UserController::class, 'correo'])->name('correo');





