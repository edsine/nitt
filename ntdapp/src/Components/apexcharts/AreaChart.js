import React, { ReactDOM } from "react";
import ReactApexChart from "react-apexcharts";
class ApexChart extends React.Component {
    constructor(props) {
      super(props);

      this.state = {
      
        series: [{
         /*  name: 'series1', */
          data: [0, 100, 200, 300, 400, 5000, 600000]
        }/* , {
          name: 'series2',
          data: [11, 32, 45, 32, 34, 52, 41]
        } */],
        options: {
          chart: {
            height: 350,
            type: 'area'
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          xaxis: {
            type: 'date',
            categories: ["1991", "1992", "1993", "1994", "1995", "1996", "1997"],
            labels: {
                  style: {
                    colors: '#8e8da4',
                  }
                },
            color: 'rgb(2,131,79,0.9)'
          },
          tooltip: {
            x: {
              format: 'dd/MM/yy'
            },
          },
        },
      
      
      };
    }

  

    render() {
      return (
        

  <div id="chart">
<ReactApexChart options={this.state.options} series={this.state.series} type="area" height={350} />
</div>
 );
}
}

export default ApexChart;
/* const domContainer = document.querySelector('#app');
ReactDOM.render(React.createElement(ApexChart), domContainer); */