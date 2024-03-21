import React, { useState, useEffect } from 'react';
import { Line } from 'react-chartjs-2';

function ChartContainer() {
  const [chartData, setChartData] = useState({});

  useEffect(() => {
    fetch('http://localhost:1337/api/indicator-detail-metas')
      .then(response => response.json())
      .then(data => {
        setChartData({
          labels: data.labels,
          datasets: [
            {
              label: 'Chart Data',
              data: data.data,
              backgroundColor: 'rgba(75,192,192,0.4)',
              borderColor: 'rgba(75,192,192,1)'
            }
          ]
        });
      })
      .catch(error => console.log(error));
  }, []);

  return (
    <div>
      {chartData.datasets ? (
        <Line
          data={chartData}
          options={{
            responsive: true,
            maintainAspectRatio: false
          }}
        />
      ) : null}
    </div>
  );
}

export default ChartContainer;