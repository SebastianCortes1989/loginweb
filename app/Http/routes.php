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
Route::get('logout', 'Auth\LoginController@logout');


//administrador
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('seleccionar-cliente', 'ClientController@getSelect');
    Route::post('seleccionar-cliente', 'ClientController@postSelect');
    Route::resource('clientes', 'ClientController');

});

//entidades de clientes
Route::group(['namespace' => 'Entity', 'prefix' => 'entidades', 'middleware' => 'auth'], function () {

    Route::resource('trabajadores', 'EmployeeController');
    Route::resource('cargos', 'ChargeController');
    Route::resource('unidades', 'UnitController');
    Route::resource('gerencias', 'ManagementController');
    Route::resource('sucursales', 'BranchController');

});

//recursos humanos
Route::group(['namespace' => 'HumanResources', 'prefix' => 'rrhh', 'middleware' => 'auth'], function () {

    Route::get('contratos/jornada', 'ContractController@workingType');
    Route::post('contratos/jornada', 'ContractController@workingTypeStore');
    Route::get('contratos/remuneraciones', 'ContractController@remunerations');
    Route::post('contratos/remuneraciones', 'ContractController@remunerationsStore');
    Route::resource('contratos', 'ContractController');

    Route::resource('remuneraciones', 'RemunerationController');

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
    Route::resource('permisos', 'PermissionController');
    
    Route::resource('antiguedad', 'AntiqueController');
    Route::resource('traslados', 'TransferController');

    Route::resource('prestamos', 'LoanController');
    Route::resource('ccaf', 'CcafController');

    Route::resource('cartas', 'LetterController');
    Route::resource('finiquitos', 'SettlementController');

    //PDF
    Route::group(['namespace' => 'Pdf', 'prefix' => 'pdf', 'middleware' => 'auth'], function () {
        Route::get('antiguedad/{id}', 'AntiqueController@view');
        Route::get('anticipos/{id}', 'AdvanceController@view');
        Route::get('apv/{id}', 'ApvController@view');
        Route::get('bonos/{id}', 'BondController@view');
        Route::get('aguinaldos/{id}', 'BonuController@view');
        Route::get('ccaf/{id}', 'CcafController@view');
        Route::get('comisiones/{id}', 'CommissionController@view');
        Route::get('contratos/{id}', 'ContractController@view');
        Route::get('descuentos/{id}', 'DiscountController@view');
        Route::get('horas-extras/{id}', 'ExtraHourController@view');
        Route::get('cartas/{id}', 'LetterController@view');
        Route::get('licencias/{id}', 'LicensingController@view');
        Route::get('prestamos/{id}', 'LoanController@view');
        Route::get('permisos/{id}', 'PermissionController@view');
        Route::get('finiquitos/{id}', 'SettlementController@view');
        Route::get('herramientas/{id}', 'ToolController@view');
        Route::get('traslados/{id}', 'TransferController@view');
        Route::get('viaticos/{id}', 'ViaticalController@view');
    });
});


