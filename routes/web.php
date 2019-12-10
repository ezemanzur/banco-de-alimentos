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

/*--------------------------------------------------------------
    Vistas publicas
--------------------------------------------------------------*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('/home');
Route::get('/contacto', 'HomeController@contactView')->name('contacto');
Route::get('/register_volunteer', 'HomeController@registerVolunteerView');
Route::post('/new_volunteer', 'HomeController@newVolunteer');


/*--------------------------------------------------------------
    Autenticacion
--------------------------------------------------------------*/
Auth::routes();
Route::get('/donante', 'GiverController@index')->name('donante');
Route::get('/empleado/{panel?}/{list?}/{detail?}/{id?}', 'EmployeeController@index')->name('empleado');
Route::get('/administrador', 'AdminController@index')->name('administrador');
Route::get('/profile', 'UserController@showProfile')->name('profile');

//Route::get('donation/create', 'DonationController@create');
//Route::post('donation/addProductInputs', 'DonationController@addProductInput');
//Route::post('donation/save', 'DonationController@save')->name('donation.save');

/*--------------------------------------------------------------
    Donaciones
--------------------------------------------------------------*/
Route::post('donation/end', 'DonationController@end');
Route::post('donation/save', 'DonationController@save');
Route::post('donation/back', 'DonationController@back');
Route::get('donation/delete', 'DonationController@delete');
Route::post('donation/retirement_date', 'DonationController@retirement_date')->name('retirementDate');
Route::post('donation/refuse', 'DonationController@refuse');
Route::get('donation/completed/{donation_id}', 'DonationController@completed')->name('donationCompleted');


/*--------------------------------------------------------------
    Carga de productos
--------------------------------------------------------------*/
Route::post('product/save', 'ProductController@save');
Route::get('product/delete/{id}', 'ProductController@delete');
Route::post('product/update_amount', 'ProductController@updateAmount');

/*--------------------------------------------------------------
    Usuario cambios perosnales
--------------------------------------------------------------*/
Route::post('change_password', 'UserController@changePassword');
Route::post('unsubscribe/request', 'UserController@unsubscribeRequest');
Route::post('change_giver_profile', 'UserController@changeGiverProfile');

/*--------------------------------------------------------------
   Empleado - Aceptar y rechazar donantes
--------------------------------------------------------------*/
Route::get('empleado/refuse_giver/{id}','EmployeeController@refuseGiver')->name('refuseGiver');
Route::get('empleado/accept_giver/{id}','EmployeeController@acceptGiver')->name('acceptGiver');

Route::get('empleado/resumeDonation/{id}', 'EmployeeController@resumeDonation')->name('resumeDonation');

/*--------------------------------------------------------------
   Administrador
--------------------------------------------------------------*/
Route::get('/accept_new_volunteer/{id}', 'AdminController@acceptVolunteer');
Route::get('/reject_new_volunteer/{id}', 'AdminController@rejectVolunteer');
Route::get('/admin_to_employee/{id}', 'AdminController@adminToEmployee');
Route::get('/employee_to_admin/{id}', 'AdminController@employeeToAdmin');
Route::get('/delete_user/{id}', 'AdminController@deleteUser');
Route::post('/create_employee', 'AdminController@createEmployee');