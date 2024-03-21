import React from 'react';
import BarChartjs from '../../Components/BarChartjs';
import HorizontalBarChartjs from '../../Components/HorizontalBarChartjs';
import jsonData from '../../data/gdp'


export default function ChartTemp() {
    return (
        <div>
            ChartTemp
            <div className="row">
                <div className="col-md-12my-5">
                    <div className="card">
                        <div className="card-body">
                            <BarChartjs  data={jsonData}/>
                        </div>
                    </div>
                </div>
                <div className="col-md-12 my-5">
                    <div className="card">
                        <div className="card-body">
                        <HorizontalBarChartjs data={jsonData} />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
