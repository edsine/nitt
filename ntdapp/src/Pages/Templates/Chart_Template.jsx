import React from 'react';
import BarChartjs from '../../Components/BarChartjs';
import HorizontalBarChartjs from '../../Components/HorizontalBarChartjs';


export default function ChartTemp() {
    return (
        <div>
            ChartTemp
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
    );
}
