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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/cursos', ['as' => 'courses.index', 'uses' => 'HomeController@courses']);

Route::get('/alunos', ['as' => 'students.index', 'uses' => 'HomeController@students']);
Route::get('/matriculas', ['as' => 'registrations.index', 'uses' => 'HomeController@registrations']);

Route::prefix('api')->group(function () {
    Route::prefix('courses')->group(function () {
        Route::get('', ['as' => 'course.get', 'uses' => 'CourseController@all']);
        Route::post('', ['as' => 'course.store', 'uses' => 'CourseController@store']);
        Route::get('/{id}', ['as' => 'course.show', 'uses' => 'CourseController@show']);
        Route::put('/{id}', ['as' => 'course.update', 'uses' => 'CourseController@update']);
        Route::delete('/{id}', ['as' => 'course.destroy', 'uses' => 'CourseController@destroy']);
    });

    Route::prefix('students')->group(function () {
        Route::get('', ['as' => 'student.get', 'uses' => 'StudentController@all']);
        Route::post('', ['as' => 'student.store', 'uses' => 'StudentController@store']);
        Route::get('/{id}', ['as' => 'student.show', 'uses' => 'StudentController@show']);
        Route::put('/{id}', ['as' => 'student.update', 'uses' => 'StudentController@update']);
        Route::delete('/{id}', ['as' => 'student.destroy', 'uses' => 'StudentController@destroy']);
    });

    Route::prefix('registrations')->group(function () {
        Route::get('', ['as' => 'registration.get', 'uses' => 'RegistrationController@all']);
        Route::post('', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
        Route::get('/{id}', ['as' => 'registration.show', 'uses' => 'RegistrationController@show']);
        Route::put('/{id}', ['as' => 'registration.update', 'uses' => 'RegistrationController@update']);
        Route::delete('/{id}', ['as' => 'registration.destroy', 'uses' => 'RegistrationController@destroy']);
    });
});
