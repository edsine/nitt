<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\VehicleImportationController;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\PassengerRoadTransportDataController;
use App\Http\Controllers\FreightRoadTransportDataController;
use App\Http\Controllers\AirTransportDataController;
use App\Http\Controllers\AirTrafficDataController;
use App\Http\Controllers\AirPassengersTrafficController;
use App\Http\Controllers\MaritimeAcademyController;
use App\Http\Controllers\MaritimeAdministrationController;
use App\Http\Controllers\MaritimeTransportController;
use App\Http\Controllers\TrainPunctualityController;
use App\Http\Controllers\GrossDomesticProductionController;
use App\Http\Controllers\ShipContainerTrafficController;
use App\Http\Controllers\RailwayRollingStockController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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
    return redirect()->route('login');
});



Route::get('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

  





Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vehicleImportation', [App\Http\Controllers\VehicleImportationController::class, 'vehicleImportation' ])->name('vehicleImportation');
Route::get('/railwayPassenger', [App\Http\Controllers\RailwayPassengerController::class, 'railwayPassenger' ])->name('railwayPassenger');
Route::get('/freightRoad', [App\Http\Controllers\FreightRoadTransportDataController::class, 'freightRoad'])->name('freightRoad');
Route::get('/passengerRoad', [App\Http\Controllers\PassengerRoadTransportDataController::class, 'passengerRoad' ])->name('passengerRoad');
Route::get('/airTransport', [App\Http\Controllers\AirTransportDataController::class, 'airTransport' ])->name('airTransport');
Route::get('/airTraffic', [App\Http\Controllers\AirTrafficDataController::class, 'airTraffic' ])->name('airTraffic');
Route::get('/rollingStock', [App\Http\Controllers\RailwayRollingStockController::class, 'rollingStock' ])->name('rollingStock');
Route::get('/marineAcad', [App\Http\Controllers\MaritimeAcademyController::class, 'marineAcad' ])->name('marineAcad');
Route::get('/marineAdmin', [App\Http\Controllers\MaritimeAdministrationController::class, 'marineAdmin' ])->name('marineAdmin');
Route::get('/marineTransport', [App\Http\Controllers\MaritimeTransportController::class, 'marineTransport' ])->name('marineTransport');
Route::get('/trainPunctuality', [App\Http\Controllers\TrainPunctualityController::class, 'trainPunctuality' ])->name('trainPunctuality');
Route::get('/grossDomestic', [App\Http\Controllers\GrossDomesticProductionController::class, 'grossDomestic' ])->name('grossDomestic');
Route::get('/shipContainer', [App\Http\Controllers\ShipContainerTrafficController::class, 'shipContainer' ])->name('shipContainer');




//CRUD ROUTE

Route::get('form', function(){
    return view('form');

});

//Route::post('store_data', [App\Http\Controllers\VehicleImportationController::class, 'store_data']);
//Route::get('records', [App\Http\Controllers\VehicleImportationController::class, 'records']);

//Route::get('vehicleImportation/list', [VehicleImportationController::class, 'getVehicle'])->name('vehicleImportation.list');


//DATATABLE

Route::get('ajax-crud-datatable',[VehicleImportationController::class, 'vehicleImportation'] )->name('ajax-crud-datatable');
Route::post('store', [VehicleImportationController::class,'store' ]);
Route::post('edit', [VehicleImportationController::class,'edit' ]);
Route::post('delete', [VehicleImportationController::class,'delete' ]);


//VEHICLE iMPORTATION

Route::get('records', [VehicleImportationController::class, 'records'])->name('records');
Route::post('vehicleImportation', [VehicleImportationController::class, 'store'])->name('vehicleImportation.store');
Route::put('vehicleImportation/{id}', [VehicleImportationController::class, 'update'])->name('vehicleImportation.update');
Route::delete('vehicleImportation/{id}', [VehicleImportationController::class, 'destroy'])->name('vehicleImportation.destroy');
Route::get('/vehicleImportation/{id}/data', [VehicleImportationController::class, 'getData'])->name('vehicleImportation.data');


//ROAD PASSENGER
Route::get('passengers', [PassengerRoadTransportDataController::class, 'passengers'])->name('passengers');
Route::post('passengerRoadTransport', [PassengerRoadTransportDataController::class, 'store'])->name('passengerRoadTransport.store');
Route::put('passengerRoadTransport/{id}', [PassengerRoadTransportDataController::class, 'update'])->name('passengerRoadTransport.update');
Route::delete('passengerRoadTransport/{id}', [PassengerRoadTransportDataController::class, 'destroy'])->name('passengerRoadTransport.destroy');

//ROAD FREIGHT

Route::get('freights', [FreightRoadTransportDataController::class, 'freights'])->name('freights');
Route::post('freightRoadTransport', [FreightRoadTransportDataController::class, 'store'])->name('freightRoadTransport.store');
Route::put('freightRoadTransport/{id}', [FreightRoadTransportDataController::class, 'update'])->name('freightRoadTransport.update');
Route::delete('freightRoadTransport/{id}', [FreightRoadTransportDataController::class, 'destroy'])->name('freightRoadTransport.destroy');


//AIR TRANSPORT

Route::get('transports', [AirTransportDataController::class, 'transports'])->name('transports');
Route::post('airTransport', [AirTransportDataController::class, 'store'])->name('airTransport.store');
Route::put('airTransport/{id}', [AirTransportDataController::class, 'update'])->name('airTransport.update');
Route::delete('airTransport/{id}', [AirTransportDataController::class, 'destroy'])->name('airTransport.destroy');


//AIR TRAFFIC

Route::get('traffics', [AirTrafficDataController::class, 'traffics'])->name('traffics');
Route::post('airTrafficData', [AirTrafficDataController::class, 'store'])->name('airTrafficData.store');
Route::put('airTrafficData/{id}', [AirTrafficDataController::class, 'update'])->name('airTrafficData.update');
Route::delete('airTrafficData/{id}', [AirTrafficDataController::class, 'destroy'])->name('airTrafficData.destroy');


//ROLLING STOCK

Route::get('stocks', [RailwayRollingStockController::class, 'stocks'])->name('stocks');
Route::post('RailwayRollingStock', [RailwayRollingStockController::class, 'store'])->name('RailwayRollingStock.store');
Route::put('RailwayRollingStock/{id}', [RailwayRollingStockController::class, 'update'])->name('RailwayRollingStock.update');
Route::delete('RailwayRollingStock/{id}', [RailwayRollingStockController::class, 'destroy'])->name('RailwayRollingStock.destroy');






//MARITIME ACADEMY

Route::get('macademys', [MaritimeAcademyController::class, 'macademys'])->name('macademys');
Route::post('maritimeAcademy', [MaritimeAcademyController::class, 'store'])->name('maritimeAcademy.store');
Route::put('maritimeAcademy/{id}', [MaritimeAcademyController::class, 'update'])->name('maritimeAcademy.update');
Route::delete('maritimeAcademy/{id}', [MaritimeAcademyController::class, 'destroy'])->name('maritimeAcademy.destroy');


//MARITIME ADMIN

Route::get('madmins', [MaritimeAdministrationController::class, 'madmins'])->name('madmins');
Route::post('maritimeAdministration', [MaritimeAdministrationController::class, 'store'])->name('maritimeAdministration.store');
Route::put('maritimeAdministration/{id}', [MaritimeAdministrationController::class, 'update'])->name('maritimeAdministration.update');
Route::delete('maritimeAdministration/{id}', [MaritimeAdministrationController::class, 'destroy'])->name('maritimeAdministration.destroy');


//MARITIME TRANSPORT

Route::get('mtransports', [MaritimeTransportController::class, 'mtransports'])->name('mtransports');
Route::post('maritimeTransport', [MaritimeTransportController::class, 'store'])->name('maritimeTransport.store');
Route::put('maritimeTransport/{id}', [MaritimeTransportController::class, 'update'])->name('maritimeTransport.update');
Route::delete('maritimeTransport/{id}', [MaritimeTransportController::class, 'destroy'])->name('maritimeTransport.destroy');


//TRAIN PUNCTUALITY

Route::get('trains', [TrainPunctualityController::class, 'trains'])->name('trains');
Route::post('trainPunctuality', [TrainPunctualityController::class, 'store'])->name('trainPunctuality.store');
Route::put('trainPunctuality/{id}', [TrainPunctualityController::class, 'update'])->name('trainPunctuality.update');
Route::delete('trainPunctuality/{id}', [TrainPunctualityController::class, 'destroy'])->name('trainPunctuality.destroy');


//GROSS DOMESTIC

Route::get('grosses', [GrossDomesticProductionController::class, 'grosses'])->name('grosses');
Route::post('grossDomesticProduction', [GrossDomesticProductionController::class, 'store'])->name('grossDomesticProduction.store');
Route::put('grossDomesticProduction/{id}', [GrossDomesticProductionController::class, 'update'])->name('grossDomesticProduction.update');
Route::delete('grossDomesticProduction/{id}', [GrossDomesticProductionController::class, 'destroy'])->name('grossDomesticProduction.destroy');


//SHIP CONTAINER TRAFFIC

Route::get('ships', [ShipContainerTrafficController::class, 'ships'])->name('ships');
Route::post('shipContainerTraffic', [ShipContainerTrafficController::class, 'store'])->name('shipContainerTraffic.store');
Route::put('shipContainerTraffic/{id}', [ShipContainerTrafficController::class, 'update'])->name('shipContainerTraffic.update');
Route::delete('shipContainerTraffic/{id}', [ShipContainerTrafficController::class, 'destroy'])->name('shipContainerTraffic.destroy');






//CRUD

//Route::get('/vehicleImportation', [VehicleImportationController::class, 'index'])->name('vehicleImportation.index');
//Route::get('/vehicleImportation/create', [VehicleImportationController::class, 'create'])->name('vehicleImportation.create');
//Route::post('/vehicleImportation/store', [VehicleImportationController::class, 'store_data'])->name('vehicleImportation.store');
//Route::get('/vehicleImportation/edit/{id}', [VehicleImportationController::class, 'edit'])->name('vehicleImportation.edit');
//Route::post('/vehicleImportation/update/{id}', [VehicleImportationController::class, 'update'])->name('vehicleImportation.update');
//Route::delete('/vehicleImportation/destroy/{id}', [VehicleImportationController::class, 'destroy'])->name('vehicleImportation.destroy');


Route::get('/graph', [VehicleImportationController::class, 'loadGraphPage'])->name('graphPage');



Route::get('VehicleImportation/export', [VehicleImportationController::class, 'export'])->name('VehicleImportation.export');
Route::post('VehicleImportation/import', [VehicleImportationController::class, 'import'])->name('VehicleImportation.import');





Route::group(['prefix' => 'users', 'as' => 'users.'], function (){
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RolesController::class);

});
Route::resource('users', UsersController::class); 




