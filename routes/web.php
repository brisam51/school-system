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
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassToTeacherController;
use App\Http\Controllers\ClassTimeTableController;
use App\Http\Controllers\ExamController;




//===============================Rout for login=====================
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authlogin']);
Route::get('logout', [AuthController::class, 'Logout']);
Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

//===================================Admin dashboard=================
//===================================================================
Route::group(['middleware' => 'admin'], function () {

    //================================Admin Routes=======================
    Route::get('admin/list', [AdminController::class, 'adminList'])->name('admin.list');
    Route::get('admin/new_admin', [AdminController::class, 'newAdmin']);
    Route::post('admin/insert', [AdminController::class, 'insertNewAdmin']);
    Route::get('admin/update/{id}', [AdminController::class, 'updatAdmin']);
    Route::post('admin/update/{id}', [AdminController::class, 'updateAdminPost'])->name('updateadmin');
    Route::get('admin/delete/{id}', [AdminController::class, 'adminDelete']);
    Route::post('admin/search', [AdminController::class, 'AdminSearch']);

    //===============================admin accunt====================
    Route::get('admin/account', [UserController::class, 'admin_Account_view'])->name('admin.myaccount');
    Route::post('admin/account/update', [UserController::class, 'admin_Account_Update']);
    Route::get('admin/My_account', [UserController::class, 'myAccount'])->name('admin.myaccount');
    Route::post('admin/teacher/update', [UserController::class, 'admin_Account_Update']);

    //==============================Student Route==============================
    Route::get('admin/student/list', [StudentController::class, 'List'])->name('admin.student.list');
    Route::get('admin/student/add', [StudentController::class, 'Add']);
    Route::post('admin/student/insert', [StudentController::class, 'Insert'])->name('admin.student.insert');
    Route::get('admin/student/edit/{id}', [StudentController::class, 'Edit'])->name('admin.student.edit');
    Route::post('admin/student/update/{id}', [StudentController::class, 'Update'])->name('admin.student.update');
    Route::get('admin/student/delete/{id}', [StudentController::class, 'Delete'])->name('admin.student.delete');
    Route::get('admin/student/search', [StudentController::class, 'search_student'])->name('admin.student.search');


    //===========================teacher route=============================
    Route::get('admin/teacher/list', [TeacherController::class, 'List'])->name('admin.teacher.list');
    Route::get('admin/teacher/add', [TeacherController::class, 'Add'])->name('admin.teacher.add');
    Route::post('admin/teacher/insert', [TeacherController::class, 'Insert'])->name('admin.teacher.insert');
    Route::get('admin/teacher/edit_view/{id}', [TeacherController::class, 'edit_view'])->name('admin.teacher.edit');
    Route::post('admin/teacher/update/{id}', [TeacherController::class, 'Update'])->name('admin.teacher.update');
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'Delete'])->name('admin.teacher.delete');
    Route::get('admin/teacher/search', [TeacherController::class, 'Search'])->name('admin.teacher.search');



    //==========================Parent Routes================
    Route::get('admin/Parent/list', [ParentController::class, 'List'])->name('admin.parent.list');
    Route::get('admin/parent/add', [ParentController::class, 'Add'])->name('admin.parent.add');
    Route::get('admin/parent/search', [ParentController::class, 'parent_search'])->name('admin.parent.search');
    Route::post('admin/parent/insert', [ParentController::class, 'Insert'])->name('admin.parent.insert');
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'Edit'])->name('admin.parent.edit');
    Route::post('admin/parent/update/{id}', [ParentController::class, 'Update'])->name('admin.parent.update');
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'Delete'])->name('admin.parent.delete');
    Route::get('admin/parent/search', [ParentController::class, 'Search'])->name('admin.parent.search');
    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{id}', [ParentController::class, 'AssignStudentParentDelete']);

    //===================Class route===============
    Route::get('admin/class/list', [ClassController::class, 'List'])->name('admin.class.list');
    Route::get('admin/class/newclass', [ClassController::class, 'NewClass']);
    Route::post('admin/class/insert', [ClassController::class, 'insertNewClass']);
    Route::get('admin/class/update/{id}', [ClassController::class, 'updateClassView'])->name('classUpdateView');
    Route::post('admin/class/update/{id}', [ClassController::class, 'updateClassPost'])->name('updateClass');
    Route::get('admin/class/delete/{id}', [ClassController::class, 'classDelete'])->name('classDelete');
    Route::get('admin/class/search', [ClassController::class, 'classSearch']);

    //====================Subject Routes===========================
    Route::get('admin/subject/list', [SubjectController::class, 'List']);
    Route::get('adsubject/newsubject', [SubjectController::class, 'Add']);
    Route::post('admin/subject/insert', [SubjectController::class, 'Insert']);
    Route::get('admin/dsubject/update/{id}', [SubjectController::class, 'UpdateSubjectView'])->name('UpdatSubjecteView');
    Route::post('admin/subject/update/{id}', [SubjectController::class, 'UpdateSubjectPost'])->name('UpdatePostSubject');
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'DeleteSubject'])->name('DeleteSubject');
    Route::get('admin/subject/search', [SubjectController::class, 'SubjectSearch'])->name('SubjectSearch');

    //====================Assign Subject ==================
    Route::get('admin/assign-subject/list', [ClassSubjectController::class, 'List']);
    Route::get('admin/assign-subject/add', [ClassSubjectController::class, 'Add']);
    Route::post('admin/assign-subject/insert', [ClassSubjectController::class, 'Insert']);
    Route::get('admin/dassign-subject/update/{id}', [ClassSubjectController::class, 'Edit'])->name('EditView');
    Route::post('admin/assign-subject/update', [ClassSubjectController::class, 'Update'])->name('UpdateAssign');
    Route::get('admin/assign-subject/delete/{id}', [ClassSubjectController::class, 'Delete'])->name('DeleteAssign');
    Route::get('admin/assign-subject/search', [ClassSubjectController::class, 'Search'])->name('AssignSearch');

    //===================Assign class to Teacher=================
    Route::get('admin/teacher/assigen_class_teacher/list', [AssignClassToTeacherController::class, 'list'])->name('assigen.class.list');
    Route::get('admin/teacher/assigen_class/add', [AssignClassToTeacherController::class, 'add'])->name('assigen.class.add');
    Route::post('admin/teacher/assigen_class/insert', [AssignClassToTeacherController::class, 'insert'])->name('assigen.class.insert');
    Route::get('admin/teacher/assigen_class_teacher/edit/{id}', [AssignClassToTeacherController::class, 'edit'])->name('assigen.class.edit');
    Route::post('admin/teacher/assigen_class_teacher/update/{id}', [AssignClassToTeacherController::class, 'update'])->name('assigen.class.update');
    Route::get('admin/teacher/assigen_class_teacher/sereach', [AssignClassToTeacherController::class, 'sreach'])->name('assigen.class.teacher.sreach');
    Route::get('admin/teacher/assigen_class_teacher/edit-single/{id}', [AssignClassToTeacherController::class, 'edit_single'])->name('assigen.class.edit');
    Route::post('admin/teacher/assigen_class_teacher/update-single/{id}', [AssignClassToTeacherController::class, 'update_single'])->name('assigen_classtoTecher.update');
    Route::get('admin/teacher/assigen_class_teacher/delete/{id}', [AssignClassToTeacherController::class, 'delete'])->name('assigen_classtoTecher.delete');

    //============================ edit single subject=============================
    Route::get('admin/assign-subject/update-single/{id}', [ClassSubjectController::class, 'Edit_single'])->name('EditView_single');
    Route::post('admin/updatesinglesubject/{id}', [ClassSubjectController::class, 'Update_single'])->name('UpdatSingleSubject');
    //============================change password===============================
    Route::get('admin/change_password', [UserController::class, 'adminChangePasswordView']);
    Route::post('admin/update_password', [UserController::class, 'adminUpdatePassword']);
    //===================Examation section==================================
    Route::get('admin/exam/list', [ExamController::class, 'list']);
    Route::get('admin/exam/add', [ExamController::class, 'add_view']);
    Route::post('admin/exam/insert', [ExamController::class, 'insert']);
    Route::get('admin/exam/edit/{id}', [ExamController::class, 'edit']);
    Route::post(' admin/exam/updte/{id}', [ExamController::class, 'update']);
    Route::get('admin/exam/delete/{id}', [ExamController::class, 'delete']);
    Route::get('admin/exam_schedule', [ExamController::class, 'examSchedule']);
    Route::post('admin/examinationa/exam_schedule_insert', [ExamController::class, 'examScheduleInsert']);



});//end admin middleware

