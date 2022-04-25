<?php

use Illuminate\Support\Facades\Auth;
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


//Clients
//  Route::resource('/clients', 'ClientsController');
Route::get('/clients/create','ClientsController@create')->name('clients.create')->middleware('permissions:can-add-client');
Route::post('/clients','ClientsController@store')->name('clients.store');
Route::get('/clients','ClientsController@index')->name('clients.index')->middleware('permissions:can-index-client');
Route::get('/clients/edit/{id}','ClientsController@edit')->name('clients.edit')->middleware('permissions:can-edit-client');
Route::put('/clients/{id}','ClientsController@update')->name('clients.update');
Route::delete('/clients/{id}','ClientsController@destroy')->name('clients.destroy')->middleware('permissions:can-delete-client');
Route::get('/clients/{id}/edit','ClientsController@show')->name('clients.show')->middleware('permissions:can-show-client');
//Client-document

Route::delete('/client_doc/{id}','ClientsController@delete')->name('clidoc.delete')->middleware('permissions:can-add-documentclient');
Route::get('/client_doc/{id}/edit','ClientsController@editclidoc')->name('clidoc.edit')->middleware('permissions:can-edit-documentclient');
Route::put('/client_doc/{id}','ClientsController@updateclidoc')->name('clidoc.update');
Route::get('/clidoc/create/{id}','ClientsController@createdoc')->name('clidoc.create')->middleware('permissions:can-delete-documentclient');
Route::post('/clidoc','ClientsController@storedoc')->name('clidoc.store');

//Statuses
// Route::resource('/statuses', 'StatusesController');//->middleware('permissionOrGroup:admin|d3soft');
Route::get('/statuses/create','StatusesController@create')->name('stat.create')->middleware('permissions:can-add-status');
Route::post('/statuses','StatusesController@store')->name('stat.store');
Route::get('/statuses','StatusesController@index')->name('stat.index')->middleware('permissions:can-index-status');
Route::get('/statuses/{id}/edit','StatusesController@edit')->name('statuses.edit')->middleware('permissions:can-edit-status');
Route::put('/statuses/{id}','StatusesController@update')->name('statuses.update')->middleware('permissions:can-delete-status');
Route::delete('/statuses/{id}','StatusesController@destroy')->name('statuses.destroy');


//Cars
// Route::resource('/cars', 'CarsController');
Route::get('/cars/create','CarsController@create')->name('cars.create')->middleware('permissions:can-add-car');
Route::post('/cars','CarsController@store')->name('cars.store');
Route::get('/cars','CarsController@index')->name('cars.index')->middleware('permissions:can-index-car');
Route::get('/cars/edit/{id}','CarsController@edit')->name('cars.edit')->middleware('permissions:can-edit-car');
Route::put('/cars/{id}','CarsController@update')->name('cars.update');
Route::delete('/cars/{id}','CarsController@destroy')->name('cars.destroy')->middleware('permissions:can-delete-car');
Route::get('/cars/{id}/edit','CarsController@show')->name('cars.show')->middleware('permissions:can-show-car-operation');
//CAR-OPERATION
Route::delete('/carses/{id}','CarsController@delete')->name('opcar.delete')->middleware('permissions:can-delete-alertcar');
Route::get('/carses/{id}/edit','CarsController@editop')->name('opcar.edit')->middleware('permissions:can-edit-alertcar');
Route::put('/carses/{id}','CarsController@updateop')->name('opcar.update');
Route::get('/carses/create/{id}','CarsController@createop')->name('opcar.create')->middleware('permissions:can-add-alertcar');
Route::post('/carses','CarsController@storeop')->name('opcar.store');

//Alerts-> Operation
// Route::resource('/alerts', 'AlertsController');//->middleware('permissionOrGroup:admin|d3soft');
Route::get('/alerts/create','AlertsController@create')->name('alerts.create')->middleware('permissions:can-add-operation');
Route::post('/alerts','AlertsController@store')->name('alerts.store');
Route::get('/alerts','AlertsController@index')->name('alerts.index')->middleware('permissions:can-index-operation');
Route::get('/alerts/{id}/edit','AlertsController@edit')->name('alerts.edit')->middleware('permissions:can-edit-operation');
Route::put('/alerts/{id}','AlertsController@update')->name('alerts.update');
Route::delete('/alerts/{id}','AlertsController@destroy')->name('alerts.destroy')->middleware('permissions:can-delete-operation');

