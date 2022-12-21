<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\AirPassengersTraffic;
use App\Models\FreightRoadTransportData;
use App\Models\PassengerRoadTransportData;
use App\Models\VehicleImportation;

/**
 * Class RailwaySafetyController
 * @package App\Http\Controllers\API
 */

class DashboardAPIController extends AppBaseController
{

    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $year = $request->get('year');
        $road_passenger_carried = PassengerRoadTransportData::where('year', '=', $year)->sum('number_of_passengers_carried');
        $freight_tonnes_carried = FreightRoadTransportData::where('year', '=', $year)->sum('number_of_tonnes_carried');
        $air_passenger_carried = AirPassengersTraffic::where('year', '=', $year)->sum('domestic_passengers_traffic');
        $air_passenger_carried_int = AirPassengersTraffic::where('year', '=', $year)->sum('international_passengers_traffic');
        $new_cars_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 1)->sum('new_vehicle_count');
        $used_cars_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 1)->sum('used_vehicle_count');
        $new_buses_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 2)->sum('new_vehicle_count');
        $used_buses_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 2)->sum('used_vehicle_count');
        $new_trucks_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 3)->sum('new_vehicle_count');
        $used_trucks_imported = VehicleImportation::where('year', '=', $year)->where('vehicle_category', '=', 3)->sum('used_vehicle_count');
        return $this->sendResponse(
            [
                'roadPassengerCarried' => $road_passenger_carried,
                'freightTonnesCarried' => $freight_tonnes_carried,
                'airPassengerCarried' => $air_passenger_carried,
                'airPassengerCarriedInt' => $air_passenger_carried_int,
                'newCarsImported' => $new_cars_imported,
                'usedCarsImported' => $used_cars_imported,
                'newBusesImported' => $new_buses_imported,
                'usedBusesImported' => $used_buses_imported,
                'newTrucksImported' => $new_trucks_imported,
                'usedTrucksImported' => $used_trucks_imported,
            ],
            'Dashboard data retrieved successfully'
        );
    }
}
