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

// Authentication
Auth::routes(['verify' => true]);

// Default routes
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('verified');
Route::get('/home', 'DashboardController@index')->name('home')->middleware('verified');

// Navigation routes
Route::get('/schedule', 'RedirectController@scheduler')->name('schedule');
Route::get('/helpdesk', 'RedirectController@helpdesk')->name('helpdesk');
Route::get('/cityemail', 'RedirectController@cityemail')->name('cityemail');

// Staff/User routes
Route::get('/staff/add', 'StaffController@showForm')->name('addStaff')->middleware('verified');
Route::post('/staff/add', 'StaffController@store')->middleware('verified');

// Report routes
Route::get('/reports', 'DashboardController@reports')->name('reports')->middleware('supervisors');
Route::get('/reports/incidents', 'ReportController@incidents')->name('reportIncidents')->middleware('supervisors');

// Incidents
Route::get('/incidents', 'IncidentController@index')->name('incidents')->middleware('verified');
/* UPDATE 'CREATE' ROUTES TO 'ADD' */
Route::get('/incidents/create', 'IncidentController@create')->name('createIncident')->middleware('verified');
Route::get('/incidents/{incident}', 'IncidentController@show')->name('incident')->middleware('verified');
Route::post('/incidents/create', 'IncidentController@store')->middleware('verified');
Route::post('/incidents', 'IncidentController@search')->middleware('verified');
Route::get('/incidents/edit/{incident}', 'IncidentController@edit')->name('editIncident')->middleware('verified');
Route::post('/incidents/edit/{incident}', 'IncidentController@update')->name('updateIncident')->middleware('verified');
Route::get('/incidents/delete/{incident}', 'IncidentController@delete')->name('deleteIncident')->middleware('verified');

// Comments
Route::post('/comments/create', 'CommentController@store')->middleware('verified');
Route::get('/comments/edit/{comment}', 'CommentController@edit')->name('editComment')->middleware('verified');
Route::post('/comments/edit/{comment]', 'CommentController@update')->name('updateComment')->middleware('verified');
Route::get('/comments/delete/{comment}', 'CommentController@delete')->name('deleteComment')->middleware('verified');

// Photos
Route::get('/photos', 'PhotoController@index')->name('photos')->middleware('verified');
Route::get('/photos/create', 'PhotoController@create')->name('createPhoto')->middleware('verified');
Route::post('/photos/create', 'PhotoController@store')->middleware('verified');
Route::get('/photos/{photo}', 'PhotoController@show')->name('photo')->middleware('verified');
Route::get('/photos/edit/{photo}', 'PhotoController@edit')->name('editPhoto')->middleware('verified');
Route::get('/photos/delete/{photo}', 'PhotoController@delete')->name('deletePhoto')->middleware('verified');
Route::post('/photos/edit/{photo}', 'PhotoController@update')->name('updatePhoto')->middleware('verified');

// Patrons
Route::post('/patrons/create', 'PatronController@store')->name('storePatron')->middleware('verified');
Route::get('/patrons/create', 'PatronController@create')->name('createPatron')->middleware('verified');
Route::get('/patrons/{patron}', 'PatronController@show')->name('patron')->middleware('verified');
Route::get('/patrons/edit/{patron}', 'PatronController@edit')->name('editPatron')->middleware('verified');
Route::post('/patrons/edit/{patron}', 'PatronController@update')->name('updatePatron')->middleware('verified');
Route::get('/patrons', 'PatronController@index')->name('patrons')->middleware('verified');
Route::post('/patrons', 'PatronController@search')->middleware('verified');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
