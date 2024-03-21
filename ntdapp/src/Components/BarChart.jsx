import React from 'react';
import Chart from 'react-apexcharts';



export default function BarChart() {
  // Define your chart options and data
  const options = {
    chart: {
      type: 'bar',
    },
    xaxis: {
      categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    },
  };

  const series = [
    {
      name: 'Sales',
      data: [30, 40, 45, 50, 49, 60, 70],
    },
  ];

  return (
    <div>
      <h1>My Chart</h1>
      <Chart options={options} series={series} type="bar" height={350} />
    </div>
  );
}
