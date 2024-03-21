import React from 'react';
import Chart from 'react-apexcharts';

const LineChart = ({ data }) => {
  // Extract years and sector data
  const { years, roadTransport, railTransport } = data;

  // Chart options
  const options = {
    chart: {
      type: 'line',
      height: 350
    },
    xaxis: {
      categories: years
    }
  };

  // Chart series
  const series = [
    {
      name: 'Road Transport',
      data: roadTransport
    },
    {
      name: 'Rail Transport & Pipelines',
      data: railTransport
    }
    // Add series for other sectors similarly...
  ];

  return (
    <div>
      <h3>GDP Trend for Activity Sectors</h3>
      <Chart options={options} series={series} type="line" height={350} />
    </div>
  );
};

export default LineChart;
