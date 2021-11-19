<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterTutorController;
use App\Http\Controllers\Auth\RegisterStudentController;
use App\Http\Controllers\Auth\TutorDetailsController;
use App\Http\Controllers\StudentDetailsController;



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
// Route::get('/', function () {
//     return view('auth.register');
// });

Route::get('/register', [RegisterTutorController::class,'index'])->name("registerTutor");
Route::post('/register', [RegisterTutorController::class,'storeTutor']);

Route::get('/register/student', [RegisterStudentController::class,'index'])->name("registerStudent");
Route::post('/register/student', [RegisterStudentController::class,'storeStudent']);

Route::get('/register/details', 'App\Http\Controllers\TutorDetailsController@index')->name("detailsTutor");
Route::post('/register/details', 'App\Http\Controllers\TutorDetailsController@storeTutorDetails');

Route::get('/register/student/details', [StudentDetailsController::class,'index'])->name("detailsStudent");
Route::post('/register/student/details', [StudentDetailsController::class,'storeStudentDetails']);


 Route::get('/dashboard', function () {
   return view('layout.nav');
})->name("dashboard");

Route::get('/', function () {
    return view('auth.login');
})->name("login");

