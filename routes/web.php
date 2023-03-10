<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [AdminController::class, 'main']);

Route::get('/login',function(){
  return view('login');
});

Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/admin',[AdminController::class,'index'])->middleware('auth');

Route::group(['middleware' => 'auth'],function(){
    Route::post('/addProject',[AdminController::class, 'addProject']);
    Route::post('/updateProject',[AdminController::class, 'updateProject']);
    Route::post('/deleteProject',[AdminController::class, 'deleteProject']);
});
