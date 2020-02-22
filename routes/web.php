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

Route::resource('/profile', 'PatientController');


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
Route::get('patient', 'AdmissionsController@index');
Route::get('/create', 'AdmissionsController@create')->name('create.patient');
Route::post('/create', 'AdmissionsController@store')->name('store.patient');

});

//Doctor
Route::group(['middleware' => ['doctor']], function () {
    // Route::get('schedule', 'DoctorController@edit');
    Route::post('/doctor/list', 'DoctorController@show')->name('list');
    Route::get('doctor/home', 'DoctorController@home')->name('doctorHome');
    Route::get('doctor/order', 'DoctorController@createOrder')->name('order.create');
    Route::post('doctor/order', 'DoctorController@storeOrder')->name('order.store');    
    
});

//fullcalendar
Route::get('fullcalendar','FullCalendarController@index')->name('index');

Route::get('load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('update-event', 'EventController@update')->name('routeUpdateEvent');
Route::get('store-event', 'EventController@store')->name('routeStoreEvent');
Route::delete('destroy-event', 'EventController@destroy')->name('routeDestroyEvent');

// Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

// Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');

// Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');


