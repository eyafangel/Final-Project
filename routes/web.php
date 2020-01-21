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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//users
Route::group(['middleware' => ['auth']], function(){
    
	Route::get('/user', 'UserController@userPage')->name('user');
	Route::get('/permission-denied', 'UserController@permissionDenied')->name('nopermission');

	Route::group(['middleware' => ['admin']], function(){
		Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/listofusers', 'AdminController@list')->name('list');
    });
});


//Patient
Route::group(['middleware' => ['web']], function () {
Route::resource('/patients', 'PatientController');
});

//Nurse
Route::group(['middleware' => ['nurse']], function () {
Route::resource('/nurse', 'NurseController');
});

//HeadNurse
Route::group(['middleware' => ['headNurse']], function () {
Route::resource('/headnurse', 'HeadNurseController');
});

//Admissions
Route::group(['middleware' => ['admission']], function () {
Route::get('admissions', 'AdmissionsController@home')->name('admissions.home');
Route::get('create', 'AdmissionsController@create')->name('create.patient');
Route::post('create', 'AdmissionsController@store')->name('store.patient');
});

//Doctor
Route::group(['middleware' => ['doctor']], function () {
    Route::get('schedule', 'DoctorController@edit');
    Route::get('list', 'DoctorController@show')->name('list');
    Route::get('doctor/home', 'DoctorController@home')->name('doctorHome');
    Route::get('order', 'DoctorController@create')->name('order.create');
    Route::post('order', 'DoctorController@store')->name('order.store');       
});