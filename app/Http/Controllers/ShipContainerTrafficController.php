<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipContainerTraffic;

class ShipContainerTrafficController extends Controller
{
    public function shipContainer()
    {
        return view('shipContainer');
    }


    public function store(Request $request)
    {
        ShipContainerTraffic::create($request->all());
        return redirect()->route('ships');
    }
    
    public function update(Request $request, $id)
    {
        $ship = ShipContainerTraffic::findOrFail($id);
        $ship->update($request->all());
        return redirect()->route('ships');
    }
    
    public function destroy($id)
    {
        ShipContainerTraffic::destroy($id);
        return redirect()->route('ships');
    }
    
    function ships(){
    
        $ships = ShipContainerTraffic::all();
    
        return view ('shipContainer', compact('ships'));
        
    
        }





        public function loadGraphPage(){

            $ShipContainerTraffic_data = ShipContainerTraffic::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $ShipContainerTraffic_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }

}
