import React, { ReactDOM } from "react";
import ReactApexChart from "react-apexcharts";

class ApexChart2 extends React.Component {
    constructor(props) {
      super(props);

      this.state = {
      
        series: [{
         /*  name: 'series1', */
          data: [600000, 5000, 400, 300, 200, 100, 0],
          
        }/* , {
          name: 'series2',
          data: [11, 32, 45, 32, 34, 52, 41]
        } */],
        options: {
          chart: {
            height: 350,
            type: 'area'
          },
          plotOptions: {
            area: {
             // horizontal: true,
              //columnWidth: '57%',
              //endingShape: "rounded",
              //borderRadius: 12,
              
            },
            
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
            
          },
          yaxis: {
            
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

export default ApexChart2;
/* const domContainer = document.querySelector('#app');
ReactDOM.render(React.createElement(ApexChart), domContainer); */