<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class HelpersAPIController
 * @package App\Http\Controllers\API
 */

class HelpersAPIController extends AppBaseController
{
    public function index(Request $request)
    {
        $states = getStates();
        $ports = getSeaPorts();
        $road_routes = getRoadRoutes();
        $airports = getAirports();
        $traffic_violation_categories = getTrafficViolations();
        $driver_license_classes = getDriverLicenseClasses();
        $vehicle_categories_for_plate_numbers = getVehicleCategoriesForPlateNumbers();
        $vehicle_categories = getVehicleCategories();

        return $this->sendResponse([
            'states' => $states,
            'ports' => $ports,
            'road_routes' => $road_routes,
            'airports' => $airports,
            'traffic_violation_categories' => $traffic_violation_categories,
            'driver_license_classes' => $driver_license_classes,
            'vehicle_categories_for_plate_numbers' => $vehicle_categories_for_plate_numbers,
            'vehicle_categories' => $vehicle_categories
        ], 'Helpers retrieved successfully');
    }
}
