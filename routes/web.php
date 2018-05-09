<?php

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
Auth::routes();

Route::get('/', 'UserController@index')->name('home');
Route::get('/home', 'UserController@index')->name('home');

Route::prefix('admin')->group(function() {
	Route::prefix('api')->group(function() {
		Route::get('/students/search/{query}','Admin\AdminApiController@studentSearch');
		Route::get('/students', 'Admin\AdminApiController@getStudents');
		Route::put('/student/{student_id}', 'Admin\AdminApiController@updateStudent');
		Route::put('/flag/{students_ids}', 'Admin\AdminApiController@flag')->name('admin.flag');
		Route::put('/unflag/{students_ids}', 'Admin\AdminApiController@unflag')->name('admin.unflag');
		Route::delete('/student/{student_id}', 'Admin\AdminApiController@deleteStudent');


		Route::get('/teachers','Admin\AdminApiController@getTeachers');
		Route::get('/teacher/search/{query}','Admin\AdminApiController@teacherSearch');
		Route::put('/updateteacher/{teacher_id}', 'Admin\AdminApiController@updateTeacher');
		Route::delete('/teacher/{teacher_id}', 'Admin\AdminApiController@deleteTeacher');
	});
		
	Route::get('/filiere/{name}', 'Admin\ClassroomController@showclassrooms')->name('admin.filiere');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashbaord');
});

Route::group(['as' => 'admin.'], function () {
	Route::resources([
	    'admin/users' => 'Admin\UserController',
	    'admin/classrooms' => 'Admin\ClassroomController',
	    'admin/students' => 'Admin\StudentController',
	]);
});
Route::resource('/classrooms', 'ClassroomController', ['only' => [
    'index','show'
]]);
Route::resource('/users', 'UserController', ['only' => [
    'index','show'
]]);
Route::resource('/students', 'StudentController', ['only' => [
    'index','show'
]]);
Route::get('students/flag/{students_ids}', 'StudentController@flag')->name('students.flag');
Route::get('students/unflag/{students_ids}', 'StudentController@unflag')->name('students.unflag');
