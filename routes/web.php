<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;


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

//     //Rout for access dashboard
// Route::get('admin/dashboard',function(){
//     return view('admin.dashboard');
// });
//Rout for login
Route::get('/', [AuthController::class, 'login']);









Route::post('login', [AuthController::class, 'authlogin']);

Route::get('logout', [AuthController::class, 'Logout']);
Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);



//Admin dashboard
Route::group(['middleware' => 'admin'], function () {
    //Admin Routes
    Route::get('admin/list', [AdminController::class, 'adminList']);
    Route::get('admin/newadmin', [AdminController::class, 'newAdmin']);
    Route::post('admin/insert', [AdminController::class, 'insertNewAdmin']);
    Route::get('admin/update/{id}', [AdminController::class, 'updatAdmin']);
    Route::post('admin/update/{id}', [AdminController::class, 'updateAdminPost'])->name('updateadmin');
    Route::get('admin/delete/{id}', [AdminController::class, 'adminDelete']);
    Route::post('admin/search', [AdminController::class, 'AdminSearch']);
    //Class route
    Route::get('admin/class/list', [ClassController::class, 'List']);
    Route::get('admin/class/newclass', [ClassController::class, 'NewClass']);
    Route::post('admin/class/insert', [ClassController::class, 'insertNewClass']);
    Route::get('admin/class/update/{id}', [ClassController::class, 'updateClassView'])->name('classUpdateView');
    Route::post('admin/class/update/{id}', [ClassController::class, 'updateClassPost'])->name('updateClass');
    Route::get('admin/class/delete/{id}', [ClassController::class, 'classDelete'])->name('classDelete');
    Route::get('admin/class/search', [ClassController::class, 'classSearch']);
    //Subject Routes
    Route::get('admin/subject/list', [SubjectController::class, 'List']);
    Route::get('adsubject/newclass', [SubjectController::class, 'NewClass']);
    Route::post('admin/subject/insert', [SubjectController::class, 'insertNewClass']);
    Route::get('adsubject/update/{id}', [SubjectController::class, 'updateClassView'])->name('classUpdateView');
    Route::post('admin/subject/update/{id}', [SubjectController::class, 'updateClassPost'])->name('updateClass');
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'classDelete'])->name('classDelete');
    Route::get('adsubject/search', [SubjectController::class, 'classSearch']);

});




//Student dashboard
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

});
//Teacher dashboard
Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

});
//Parent dashboard
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

});

// ===========================Start Reset Password========================

Route::get('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('forget-password', [ForgetPasswordController::class, 'forgetPasswordPost']);
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('restpasswordpost', [ForgetPasswordController::class, 'restePasswordPost']);
// ==========================End Reset Password============================