//============================Student dashboard==================================
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
    Route::get('student/account', [UserController::class, 'my_account_student_view'])->name('student.account');
    Route::post('student/account/update', [UserController::class, 'Student_Account_Update']);
    Route::get('student/my_subject', [SubjectController::class, 'Mysubject'])->name('student.my_subject');
    Route::get('student/my_exam_timetable', [ExamController::class, 'myExamTimeTable']);

});
//===================================Teacher dashboard===========================
Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('teacher/change_password', [UserController::class, 'teacherChangePasswordView'])->name('teacher.change.password');
    Route::post('teacher/update_password', [UserController::class, 'teacherUpdatePassword']);
    Route::get('teacher/account', [UserController::class, 'Teacher_account_view'])->name('teacher.account');
    Route::post('teacher/account/update', [UserController::class, 'Teacher_Account_Update']);
    Route::get('teacher/class_subject', [AssignClassToTeacherController::class, 'mysubjectClass'])->name('teacher.class_subject');
    Route::get('teacher/mystudent', [StudentController::class, 'mystudent'])->name('teacher.mystudent');
    Route::get('teacher/my_class_timetable/{class_id}/{subject_id}', [ClassTimeTableController::class, 'MyTimetableTeacher']);
    Route::get('teacher/my_exam_timetable', );
});

