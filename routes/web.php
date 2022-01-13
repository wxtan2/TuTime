<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterTutorController;
use App\Http\Controllers\Auth\RegisterStudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SettingController;

use App\Http\Controllers\TutorDetailsController;
use App\Http\Controllers\StudentDetailsController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\studentClassController;
use App\Http\Controllers\studentEnrollController;
use App\Http\Controllers\classDetailsController;
use App\Http\Controllers\StudentClassDetailsController;

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

Auth::routes(['verify' => true]);

Route::get('/register', [RegisterTutorController::class,'index'])->name("registerTutor");
Route::post('/register', [RegisterTutorController::class,'storeTutor']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/register/student', [RegisterStudentController::class,'index'])->name("registerStudent");
Route::post('/register/student', [RegisterStudentController::class,'storeStudent']);

Route::get('/register/details', [TutorDetailsController::class,'index'])->name("detailsTutor");
Route::post('/register/details', [TutorDetailsController::class,'storeTutorDetails']);

// Route::get('/register/details', 'App\Http\Controllers\TutorDetailsController@index')->name("detailsTutor");
// Route::post('/register/details', 'App\Http\Controllers\TutorDetailsController@storeTutorDetails');

Route::get('/register/student/details', [StudentDetailsController::class,'index'])->name("detailsStudent");
Route::post('/register/student/details', [StudentDetailsController::class,'storeStudentDetails']);

Route::get('/settings', [SettingController::class,'index'])->name("settings")->middleware('verified');
Route::post('/settings', [SettingController::class,'editDetails']);

Route::get('dashboard', [FullCalenderController::class, 'index'])->name("dashboard")->middleware('verified');
Route::post('dashboard', [FullCalenderController::class, 'ajax']);


Route::get('/classes', function () {
  return view('tutor.tutorClass');
})->name("classes")->middleware('auth:web')->middleware('verified');

Route::get('/class', [studentClassController::class, 'index'])->name("classStudent")->middleware('verified');

Route::get('/enroll', [studentEnrollController::class, 'index'])->name("enrollStudent")->middleware('verified');
Route::post('/enroll', [studentEnrollController::class, 'func']);


// Route::post('class', [studentClassController::class, 'ajax']);

// Route::get('/timetable', function () {
//   return view('tutor.tutorTB');
// });

Route::get('/settings#Account', function () {
  return view('setting');
})->name("settingsAcc")->middleware('verified');

Route::get('/classes/details',[classDetailsController::class, 'index'])->name("classDetails")->middleware('verified');
Route::post('/classes/details',[classDetailsController::class, 'func']);

 Route::get('/student', function () {
   return view('tutor.tutorStudent');
})->name("student")->middleware('verified')->middleware('auth:web');

Route::get('/student/details',[StudentClassDetailsController::class, 'index'])->name("studentDetails")->middleware('verified');

Route::get('/', function () {
  return redirect()->route('dashboard');
})->middleware('verified')->middleware('auth:web,students');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
