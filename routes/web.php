<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('index');
});



Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    //Roles Management
    //Route::resource('roles','RoleController');
    Route::get('/roles/all', 'RoleController@index')->name('roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create');
    Route::post('/roles/create', 'RoleController@store')->name('roles.store');
    Route::delete('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');
    Route::get('/roles/show/{id}', 'RoleController@show')->name('roles.show');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::post('/roles/edit/{id}', 'RoleController@update')->name('roles.update');


    //Permission Management
    Route::get('/permissions/all', 'PermissionController@index')->name('permissions.index');
    Route::delete('/permissions/destroy/{id}', 'PermissionController@destroy')->name('permissions.destroy');
    Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create');
    Route::post('/permissions/store', 'PermissionController@store')->name('permissions.store');
    

    
    
    //charts
    Route::get('/charts/appointments', 'ChartsController@getAppointments');
    Route::get('/charts/patients', 'ChartsController@getPatients');
    Route::get('/charts/consultations', 'ChartsController@getConsultations');
    Route::get('/charts/orders', 'ChartsController@getOrders');

    Route::group(['prefix' => 'patients'], function () {
        Route::get('/all', 'PatientController@index')->name('all_patient');
        Route::get('/new', 'PatientController@create')->name('new_patient');
        Route::post('/new', 'PatientController@store')->name('save_patient');
        Route::get('/edit/{id}', 'PatientController@edit')->name('edit_patient');
        Route::post('/edit/{id}', 'PatientController@update')->name('update_patient');
        
    });


    
    
    Route::group(['prefix' => 'appointments'], function () {
        Route::get('/all', 'AppointmentController@index')->name('all_appointment');
        Route::get('/new', 'AppointmentController@create')->name('new_appointment');
        Route::post('/new', 'AppointmentController@store')->name('save_appointment');
        Route::get('/hours/{day}', 'AppointmentController@getFreeHours')->name('free_appointment');
        Route::get('/posted', 'AppointmentController@getCalendar')->name('get_appointments');
        
    });
    
    Route::group(['prefix' => 'consultations'], function () {
        Route::get('/all', 'ConsultationController@index')->name('all_consultation');
        Route::post('/new/{id_patient}', 'ConsultationController@store')->name('save_consultation');
        Route::get('/edit/{id}', 'ConsultationController@edit')->name('edit_consultation');
        Route::post('/edit/{id}', 'ConsultationController@update')->name('update_consultation');
        Route::get('/print/{id}', 'ConsultationController@print')->name('print_consultation');
        Route::get('/order/{id}', 'ConsultationController@order')->name('order_consultation');
        Route::get('/orders/all', 'ConsultationController@orders')->name('orders_consultation');
        Route::get('/orders/medicaments/{id}', 'ConsultationController@setMedicaments')->name('set_medicaments');
        Route::post('/orders/medicaments/{id}', 'ConsultationController@SaveSetMedicaments')->name('save_set_medicaments');
        Route::get('/orders/print/{id}', 'ConsultationController@printOrder')->name('print_set_medicaments');
        
    });

    Route::group(['prefix' => 'medicaments'], function () {
        Route::get('/all', 'MedicamentController@index')->name('all_medicament');
        Route::get('/new', 'MedicamentController@create')->name('new_medicament');
        Route::post('/new', 'MedicamentController@store')->name('save_medicament');
        
    });
    
    /*
    Route::get('admin/profile', function () {
        //
    })->withoutMiddleware(['auth']);
    */
});