<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrossDomesticProduct;

class GrossDomesticProductionController extends Controller
{
    public function grossDomestic()
    {
        return view('grossDomestic');
    }

    public function store(Request $request)
    {
        GrossDomesticProduct::create($request->all());
        return redirect()->route('grosses');
    }
    
    public function update(Request $request, $id)
    {
        $gross = GrossDomesticProduct::findOrFail($id);
        $gross->update($request->all());
        return redirect()->route('grosses');
    }
    
    public function destroy($id)
    {
        GrossDomesticProduct::destroy($id);
        return redirect()->route('grosses');
    }
    
    function grosses(){
    
        $grosses = GrossDomesticProduct::all();
    
        return view ('grossDomestic', compact('grosses'));
        
    
        }


        public function loadGraphPage(){

            $GrossDomesticProduct_data = GrossDomesticProduct::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $GrossDomesticProduct_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }




}
