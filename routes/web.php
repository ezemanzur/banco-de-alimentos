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


//Hacer en un controlador para manejar los paneles una vez autenticados
Route::get('/donante', function () {
    return view('donante');
});
