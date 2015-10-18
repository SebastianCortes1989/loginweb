<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('default');
});


//administrador
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::resource('clientes', 'ClientController');

});

//entidades de clientes
Route::group(['namespace' => 'Entity', 'prefix' => 'entidades'], function () {

    Route::resource('trabajadores', 'EmployeeController');
    Route::resource('cargos', 'ChargeController');
    Route::resource('unidades', 'UnitController');
    Route::resource('gerencias', 'ManagementController');
    Route::resource('sucursales', 'BranchController');

});

//recursos humanos
Route::group(['namespace' => 'HumanResource', 'prefix' => 'rrhh'], function () {

    Route::resource('contratos', 'ContractController');

});