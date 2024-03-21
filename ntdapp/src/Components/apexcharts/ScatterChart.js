import React, { ReactDOM } from "react";
import ReactApexChart from "react-apexcharts";

class ScatterChart extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
        
          series: [{
            /* name: "SAMPLE B", */
            data: [
                [36.4, 13.4], [1.7, 11], [5.4, 8], [9, 17], [1.9, 4], [3.6, 12.2], [1.9, 14.4], [1.9, 9], [1.9, 13.2], [1.4, 7], [6.4, 8.8], [3.6, 4.3], [1.6, 10], [9.9, 2], [7.1, 15], [1.4, 0], [3.6, 13.7], [1.9, 15.2], [6.4, 16.5], [0.9, 10], [4.5, 17.1], [10.9, 10], [0.1, 14.7], [9, 10], [12.7, 11.8], [2.1, 10], [2.5, 10], [27.1, 10], [2.9, 11.5], [7.1, 10.8], [2.1, 12]]
          }],
          options: {
            chart: {
              height: 350,
              type: 'scatter',
              zoom: {
                enabled: true,
                type: 'xy'
              }
            },
            xaxis: {
              tickAmount: 3,
              labels: {
                formatter: function(val) {
                  return parseFloat(val).toFixed(1)
                }
              }
            },
            yaxis: {
              tickAmount: 7
            }
          },
        
        
        };
      }

    

      render() {
        return (
          

    <div id="chart">
<ReactApexChart options={this.state.options} series={this.state.series} type="scatter" height={350} />
</div>
);
}
}

export default ScatterChart;