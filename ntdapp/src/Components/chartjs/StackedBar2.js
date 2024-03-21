import React from 'react';
import { HorizontalBar } from 'react-chartjs-2';

 const StackedBar2 = () => {
    const options = {
        animation: {
          duration: 0
        },
        scales: {
          xAxes: [{ stacked: true }],
          yAxes: [{ stacked: true }]
        },
        legend: {
          labels: {
            boxWidth: 12
          }
        },
        maintainAspectRatio: false,
        tooltips: {
          displayColors: true,
          callbacks: {
            mode: "single",
            labelColor: function (tooltipItem, chart) {
              return {
                borderColor: "transparent",
                backgroundColor:
                  data.datasets[tooltipItem.datasetIndex].backgroundColor
              };
            },
            label: function (tooltipItem, data) {
              return (
                " " +
                data.datasets[tooltipItem.datasetIndex].label +
                ": " +
                data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] +
                "%"
              );
            }
          },
          backgroundColor: "#fff",
          titleFontSize: 10,
          titleFontColor: "#000",
          bodyFontSize: 10,
          bodyFontColor: "#000",
          shadowOffsetX: 1,
          shadowOffsetY: 1,
          shadowBlur: 6,
          shadowColor: "rgba(0,0,0,0.4)",
          bodySpacing: 8,
          xPadding: 10,
          yPadding: 10,
          caretSize: 0
        }
      };
// const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
const labels = ["Projection"];
 let data ={ 
  labels,
   datasets:[{
     label: 'Dataset 1',
       data :labels.map(() => [100, 200, 300, 400, 500, 600, 700]),
       backgroundColor: 'rgb(255, 99, 132)',
     },
     {
       label: 'Dataset 2',
       data :labels.map(() => [100, 200, 300, 400, 500, 600, 700]),
       backgroundColor: 'rgb(75, 192, 192)',   
     },
     {
      label: 'Dataset 3',
      data:  labels.map(() => [100, 200, 300, 400, 500, 600, 700]),
      backgroundColor: 'rgb(53, 162, 235)',  
    }],
   //labels:['label']
 }
/*  const arbitraryStackKey = "stack1";
const data = {
  labels: ['a', 'b', 'c', 'd', 'e'],
  datasets: [
    // These two will be in the same stack.
    {
      stack: arbitraryStackKey,
      label: 'data1',
      data: [1, 2, 3, 4, 5]
    },
    {
      stack: arbitraryStackKey,
      label: 'data2',
      data: [5, 4, 3, 2, 1]   
    }
  ]
} */
  
  return <HorizontalBar options={options} data={data} />;
}

export default StackedBar2;
