<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/register', [RegisterController::class,'index'])->name("register");
Route::post('/register', [RegisterController::class,'storeTutor']);

// Route::get('/details', [TutorDetailsController::class,'index'])->name("details");
Route::get('/details', 'App\Http\Controllers\TutorDetailsController@index')->name("details");
Route::post('/details', 'App\Http\Controllers\TutorDetailsController@storeTutorDetails');


// Route::get('/login', function () {
//     return view('posts.index');
// });

Route::get('/', function () {
    return view('auth.login');
})->name("login");

