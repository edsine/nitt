<?php

namespace App\Http\Controllers;

use App\Exports\VehicleImportationExport;
use App\Imports\VehicleImportantImport;
use Illuminate\Http\Request;
use App\Models\VehicleImportation;
use App\DataTables\vehicleImportationDataTable;
use Yajra\DataTables\DataTables;
use illuminate\Http\RedirectResponse;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;



class VehicleImportationController extends Controller
{
   
        
      function records(){

      $records = VehicleImportation::all();

      return view ('vehicleImportation', compact('records'));
      

      }
      
      
      
      
      



public function store(Request $request)
{
    VehicleImportation::create($request->all());
    return redirect()->route('records');
}

public function update(Request $request, $id)
{
    $record = VehicleImportation::findOrFail($id);
    $record->update($request->all());
    return redirect()->route('records');
}

public function destroy($id)
{
    VehicleImportation::destroy($id);
    return redirect()->route('records');
}

public function loadGraphPage()
{
    $vehicleImportation_data = VehicleImportation::selectRaw('vehicle_category, SUM(new_vehicle_count) as new_count, SUM(used_vehicle_count) as used_count')
        ->groupBy('vehicle_category')
        ->get();

    $labels = $vehicleImportation_data->pluck('vehicle_category');
    $data = $vehicleImportation_data->map(function($item) {
        return $item->new_count + $item->used_count;
    });

    return view('graphPage', compact('labels', 'data'));
}


public function getData($id)
{
    $record = VehicleImportation::find($id);
    
    if ($record) {
        return response()->json([
            'year' => $record->year, 
            'vehicle_category' => $record->vehicle_category,
            'new_vehicle_count' => $record->new_vehicle_count,
            'used_vehicle_count' => $record->used_vehicle_count
        ]);
    }
    
    return response()->json(['error' => 'Record not found'], 404);
}



public function import(Request $request)
{

    Excel::import(new VehicleImportantImport, $request->file('file')->store('temp'));
    return back()->with('success', 'vehicleImportations imported successfully.');
}

public function export()
{
    return Excel::download(new VehicleImportationExport, 'vehicleImportations.xlsx');
}


}



