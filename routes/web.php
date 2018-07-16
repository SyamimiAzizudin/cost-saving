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

Auth::routes();

// Middleware for Admin
Route::group(['middleware' => 'admin'], function() {

    // Home
    Route::get('/home', 'HomeController@index');

    // User Management
    Route::resource('/user', 'UsersController');
    Route::delete('/user/{user}/delete', 'UsersController@destroy');

    // Company Management
    Route::resource('/company', 'CompaniesController');
    Route::delete('/company/{company}/delete', 'CompaniesController@destroy');

    // Initiative Management
    Route::get('/initiative-company', 'InitiativesController@companylist');
    Route::get('/initiative-company/{company_id}', 'InitiativesController@getCompanyInitiative');
    Route::post('/initiative-company/{company_id}', 'InitiativesController@store');
    Route::get('/initiative/{company_id}/edit', 'InitiativesController@edit');    
    Route::patch('/initiative-company/{company_id}', 'InitiativesController@update');
    Route::delete('/initiative/{initiative}/delete', 'InitiativesController@destroy');

});

// Middleware for Subsidiary
Route::group(['middleware' => 'subsidiary'], function() {

});

// Middleware for Admin and Subsidiary
Route::group(['middleware' => 'adminsubsidiary'], function() {

    // Saving Management
    Route::resource('/saving', 'SavingsController');
    Route::delete('/saving/{saving}/delete', 'SavingsController@destroy');
    Route::get('/saving-company', 'SavingsController@companylist');
    Route::get('/saving-company/{company_id}', 'SavingsController@getCompanySaving');
    Route::post('/saving-company/{company_id}', 'SavingsController@saveInitiativeSaving');
    Route::get('/saving-company/{company_id}/{year}', 'SavingsController@getInititativeSavingTable');
    Route::post('/lock_initiative/{company_id}/{year}', 'SavingsController@postLockInitiative');
});

// Middleware for Board of Director
Route::group(['middleware' => 'board'], function() {

    // Main Dashboard
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/dashboard/{year}', 'HomeController@dashboard_year');
    Route::get('/dashboard_cost_saving_summary/{month}/{year}', 'HomeController@dashboard_cost_saving_summary');

    // Group Dashboard
    Route::get('/group-dashboard/{group}', 'HomeController@group_dashboard');
    Route::get('/group-dashboard/{group}/{year}', 'HomeController@group_dashboard_year');
    Route::get('/group_dashboard_cost_saving_summary/{group}/{year}/{month}', 'HomeController@group_dashboard_cost_saving_summary');

    // Company Dashboard
    Route::get('/company-dashboard/{id}', 'HomeController@company_dashboard');
    Route::get('/company_dashboard_cost_saving_summary/{id}/{month}', 'HomeController@company_dashboard_cost_saving_summary');    
});