//======================================Parent dashboard======================
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('parent/change_password', [UserController::class, 'parentChangePasswordView']);
    Route::post('parent/update_password', [UserController::class, 'parentUpdatePassword']);
    Route::get('parent/account', [UserController::class, 'parent_account_view']);
    Route::post('parent/account/update', [UserController::class, 'parent_account_update']);
    Route::get('parent/my_student_parent', [UserController::class, 'my_student_parent'])->name('parent.my_student_parent');
    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'parent_student_subject']);

    Route::get('parent/my_student/timetable/{class_id}/{subject_id}/{student_id}', [ClassTimeTableController::class, 'ParentStudentTimetable']);
    Route::get('parent/my_student/exam_timetable/{student_id}', [ExamController::class, 'parentMyExamTimeTable']);

});

// ===========================Start Reset Password========================
Route::get('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('forget-password', [ForgetPasswordController::class, 'forgetPasswordPost']);
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('restpasswordpost', [ForgetPasswordController::class, 'restePasswordPost']);
// ==========================End Reset Password============================

//============================change password==========================
Route::get('student/change_password', [UserController::class, 'studentPasswordView']);
Route::post('student/update_password', [UserController::class, 'studentPasswordUpdate']);


//======================assign TimeTable=============================
Route::get('admin/class_timetable/list', [ClassTimeTableController::class, 'list']);
Route::post('admin/class_timetable/get_subject', [ClassTimeTableController::class, 'get_subject']);
Route::post('admin/class_timetable/add', [ClassTimeTableController::class, 'insert_update']);
Route::get('student/my_timetable', [ClassTimeTableController::class, 'studentMyTimetable'])->name('student.my_timetable');

