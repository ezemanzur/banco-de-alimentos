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
    return view('home');
});

Auth::routes();

Route::get('/donante', 'GiverController@index')->name('donante');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('donation/create', 'DonationController@create');
Route::post('donation/addProductInputs', 'DonationController@addProductInput');
Route::post('donation/save', 'DonationController@save')->name('donation.save');

//Cambiar contraseña usuario
Route::post('change_password', 'UserController@changePassword');
//Cancelar cambio de perfil
Route::post('change_giver_profile', 'UserController@changeGiverProfile');