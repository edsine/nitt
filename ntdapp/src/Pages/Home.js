// Home.js
import React from 'react';
import BarChart from '../Components/BarChart';

const Home = () => {
  // Mock data for the chart
  const chartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Sales',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(255, 255, 255, 0.6)',
          'rgba(255, 255, 255, 0.6)',
          'rgba(255, 255, 255, 0.6)'
        ],
        // borderColor: 'rgba(75,192,192,1)',
        borderWidth: 1,
      },
    ],
  };

  return (
    <>
      <h1>Home</h1>
      <BarChart chartData={chartData} />
    </>
  );
};

export default Home;
