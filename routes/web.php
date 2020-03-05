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

//users
Route::group(['middleware' => ['auth']], function(){
	
	Route::get('/permission-denied', 'UserController@permissionDenied')->name('nopermission');

//Patient
    Route::resource('/profile', 'PatientController');
});
//admin

	Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin', 'AdminController@home')->name('admin.home');
        Route::resource('/admin/user', 'AdminController');
        Route::any('/search', 'AdminController@search')->name('search');
    });

    

//Nurse
Route::group(['middleware' => ['nurse']], function () {
    Route::get('/nurse', 'NurseController@index')->name('nurse.home');

    Route::get('/nurselist', 'NurseController@nurselist')->name('nurse.list');

    // Route::any('/patientsearch', 'NurseController@search')->name('patient.search');

    Route::get('/showChart/{pat}', 'NurseController@show')->name('showChart');

    Route::any('/nurseorders/{pat}', 'NurseController@nurseorders')->name('show.orders');
    Route::get('/updateorders/{pat}/{order}', 'NurseController@editorders')->name('edit.orders');
    Route::any('/nurseorder/{pat}', 'NurseController@updateorders')->name('update.order');

    Route::get('/rbsmonitoring/{pat}', 'NurseController@inputrbs')->name('input.rbs');
    Route::post('/rbsmonitoring/{pat}', 'NurseController@storerbs')->name('store.rbs');

    Route::get('/nursesNotes/{pat}', 'NurseController@inputNursesNotes')->name('input.nursesnotes');
    Route::post('/nursesNotes/{pat}', 'NurseController@storeNurseNotes')->name('store.nursesnotes');

    Route::get('/inputIntake/{pat}', 'NurseController@inputIntakeOutput')->name('input.intakeoutput');
    Route::post('/inputIntake/{pat}', 'NurseController@storeIntakeOutput')->name('store.intakeoutput');

    Route::get('/inputIvf/{pat}', 'NurseController@inputIvf')->name('input.ivf');
    Route::post('/inputIvf/{pat}', 'NurseController@storeIvf')->name('store.ivf');

    Route::get('/inputVitalsigns/{pat}', 'NurseController@inputVitalSigns')->name('input.vitalsigns');
    Route::post('/inputVitalsigns/{pat}', 'NurseController@storeVitalSigns')->name('store.vitalsigns');

    Route::get('scan', 'NurseController@showScanner')->name('scan');

    Route::get('discharge/{pat}', 'NurseController@discharge')->name('patient.discharge');
    Route::any('discharge/{pat}', 'NurseController@dischargepat')->name('discharge.pat');

    Route::get('markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('nurse.home');
    })->name('markRead');

});

//HeadNurse
Route::group(['middleware' => ['headNurse']], function () {
    Route::get('headnurse', 'HeadNurseController@index')->name('headnurse');
    Route::get('assign', 'HeadNurseController@create')->name('assign');
    Route::post('assign', 'HeadNurseController@store')->name('store.assign');
    Route::any('/searchpatient', 'HeadNurseController@search')->name('search.patient');
});

//Admissions
Route::group(['middleware' => ['admission']], function () {
    Route::get('admissions', 'AdmissionsController@home')->name('admissions.home');
    Route::get('patientlist', 'AdmissionsController@patientlist')->name('patientlist');
    Route::get('create', 'AdmissionsController@create')->name('create.patient');
    Route::post('create', 'AdmissionsController@store')->name('store.patient');
    Route::get('profile/createQR/{id}', 'AdmissionsController@createQRDocx')->name('createQR');
    Route::any('qrcode', 'AdmissionsController@showQRCode');
    Route::any('patientsearch', 'AdmissionsController@search')->name('pat.search');
});
//doctor
Route::group(['middleware' => ['doctor']], function () {
    Route::get('patient-list', 'DoctorController@showList')->name('list.show');
    Route::get('/patient/{pat}', 'DoctorController@showPatient')->name('show.patient');
    Route::get('doctor', 'DoctorController@home')->name('doctor');
    Route::post('/order/{pat}', 'DoctorController@storeOrder')->name('order.store');
    Route::get('orders', 'DoctorController@showOrders')->name('order.show');
    Route::get('patient-add', 'DoctorController@createPatient')->name('patient.add');
    Route::post('patient-store', 'DoctorController@storePatient')->name('patient.store');
    Route::get('patient-transfer/{pat}', 'DoctorController@createTransfer')->name('patient.transfer');
    Route::get('transfer-message/{user}/{pat}', 'DoctorController@storeTransferMessage')->name('transfer.message');
    Route::any('transfer-store/{user}', 'DoctorController@storeTransfer')->name('transfer.store');
    Route::any('/search-user/{pat}', 'DoctorController@search')->name('search.user');
    Route::get('/show-chart/{pat}', 'DoctorController@showChart')->name('chart.show');//change
    Route::get('/show-ivf/{pat}', 'DoctorController@showIvf')->name('show.ivf');
    Route::get('/show-rbs/{pat}', 'DoctorController@showRbs')->name('show.rbs');
    Route::get('/show-vitals/{pat}', 'DoctorController@showVitals')->name('show.vitals');
    Route::get('/show-inatake-output/{pat}', 'DoctorController@showIntakeoutput')->name('show.intake');
    // Route::get('markAsRead', function () {
    //     auth()->user()->unreadNotifications->markAsRead();
    //     return redirect()->route('doctor');
    // })->name('markRead');
}); 

//fullcalendar
Route::get('fullcalendar','FullCalendarController@index')->name('calendar');
Route::get('load-events', 'EventController@loadEvents')->name('routeLoadEvents');
Route::put('event-update', 'EventController@update')->name('routeEventUpdate');
Route::get('event-store', 'EventController@store')->name('routeEventStore');
Route::delete('event-delete', 'EventController@destroy')->name('routeEventDelete');
