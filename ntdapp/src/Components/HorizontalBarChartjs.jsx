import React, { useEffect, useRef } from 'react';
import Chart from 'chart.js/auto'; // Import Chart.js

const HorizontalBarChartjs = ({ data }) => {
    const chartRef = useRef(null);
  
    useEffect(() => {
      if (data && chartRef.current) {
        const ctx = chartRef.current.getContext('2d');
  
        new Chart(ctx, {
          type: 'bar', // Set chart type to horizontal bar
          data: {
            labels: data.map(item => item.activity_sector),
            datasets: [
              {
                label: 'Road Transport', // Set label to Road Transport
                backgroundColor: 'rgba(255, 99, 132, 0.6)', // Set background color
                borderColor: 'rgba(255, 99, 132, 1)', // Set border color
                borderWidth: 1,
                data: data.map(item => item.road_transport), // Use road_transport data
              },
            ],
          },
          options: {
            responsive: true,
            scales: {
              x: {
                title: {
                  display: true,
                  text: 'Road Transport', // Set x-axis title
                },
              },
              y: {
                title: {
                  display: true,
                  text: 'Year',
                },
              },
            },
          },
        });
      }
    }, [data]);
  
    return <canvas ref={chartRef} />;
};

export default HorizontalBarChartjs;
