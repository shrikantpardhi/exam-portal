<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;

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
    return view('demo');
});


//user management
Route::post('/register', [App\Http\Controllers\UsersController::class, 'store']);
Route::post('index/login', [UsersController::class, 'login']);

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

//ExamController
Route::get("/viewexam", [ExamController::class, 'index']);
Route::post("/addexam", [ExamController::class, 'addE']);
Route::get("/viewexam/getExam/{id}", [ExamController::class, 'getExam']);
// Route::get("/addexamquestions/{id}", [ExamController::class, 'addExamQuestion']);
Route::get("/addQtoExam", [ExamController::class, 'addQtoExam']);
Route::post("/addquestion", [ExamController::class, 'addQ']);
