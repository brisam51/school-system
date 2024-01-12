<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;



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
    //Student Route
    Route::get('admin/student/list', [StudentController::class, 'List'])->name('admin.student.list');
    Route::get('admin/student/add', [StudentController::class, 'Add']);
    Route::post('admin/student/insert', [StudentController::class, 'Insert'])->name('admin.student.insert');
    Route::get('admin/student/edit/{id}', [StudentController::class, 'Edit'])->name('admin.student.edit');
    Route::post('admin/student/update/{id}', [StudentController::class, 'Update'])->name('admin.student.update');
    Route::get('admin/student/delete/{id}', [StudentController::class, 'Delete'])->name('admin.student.delete');
    Route::get('admin/student/search', [StudentController::class, 'search_student'])->name('admin.student.search');

    //Parent Routes
    Route::get('admin/Parent/list', [ParentController::class, 'List'])->name('admin.parent.list');
    Route::get('admin/parent/add', [ParentController::class, 'Add'])->name('admin.parent.add');
    Route::get('admin/parent/search', [ParentController::class, 'parent_search'])->name('admin.parent.search');
    Route::post('admin/parent/insert', [ParentController::class, 'Insert'])->name('admin.parent.insert');
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'Edit'])->name('admin.parent.edit');
    Route::post('admin/parent/update/{id}', [ParentController::class, 'Update'])->name('admin.parent.update');
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'Delete'])->name('admin.parent.delete');


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
    Route::get('adsubject/newsubject', [SubjectController::class, 'Add']);
    Route::post('admin/subject/insert', [SubjectController::class, 'Insert']);
    Route::get('admin/dsubject/update/{id}', [SubjectController::class, 'UpdateSubjectView'])->name('UpdatSubjecteView');
    Route::post('admin/subject/update/{id}', [SubjectController::class, 'UpdateSubjectPost'])->name('UpdatePostSubject');
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'DeleteSubject'])->name('DeleteSubject');
    Route::get('admin/subject/search', [SubjectController::class, 'SubjectSearch'])->name('SubjectSearch');

    //Assign Subject Routs...
    Route::get('admin/assign-subject/list', [ClassSubjectController::class, 'List']);
    Route::get('admin/assign-subject/add', [ClassSubjectController::class, 'Add']);
    Route::post('admin/assign-subject/insert', [ClassSubjectController::class, 'Insert']);
    Route::get('admin/dassign-subject/update/{id}', [ClassSubjectController::class, 'Edit'])->name('EditView');
    Route::post('admin/assign-subject/update', [ClassSubjectController::class, 'Update'])->name('UpdateAssign');
    Route::get('admin/assign-subject/delete/{id}', [ClassSubjectController::class, 'Delete'])->name('DeleteAssign');
    Route::get('admin/assign-subject/search', [ClassSubjectController::class, 'Search'])->name('AssignSearch');
    // edit single
    Route::get('admin/assign-subject/update-single/{id}', [ClassSubjectController::class, 'Edit_single'])->name('EditView_single');
    Route::post('admin/updatesinglesubject/{id}', [ClassSubjectController::class, 'Update_single'])->name('UpdatSingleSubject');
    //change password
    Route::get('admin/change_password', [UserController::class, 'adminChangePasswordView']);
    Route::post('admin/update_password', [UserController::class, 'adminUpdatePassword']);




});




//Student dashboard
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    //change password
    Route::get('student/change_password', [UserController::class, 'studentPasswordView']);
    Route::post('student/update_password', [UserController::class, 'studentPasswordUpdate']);

});
//Teacher dashboard
Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/change_password', [UserController::class, 'teacherChangePasswordView']);
    Route::post('teacher/update_password', [UserController::class, 'teacherUpdatePassword']);

});
//Parent dashboard
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('parent/change_password', [UserController::class, 'parentChangePasswordView']);
    Route::post('parent/update_password', [UserController::class, 'parentUpdatePassword']);

});

// ===========================Start Reset Password========================

Route::get('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('forget-password', [ForgetPasswordController::class, 'forgetPasswordPost']);
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('restpasswordpost', [ForgetPasswordController::class, 'restePasswordPost']);
// ==========================End Reset Password============================
