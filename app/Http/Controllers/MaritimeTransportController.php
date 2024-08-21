<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritimeTransport;

class MaritimeTransportController extends Controller
{
    public function marineTransport()
    {
        return view('marineTransport');
    }



    public function store(Request $request)
    {
        MaritimeTransport::create($request->all());
        return redirect()->route('mtransports');
    }
    
    public function update(Request $request, $id)
    {
        $mtransport = MaritimeTransport::findOrFail($id);
        $mtransport->update($request->all());
        return redirect()->route('mtransports');
    }
    
    public function destroy($id)
    {
        MaritimeTransport::destroy($id);
        return redirect()->route('mtransports');
    }
    
    function mtransports(){
    
        $mtransports = MaritimeTransport::all();
    
        return view ('marineTransport', compact('mtransports'));
        
    
        }



        
        public function loadGraphPage(){

            $MaritimeTransport_data = MaritimeTransport::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $MaritimeTransport_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }

}