//Contracts
//Route::resource('/contracts', 'ContractsController');
Route::get('/contracts/create','ContractsController@create')->name('contracts.create')->middleware('permissions:can-add-contract');
Route::post('/contracts','ContractsController@store')->name('contracts.store');
Route::get('/contracts','ContractsController@index')->name('contracts.index')->middleware('permissions:can-add-contract');
Route::get('/contracts/edit/{id}','ContractsController@edit')->name('contracts.edit')->middleware('permissions:can-edit-contract');
Route::put('/contracts/{id}','ContractsController@update')->name('contracts.update');
Route::delete('/contracts/{id}','ContractsController@destroy')->name('contracts.destroy')->middleware('permissions:can-delete-contract');
Route::get('/contracts/{id}/edit','contractsController@show')->name('contracts.show')->middleware('permissions:can-show-contract');

//PDF Contract
Route::get('/search', 'ContractsController@search');
Route::get('/exportPDF/{id}', 'ContractsController@generatePDF');
Route::get('/contracts/restore/{id}', 'ContractsController@restore')->name('contracts.restore')->middleware('permissions:can-restore-contract');

//Users
//Route::resource('/users', 'UsersController');// ->middleware('permissionOrGroup:admin|d3soft');
Route::get('/users/create','UsersController@create')->name('users.create')->middleware('permissions:can-add-user');
Route::post('/users','UsersController@store')->name('users.store');
Route::get('/users','UsersController@index')->name('users.index')->middleware('permissions:can-index-user');
Route::get('/users/edit/{id}','UsersController@edit')->name('users.edit')->middleware('permissions:can-edit-user');
Route::put('/users/{id}','UsersController@update')->name('users.update');
Route::delete('/users/{id}','UsersController@destroy')->name('users.destroy')->middleware('permissions:can-delete-user');
Route::get('/users/{id}/edit','UsersController@show')->name('users.show');
//profile
Route::get('/users/profile', 'UsersController@editprofile')->name('users.editprof');
Route::get('/users/profile/set', 'UsersController@editprof')->name('users.updateprof');
Route::put('/users/profile/set', 'UsersController@updateprofile')->name('users.updateprof');

//ROLE-PERMISSION
Route::get('/users/restore/{id}', 'UsersController@restore')->name('users.restore')->middleware('permissions:can-restore-user');
Route::get('/users/role', 'UsersController@role')->name('users.role');
Route::get('/permission/create','UsersController@permission')->name('permission.create')->middleware('permissions:can-add-role');//
Route::post('/permission','UsersController@storepermission')->name('permission.store');
Route::get('/permission/edit/{id}','UsersController@editrole')->name('role.edit')->middleware('permissions:can-edit-role');
Route::put('/permission/{id}','UsersController@updaterole')->name('role.update');
Route::get('/permission','UsersController@indexrole')->name('role.index')->middleware('permissions:can-edit-role');
Route::delete('/permission/{id}','UsersController@destroyrole')->name('role.delete')->middleware('permissions:can-delete-role');
//Document
// Route::resource('/documents', 'DocumentsController');// ->middleware('permissionOrGroup:admin|d3soft')
Route::get('/documents/create','DocumentsController@create')->name('documents.create')->middleware('permissions:can-add-document');
Route::post('/documents','DocumentsController@store')->name('documents.store');
Route::get('/documents','DocumentsController@index')->name('documents.index')->middleware('permissions:can-index-document');
Route::get('/documents/{id}/edit','DocumentsController@edit')->name('documents.edit')->middleware('permissions:can-edit-document');
Route::put('/documents/{id}','DocumentsController@update')->name('documents.update');
Route::delete('/documents/{id}','DocumentsController@destroy')->name('documents.destroy')->middleware('permissions:can-delete-document');


// Entretiens
// Route::resource('/entretiens', 'EntretiensController');
Route::get('/entretiens/create','EntretiensController@create')->name('entretiens.create')->middleware('permissions:can-add-entretien');
Route::post('/entretiens','EntretiensController@store')->name('entretiens.store');
Route::get('/entretiens','EntretiensController@index')->name('entretiens.index')->middleware('permissions:can-index-entretien');
Route::get('/entretiens/{id}/edit','EntretiensController@edit')->name('entretiens.edit')->middleware('permissions:can-edit-entretien');
Route::put('/entretiens/{id}','EntretiensController@update')->name('entretiens.update');
Route::delete('/entretiens/{id}','EntretiensController@destroy')->name('entretiens.destroy')->middleware('permissions:can-delete-entretien');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', function () {
    return view('welcome',compact('clients'));
});