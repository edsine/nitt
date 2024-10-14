import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import ApexCharts from 'react-apexcharts';
import { Form, Spinner, Alert } from 'react-bootstrap';

function DataSetCharts() {
  const { datasetName, tableName, selectedEndpoint } = useParams();
  const [data, setData] = useState([]);
  const [selectedYear, setSelectedYear] = useState('');
  const [chartType, setChartType] = useState('line');
  const [suitableChartTypes, setSuitableChartTypes] = useState(['line']);
  const [years, setYears] = useState([]);
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const API_URL = process.env.REACT_APP_API_URL;
    const fetchData = async () => {
      try {
        const response = await fetch(`${API_URL}/${selectedEndpoint}`);
        if (!response.ok) {
          throw new Error('Failed to fetch data');
        }
        const jsonData = await response.json();
        setData(jsonData);

        const years = jsonData.map(item => item.year);
        setYears(years);
        setSelectedYear(years[0] || '');

        const categories = Object.keys(jsonData[0]).filter(key => key !== 'id' && key !== 'year');
        setCategories(categories);

        // Define suitable chart types based on the data
        setSuitableChartTypes(categories.length > 1 ? ['line', 'bar', 'area', 'scatter'] : ['line', 'area', 'pie', 'donut']);

        setChartType('line');
      } catch (error) {
        setError(error.message);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, [selectedEndpoint]);

    const handleChangeYear = (event) => {
    setSelectedYear(event.target.value);
  };

  const handleChangeChartType = (type) => {
    setChartType(type);
  };

  const chartOptions = {
    chart: {
      type: chartType,
      height: 350,
      toolbar: {
        show: true,
      },
    },
    xaxis: {
      categories: years,
      title: {
        text: 'Year',
      },
    },
    title: {
      text: `${datasetName} - ${tableName} Chart`,
      align: 'center',
    },
    yaxis: {
      title: {
        text: 'Value',
      },
    },
  };

  const seriesData = categories.map(category => ({
    name: category,
    data: data.map(item => ({
      x: item.year,
      y: parseFloat(item[category]) || 0,
    })),
  }));

  return (
    <div>
      <h2>{datasetName} - {tableName} Chart</h2>
      {loading && <Spinner animation="border" />}
      {error && <Alert variant="danger">Error: {error}</Alert>}
      {!loading && !error && (
        <Form className="my-4">
          <Form.Group controlId="exampleForm.SelectCustom">
            <Form.Label>Select Year</Form.Label>
            <Form.Select value={selectedYear} onChange={handleChangeYear}>
              {years.map((year, index) => (
                <option key={index} value={year}>
                  {year}
                </option>
              ))}
            </Form.Select>
          </Form.Group>
          {suitableChartTypes.length > 0 && (
            <Form.Group controlId="exampleForm.SelectCustom">
              <Form.Label>Select Chart Type</Form.Label>
              <Form.Select value={chartType} onChange={(e) => handleChangeChartType(e.target.value)}>
                {suitableChartTypes.map((type) => (
                  <option key={type} value={type}>
                    {type === 'bar' ? 'Bar Chart' : type === 'line' ? 'Line Chart' : type === 'area' ? 'Area Chart' :
                      type === 'pie' ? 'Pie Chart' : type === 'donut' ? 'Donut Chart' : type === 'scatter' ? 'Scatter Plot' : 'Unknown Chart'}
                  </option>
                ))}
              </Form.Select>
            </Form.Group>
          )}
        </Form>
      )}
      {suitableChartTypes.includes(chartType) && (
        <ApexCharts options={chartOptions} series={seriesData} type={chartType} height={350} />
      )}
    </div>
  );
}

export default DataSetCharts;
