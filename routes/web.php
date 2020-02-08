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
// Route::resource('/profile', 'PatientController');


//Nurse
Route::group(['middleware' => ['nurse']], function () {
Route::get('/nurse', 'NurseController@index')->name('nurseHome');
Route::get('/inputchart', 'NurseController@create')->name('inputchart');
});

//HeadNurse
Route::group(['middleware' => ['headNurse']], function () {
Route::get('headnurse', 'HeadNurseController@index')->name('headnurse');
Route::get('assign', 'HeadNurseController@create')->name('assign');
});

//Admissions
Route::group(['middleware' => ['admission']], function () {
Route::get('admissions', 'AdmissionsController@home')->name('admissions.home');
Route::get('patientlist', 'AdmissionsController@patientlist')->name('patientlist');
Route::get('create', 'AdmissionsController@create')->name('create.patient');
Route::post('create', 'AdmissionsController@store')->name('store.patient');
// <<<<<<< HEAD
// Route::get('profile/{patient}', 'AdmissionsController@profile');
// =======
Route::get('profile', 'AdmissionsController@profile')->name('profile');

// >>>>>>> a3aceda09ff64f81f8de1912d820b3d99cf24af8
});

//Doctor
Route::group(['middleware' => ['doctor']], function () {
    Route::get('schedule', 'DoctorController@edit');
    Route::get('list', 'DoctorController@show')->name('list');
    Route::get('doctor/home', 'DoctorController@home')->name('doctorHome');
    Route::get('doctor/order', 'DoctorController@createOrder')->name('order.create');
    Route::post('doctor/order', 'DoctorController@storeOrder')->name('order.store');    
    
});