import React from 'react';
import { Bar } from 'react-chartjs-2';

 const StackedBar = () => {
  const options = {
    
    responsive: true,
    scales: {
         xAxes: [{
             stacked: true
         }],
         yAxes: [{
             stacked: true
         }]
     }
 }
 const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
 const DATA_COUNT = 7;
 const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

 let data ={ 
  labels,
   datasets:[{
     label: 'Dataset 1',
       data :labels.map(() => [86.382, -75.849, -43.224, 97.838, 9.064, -10.78, 10.94]),
       backgroundColor: 'rgb(255, 99, 132)',
     },
     {
       label: 'Dataset 2',
       data :labels.map(() => [-79.978, 8.615, -14.11, 61.725, -28.078, -66.235, -65.091]),
       backgroundColor: 'rgb(75, 192, 192)',   
     },
     {
      label: 'Dataset 3',
      data:  labels.map(() => [-57.894, 80.698, -92.027, 60.789, -44.987, 75.887, -55.667]),
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
  
  return <Bar options={options} data={data} />;
}

export default StackedBar;
