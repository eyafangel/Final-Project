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

Auth::routes(['register' => false]);
//Route::get('/home', 'HomeController@index')->name('home');

//users
Route::group(['middleware' => ['auth']], function(){
    
	Route::get('/user', 'UserController@userPage')->name('user');
	Route::get('/permission-denied', 'UserController@permissionDenied')->name('nopermission');

	Route::group(['middleware' => ['admin']], function(){
    Route::resource('/admin/user', 'AdminController');
    });
});


//Patient
Route::resource('/profile', 'PatientController');


//Nurse
Route::group(['middleware' => ['nurse']], function () {
    Route::get('/nurse', 'NurseController@index')->name('nurseHome');

    Route::get('/showChart/{pat}', 'NurseController@show')->name('show.chart');


    Route::get('/inputIntake/{pat}', 'NurseController@inputIntakeOutput')->name('input.intakeoutput');
    Route::post('/inputIntake/{pat}', 'NurseController@storeIntakeOutput')->name('store.intakeoutput');

    Route::get('/inputIvf/{pat}', 'NurseController@inputIvf')->name('input.ivf');
    Route::post('/inputIvf/{pat}', 'NurseController@storeIvf')->name('store.ivf');

    Route::get('/inputVitalsigns/{pat}', 'NurseController@inputVitalSigns')->name('input.vitalsigns');
    Route::post('/inputVitalsigns/{pat}', 'NurseController@storeVitalSigns')->name('store.vitalsigns');

Route::get('scan', 'NurseController@showScanner')->name('scan');


});

//HeadNurse
Route::group(['middleware' => ['headNurse']], function () {
    Route::get('headnurse', 'HeadNurseController@index')->name('headnurse');
    Route::get('assign', 'HeadNurseController@create')->name('assign');
    Route::post('assign', 'HeadNurseController@store')->name('store.assign');
});

//Admissions
Route::group(['middleware' => ['admission']], function () {
    
    Route::get('admissions', 'AdmissionsController@home')->name('admissions.home');
    Route::get('patientlist', 'AdmissionsController@patientlist')->name('patientlist');
    Route::get('create', 'AdmissionsController@create')->name('create.patient');
    Route::post('create', 'AdmissionsController@store')->name('store.patient');
    Route::get('profile/createQR/{id}', 'AdmissionsController@createQRDocx')->name('createQR');


});

//Doctor
Route::group(['middleware' => ['doctor']], function () {

    Route::get('schedule', 'DoctorController@edit');
    Route::get('list', 'DoctorController@show')->name('list');
    Route::get('doctor', 'DoctorController@home')->name('doctor');

    Route::post('/order/{pat}', 'DoctorController@createOrder')->name('order.create');    
    Route::post('order', 'DoctorController@storeOrder')->name('order.store');
    Route::post('/orders/{pat}', 'DoctorController@showOrders')->name('order.show');
    Route::get('add-patient', 'DoctorController@createPatient')->name('patient.add');
    Route::post('store-patient', 'DoctorController@storePatient')->name('patient.store');
    
});


//fullcalendar
Route::get('fullcalendar','FullCalendarController@index')->name('index');

Route::get('load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('event-update', 'EventController@update')->name('routeEventUpdate');
Route::get('event-store', 'EventController@store')->name('routeEventStore');
Route::delete('event-delete', 'EventController@destroy')->name('routeEventDelete');

Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');

Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');



