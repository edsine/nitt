// Home.js
import React from 'react';
import BarChart from '../Components/BarChart';
import LineChart from '../Components/LineChart';
import GdpPieChart from '../Components/PieChart';
import  { gdpData } from '../'

const Home = () => {
  const chartData2 = {
    years: [
      // Years from 1981 to 2021
      "1981", "1982", "1983", "1984", "1985", "1986", "1987", "1988", "1989", "1990",
      "1991", "1992", "1993", "1994", "1995", "1996", "1997", "1998", "1999", "2000",
      "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010",
      "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021"
    ],
    roadTransport: [
      45, 36, 36, 40, 47, 48, 51, 53, 57, 59, 60, 67, 69, 81, 84, 85, 85, 86, 86, 85,
      84, 83, 86, 90, 90, 90, 89, 89, 89, 89, 86, 86, 85, 85, 85, 86, 88, 88, 89, 90, 90, 90
    ],
    railTransport: [
      18, 20, 18, 18, 17, 17, 12, 10, 7, 6, 6, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
      0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
    ],
    // Add data for other sectors similarly...
  };
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
      <LineChart data={chartData2} />
    </>
  );
};

export default Home;
