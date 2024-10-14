import React from 'react';
import BarChartjs from '../../Components/BarChartjs';
import HorizontalBarChartjs from '../../Components/HorizontalBarChartjs';
import Navbar from '../../Components/LandBar.js';


export default function ChartTemp() {
    return (
        <div>
            <Navbar/>
            <div className="bg-green-100 min-h-screen p-4">
            <h1 className='m-5 font-light text-center'>Charts</h1>
            <div className="row">
                <div className="col-md-12my-5">
                    <div className="card">
                        <div className="card-body">
                            <BarChartjs />
                        </div>
                    </div>
                </div>
                <div className="col-md-12 my-5">
                    <div className="card">
                        <div className="card-body">
                            <HorizontalBarChartjs />
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
