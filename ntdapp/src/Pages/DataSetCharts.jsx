import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import ApexCharts from 'react-apexcharts';
import { Form } from 'react-bootstrap';

function DataSetCharts() {
  const { datasetName, tableName, selectedEndpoint } = useParams();
  const [tableData, setTableData] = useState({});
  const [selectedYear, setSelectedYear] = useState('');
  const [chartType, setChartType] = useState('');
  const [suitableChartTypes, setSuitableChartTypes] = useState([]);
  const [years, setYears] = useState([]);
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/${selectedEndpoint}`);
        if (!response.ok) {
          throw new Error('Failed to fetch data');
        }
        const jsonData = await response.json();
        setTableData(jsonData.data);

        const years = Object.keys(jsonData.data.data[Object.keys(jsonData.data.data)[0]]) || [];
        setYears(years);
        setSelectedYear(years[0] || '');

        const categories = Object.keys(jsonData.data.data);
        setCategories(categories);
        const seriesCount = Object.keys(jsonData.data.data[categories[0]]).length;
        let suitableTypes = [];
        if (seriesCount === 1) {
          suitableTypes.push('line', 'area', 'heatmap', 'scatter', 'pie', 'donut', 'radialBar');
        } else if (seriesCount > 1) {
          suitableTypes.push('line', 'bar', 'area', 'scatter');
        }
        setSuitableChartTypes(suitableTypes);
        setChartType(suitableTypes[0]);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);


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
      categories: categories,
      title: {
        text: 'Year',
      },
    },
    title: {
      text: `${datasetName} - ${tableName} Chart`,
      align: 'center',
    },
  };

  const filteredData = Object.keys(tableData.data).map((key) => ({
    x: key,
    y: tableData.data[key][selectedYear] || 0,
  }));

  return (
    <div>
      <h2>{datasetName} - {tableName} Chart</h2>
      <Form className="my-4">
        <Form.Group controlId="exampleForm.SelectCustom">
          <Form.Label>Select Year</Form.Label>
          <Form.Select value={selectedYear} onChange={handleChangeYear}>
            {years && years.map((year, index) => (
              <option key={index} value={year}>
                {year}
              </option>
            ))}
          </Form.Select>
        </Form.Group>
        {chartType && (
          <Form.Group controlId="exampleForm.SelectCustom">
            <Form.Label>Select Chart Type</Form.Label>
            <Form.Select value={chartType} onChange={(e) => handleChangeChartType(e.target.value)}>
              {suitableChartTypes.map((type) => (
                <option key={type} value={type}>
                  {type === 'bar' ? 'Bar Chart' : type === 'line' ? 'Line Chart' : type === 'area' ? 'Area Chart' :
                    type === 'heatmap' ? 'Heatmap' : type === 'scatter' ? 'Scatter Plot' : type === 'pie' ? 'Pie Chart' :
                      type === 'donut' ? 'Donut Chart' : type === 'radialBar' ? 'Radial Bar Chart' : 'Unknown Chart'}
                </option>
              ))}
            </Form.Select>
          </Form.Group>
        )}
      </Form>
      {suitableChartTypes.includes(chartType) && (
        <ApexCharts options={chartOptions} series={[{ data: filteredData }]} type={chartType} height={350} />
      )}
    </div>
  );
}

export default DataSetCharts;
