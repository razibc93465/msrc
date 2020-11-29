<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/deptCourseView/{id}', 'WelcomeController@courseView');

Route::get('/deptCourseView2/', 'WelcomeController@manageSemCourse');
Route::get('/course/view/{id}', 'WelcomeController@semCourse');

//Route::get('/semCourseView/{id}', 'WelcomeController@manageSemCourse22');

Route::resource('/semCourse', 'semCourseController');
Route::resource('/searchResult', 'searchResultController');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/* Category info */
Route::get('/department/add', 'DepartmentController@createDepartment');
Route::post('/department/save', 'DepartmentController@storeDepartment');
Route::get('/department/manage', 'DepartmentController@manageDepartment');
Route::get('/department/edit/{id}', 'DepartmentController@editDepartment');
Route::post('/department/update', 'DepartmentController@updateDepartment');
Route::get('/department/delete/{id}', 'DepartmentController@deleteDepartment');
/*  Teacher Info  */
Route::get('/teacher/add', 'TeacherController@createTeacher');
Route::post('/teacher/save', 'TeacherController@storeTeacher');
Route::get('/teacher/manage', 'TeacherController@manageTeacher');
Route::get('/teacher/edit/{id}', 'TeacherController@editTeacher');
Route::post('/teacher/update', 'TeacherController@updateTeacher');
Route::get('/teacher/delete/{id}', 'TeacherController@deleteTeacher');
/*  Student Info  */
Route::get('/student/add', 'StudentController@createStudent');
Route::post('/student/save', 'StudentController@storeStudent');
Route::get('/student/manage', 'StudentController@manageStudent');
Route::get('/student/edit/{id}', 'StudentController@editStudent');
Route::post('/student/update', 'StudentController@updateStudent');
Route::get('/student/delete/{id}', 'StudentController@deleteStudent');
/*  Semester Info  */
Route::get('/semester/add', 'SemesterController@createSemester');
Route::post('/semester/save', 'SemesterController@storeSemester');
Route::get('/semester/manage', 'SemesterController@manageSemester');
Route::get('/semester/edit/{id}', 'SemesterController@editSemester');
Route::post('/semester/update', 'SemesterController@updateSemester');
Route::get('/semester/delete/{id}', 'SemesterController@deleteSemester');
/*  Course Info  */
Route::get('/course/add', 'CourseController@createCourse');
Route::post('/course/save', 'CourseController@storeCourse');
Route::get('/course/manage', 'CourseController@manageCourse');
Route::get('/course/edit/{id}', 'CourseController@editCourse');
Route::post('/course/update', 'CourseController@updateCourse');
Route::get('/course/delete/{id}', 'CourseController@deleteCourse');

Route::get('/departmentView/{id}', 'CourseController@department');
Route::get('/departmentViewResult/{id}', 'ResultController@department2');

// Route::get('/', 'CourseController@index');
/*  Result Info  */
Route::get('/result/add', 'ResultController@createResult');
Route::post('/result/save', 'ResultController@storeResult');
Route::get('/result/manage', 'ResultController@manageResult');
Route::get('/result/edit/{id}', 'ResultController@editResult');
Route::post('/result/update', 'ResultController@updateResult');
Route::get('/result/delete/{id}', 'ResultController@deleteResult');
/*  Notification Info  */
Route::get('/notification/add', 'NotificationController@createNotification');
Route::post('/notification/save', 'NotificationController@storeNotification');
Route::get('/notification/manage', 'NotificationController@manageNotification');
Route::get('/notification/edit/{id}', 'NotificationController@editNotification');
Route::post('/notification/update', 'NotificationController@updateNotification');
Route::get('/notification/delete/{id}', 'NotificationController@deleteNotification');


Route::get('generate-pdf', 'PDFController@generatePDF');


Route::get('/allResult',[
    'uses' => 'AllResultController@index',
    'as' => '/resultSheet'
]);
Route::get('/form',[
   'uses' => 'AllResultController@formshow' ,
    'as' => '/demoForm'
]);
Route::post('/store',[
   'uses' => 'AllResultController@saveData',
    'as' => '/saveData'
]);
Route::get('/data',[
    'uses' => 'AllResultController@show' ,
    'as' => '/dataShow'
]);
Route::get('/delete/{id}',[
    'uses' => 'AllResultController@destroy' ,
    'as' => '/Delete'
]);
Route::get('/edit/{id}',[
    'uses' => 'AllResultController@edit' ,
    'as' => '/Edit'
]);
Route::post('/update',[
    'uses' => 'AllResultController@update' ,
    'as' => '/updateData'
]);
