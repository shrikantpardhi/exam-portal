<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionController;

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
    return view('/dashboard');
});


//user management
Route::post('/register', [App\Http\Controllers\UsersController::class, 'store']);
Route::post('/login', [UsersController::class, 'login']);

//dashboard controller Navigation
Route::get('/dashboard', [DashboardController::class, 'index']);

// SubjectController
Route::get('/subject', [SubjectController::class, 'index']);
Route::post('/addsubject', [SubjectController::class, 'addsubject']);
Route::get('/deletesubject/{id}', [SubjectController::class, 'deleteSubject']);
Route::post('/addcategory', [SubjectController::class, 'addcategory']);
Route::get('/deleteCategory/{id}', [SubjectController::class, 'deleteCategory']);

// QuestionController
Route::get('/questions', [QuestionController::class, 'index']);
Route::post('/addquestion', [QuestionController::class, 'addquestion']);

//
