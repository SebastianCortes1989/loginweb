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


Route::get('/', 'Auth\LoginController@index');
Route::post('auth', 'Auth\LoginController@authenticate');


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
Route::group(['namespace' => 'HumanResources', 'prefix' => 'rrhh'], function () {

    Route::get('contratos/jornada', 'ContractController@workingType');
    Route::post('contratos/jornada', 'ContractController@workingTypeStore');
    Route::get('contratos/remuneraciones', 'ContractController@remunerations');
    Route::post('contratos/remuneraciones', 'ContractController@remunerationsStore');
    Route::resource('contratos', 'ContractController');

    Route::resource('bonos', 'BondController');
    Route::resource('aguinaldos', 'BonuController');
    Route::resource('comisiones', 'CommissionController');
    Route::resource('viaticos', 'ViaticalController');
    Route::resource('herramientas', 'ToolController');
    Route::resource('horas-extras', 'ExtraHourController');

    Route::resource('apv', 'ApvController');
    Route::resource('anticipos', 'AdvanceController');
    Route::resource('descuentos', 'DiscountController');
    Route::resource('licencias', 'LicensingController');

});