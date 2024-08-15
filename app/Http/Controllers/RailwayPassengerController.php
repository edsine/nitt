<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RailwayPassenger;

class RailwayPassengerController extends Controller
{
    public function railwayPassenger()
    {
        return view('railwayPassenger');
    }
}

