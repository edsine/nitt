<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreightRoadTransportData;
use App\Imports\FreightRoadTransportDataImport;
use App\Exports\FreightRoadTransportDataExport;

class FreightRoadTransportDataController extends Controller
{
    public function freightRoad()
    {
        return view('freightRoad');
    }


    public function store(Request $request)
    {
        FreightRoadTransportData::create($request->all());
        return redirect()->route('freights');
    }
    
    public function update(Request $request, $id)
    {
        $freight = FreightRoadTransportData::findOrFail($id);
        $freight->update($request->all());
        return redirect()->route('freights');
    }
    
    public function destroy($id)
    {
        FreightRoadTransportData::destroy($id);
        return redirect()->route('freights');
    }
    
    function freights(){
    
        $freights = FreightRoadTransportData::all();
    
        return view ('freightRoad', compact('freights'));
        
    
        }



        public function loadGraphPage(){

            $FreightRoadTransportData_data = FreightRoadTransportData::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $FreightRoadTransportData_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }




        public function import(Request $request)
        {
            Excel::import(new FreightRoadTransportDataImport, $request->file('file')->store('temp'));
            return back()->with('success', 'FreightRoadTransportData imported successfully.');
        }
        
        public function export()
        {
            return Excel::download(new FreightRoadTransportDataExport, 'FreightRoadTransportData.xlsx');
        }


}
