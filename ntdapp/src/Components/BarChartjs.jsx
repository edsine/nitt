import React, { useEffect, useRef } from 'react';
import Chart from 'chart.js/auto'; // Import Chart.js


const BarChart = ({ data }) => {
    const chartRef = useRef(null);
  
    useEffect(() => {
      if (data && chartRef.current) {
        const ctx = chartRef.current.getContext('2d');
  
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: data.map(item => item.activity_sector),
            datasets: [
              {
                label: 'Transportation and Storage',
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: data.map(item => item.transportation_and_storage),
              },
              // You can add more datasets for other categories if needed
            ],
          },
          options: {
            responsive: true,
            scales: {
              x: {
                title: {
                  display: true,
                  text: 'Year',
                },
              },
              y: {
                title: {
                  display: true,
                  text: 'Value',
                },
                min: 0,
              },
            },
          },
        });
      }
    }, [data]);
  
    return <canvas ref={chartRef} />;
  };
  
  export default BarChart;
  