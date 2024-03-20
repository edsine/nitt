import React from 'react';
import { Bar } from 'react-chartjs-2';
import { Chart } from 'chart.js'; // Import for time scale adapter (optional)
import { TimeAdapter } from 'chartjs-adapter-moment'; 

const ChartText = () => {
  // Sample data for the chart (replace with your actual data)
  const data = {
    labels: ['January', 'February', 'March', 'April', 'May'],
    datasets: [
      {
        label: 'Sales',
        data: [65, 59, 80, 81, 56],
        backgroundColor: 'rgba(75,192,192,0.2)',
        borderColor: 'rgba(75,192,192,1)',
        borderWidth: 1,
      },
    ],
  };

  // Chart options with time scale configuration (optional)
  const options = {
    scales: {
      x: {
        type: 'time', // Set the x-axis scale to time (optional)
        time: {
          unit: 'month' // Set the time unit on the x-axis to months (optional)
        }
      },
      y: {
        beginAtZero: true // Optionally, adjust the scale for the y-axis
      }
    },
  };

  // Register TimeAdapter (optional, for time scale)
  Chart.register(TimeAdapter); // Import TimeAdapter if needed for time scale

  return (
    <div>
      <h2>Bar Chart Example</h2>  {/* Add a title for clarity */}
      <Bar data={data} options={options} />  {/* Pass data and options */}
    </div>
  );
};

export default ChartText;
