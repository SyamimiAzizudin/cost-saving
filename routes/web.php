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
    return view('/home');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/dashboard_cost_saving_summary/{month}', 'HomeController@dashboard_cost_saving_summary');
	Route::get('/group-dashboard/{group}', 'HomeController@group_dashboard');
    Route::get('/group_dashboard_cost_saving_summary/{group}/{month}', 'HomeController@group_dashboard_cost_saving_summary');
	Route::get('/company-dashboard/{id}', 'HomeController@company_dashboard');
    Route::get('/company_dashboard_cost_saving_summary/{id}/{month}', 'HomeController@company_dashboard_cost_saving_summary');
    Route::get('/saving/saving-company/{company}', 'HomeController@init');
	Route::get('/print-overall', 'HomeController@print_overall');
    // Route::get('/saving.company/{company_id}', 'HomeController@init');


    Route::group(['middleware' => ['admin']], function() {
        /**
         * User Management
         */
        Route::resource('/user', 'UsersController');
        Route::delete('/user/{user}/delete', 'UsersController@destroy');
    });

	/**
     * Company Management
     */
	Route::resource('/company', 'CompaniesController');
    Route::delete('/company/{company}/delete', 'CompaniesController@destroy');

	/**
     * Initiative Management
     */
    Route::get('/initiative-company', 'InitiativesController@companylist');
    Route::get('/initiative-company/{company_id}', 'InitiativesController@getCompanyInitiative');
    Route::post('/initiative-company/{company_id}', 'InitiativesController@store');
    Route::get('/initiative/{company_id}/edit', 'InitiativesController@edit');    
    Route::patch('/initiative-company/{company_id}', 'InitiativesController@update');
    Route::delete('/initiative/{initiative}/delete', 'InitiativesController@destroy');

	/**
     * Saving Management
     */
	Route::resource('/saving', 'SavingsController');
    Route::delete('/saving/{saving}/delete', 'SavingsController@destroy');
    Route::get('/saving-company', 'SavingsController@companylist');
    Route::get('/saving-company/{company_id}', 'SavingsController@getCompanySaving');
    Route::post('/saving-company/{company_id}', 'SavingsController@saveInitiativeSaving');
    Route::get('/saving-company-table/{company_id}', 'SavingsController@getInititativeSavingTable');

    Route::post('/lock_initiative/{company_id}', 'SavingsController@postLockInitiative');
});

Auth::routes();
