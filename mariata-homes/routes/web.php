<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('user.details');
// Route::post('/profile', [ProfileController::class, 'submitDetails'])->name('user.details.submit')->middleware('auth');;
// Route::get('/home', [HomeController::class, 'showUsers'])->name('user.details.list');


// Route::put('/user/update/{id}', [HomeController::class, 'updateDetails'])->name('users.update');
// Route::delete('/home/{id}', [HomeController::class, 'deleteUser'])->name('users.delete');
// Route::get('/users/edit/{id}', [HomeController::class, 'edit'])->name('users.edit');


// Route::get('/userDetails/edit/{id}', [HomeController::class, 'editDetails'])->name('user.details.edit');
// Route::put('/userDetails/update/{id}', [HomeController::class, 'updateUser'])->name('user.details.update');
// Route::delete('/userDetails/delete/{id}', [HomeController::class, 'deleteUserDetails'])->name('user.details.delete');




// //Home or Dashboard Management 

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('dashboard.search');
Route::post('/home', [HomeController::class, 'adminSubmitApplication'])->name('admin.application.create');
Route::get('/addApplication', [HomeController::class, 'adminAddApplicationView'])->name('addApplication');


// // Profile Management 

Route::get('/profile', [ApplicantProfileController::class, 'index'])->middleware('auth')->name('applicant.profile');
Route::post('/profile', [ApplicantProfileController::class, 'submitApplication'])->middleware('auth')->name('application.submit');

// //CRUD on Applicant or Registered User
Route::get('/applicant/details/{id}', [ApplicantController::class, 'getApplicantById'])->name('applicant.get');
Route::put('/applicant/update/{id}', [ApplicantController::class, 'updateApplicantById'])->name('applicant.update');
Route::delete('/applicant/delete/{id}', [ApplicantController::class, 'deleteApplicantById'])->name('applicant.delete');
Route::get('/applicant/search', [ApplicantController::class, 'searchApplicant'])->name('applicant.search');


// //CRUD on Applications or Submitted Forms
Route::get('/application/details/{id}', [ApplicationController::class, 'getApplicationById'])->name('application.get');
Route::put('/application/update/{id}', [ApplicationController::class, 'updateApplicationById'])->name('application.update');
Route::delete('/application/delete/{id}', [ApplicationController::class, 'deleteApplicationById'])->name('application.delete');
Route::get('/application/search', [ApplicationController::class, 'searchApplication'])->name('application.search');
