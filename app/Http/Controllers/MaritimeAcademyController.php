<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritimeAcademy;

class MaritimeAcademyController extends Controller
{
    public function marineAcad()
    {
        return view('marineAcad');
    }




    public function store(Request $request)
    {
        MaritimeAcademy::create($request->all());
        return redirect()->route('macademys');
    }
    
    public function update(Request $request, $id)
    {
        $macademy = MaritimeAcademy::findOrFail($id);
        $macademy->update($request->all());
        return redirect()->route('macademys');
    }
    
    public function destroy($id)
    {
        MaritimeAcademy::destroy($id);
        return redirect()->route('macademys');
    }
    
    function macademys(){
    
        $macademys = MaritimeAcademy::all();
    
        return view ('marineAcad', compact('macademys'));
        
    
        }



        public function loadGraphPage(){

            $MaritimeAcademy_data = MaritimeAcademy::all();
        
            $labels = [];
            $data = [];
        
            foreach ( $MaritimeAcademy_data as $value){
                $labels[] = $value[''];
                $data[] = $value[''];
            }
        
            return view('graphPage')
            ->with('labels', $labels)
            ->with('data', $data);
        }




}
