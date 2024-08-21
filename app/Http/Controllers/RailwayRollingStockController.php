<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RailwayRollingStock;

class RailwayRollingStockController extends Controller
{
    public function rollingStock()
    {
        return view('rollingStock');
    }



    public function store(Request $request)
    {
        RailwayRollingStock::create($request->all());
        return redirect()->route('stocks');
    }
    
    public function update(Request $request, $id)
    {
        $stock = RailwayRollingStock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('stocks');
    }
    
    public function destroy($id)
    {
        RailwayRollingStock::destroy($id);
        return redirect()->route('stocks');
    }
    
    function stocks(){
    
        $stocks = RailwayRollingStock::all();
    
        return view ('rollingStock', compact('stocks'));
        
    
        }



        public function loadGraphPage(){

            $RailwayRollingStock_data = RailwayRollingStock::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $RailwayRollingStock_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }


}
