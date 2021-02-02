<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

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
// Auth::routes();

Route::get('/', function () {
    return view('index');
});


//user management
Route::post('/register', [App\Http\Controllers\UsersController::class, 'store']);
Route::post('/login', [UsersController::class, 'login']);

//dashboard controller
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/subject', [DashboardController::class, 'subject']);