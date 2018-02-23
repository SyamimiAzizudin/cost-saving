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
    return view('/welcome');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@dashboard');
	Route::get('/group-dashboard', 'HomeController@group_dashboard');
	Route::get('/company-dashboard', 'HomeController@company_dashboard');
	Route::get('/print-overall', 'HomeController@print_overall');

	/**
     * User Manegement
     */
	Route::resource('/user', 'UsersController');
    Route::delete('/user/{user}/delete', 'UsersController@destroy');

	/**
     * Company Manegement
     */
	Route::resource('/company', 'CompaniesController');
    Route::delete('/company/{company}/delete', 'CompaniesController@destroy');

	/**
     * Initiative Manegement
     */
    Route::get('/initiative-company', 'InitiativesController@companylist');
    Route::get('/initiative-company/{company_id}', 'InitiativesController@getCompanyInitiative');
    Route::post('/initiative-company/{company_id}', 'InitiativesController@store');
    Route::get('/initiative/{company_id}/edit', 'InitiativesController@edit');    
    Route::patch('/initiative/{initiative}', 'InitiativesController@update');
    Route::delete('/initiative/{initiative}/delete', 'InitiativesController@destroy');

	/**
     * Saving Manegement
     */
	Route::resource('/saving', 'SavingsController');
    Route::delete('/saving/{saving}/delete', 'SavingsController@destroy');
    Route::get('/saving-company', 'SavingsController@companylist');
    Route::get('/saving-company/{company_id}', 'SavingsController@getCompanySaving');
    Route::post('/saving-company/{company_id}', 'SavingsController@saveInitiativeSaving');
    Route::get('/saving-company-table/{company_id}', 'SavingsController@getInititativeSavingTable');


});

Auth::routes();
