import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import tablesData from '../Components/JsonData/Tables.json';
import ApexCharts from 'react-apexcharts';
import { Form } from 'react-bootstrap';

function DataSetCharts() {
  const { datasetName, tableName } = useParams();
  const [tableData, setTableData] = useState({});
  const [selectedYear, setSelectedYear] = useState('');
  const [chartType, setChartType] = useState('');
  const [suitableChartTypes, setSuitableChartTypes] = useState([]);

  useEffect(() => {
    const dataForTable = tablesData[unescape(datasetName)]?.tables.find((table) => table.name === unescape(tableName));
    if (dataForTable) {
      console.log('Data for table:', dataForTable);
      setTableData(dataForTable.data);
      const years = Object.keys(dataForTable.data[Object.keys(dataForTable.data)[0]]) || [];
      setSelectedYear(years[0] || '');

      const categories = Object.keys(dataForTable.data);
      const seriesCount = Object.keys(dataForTable.data[categories[0]]).length;
      let suitableTypes = [];
      if (seriesCount === 1) {
        suitableTypes.push('line', 'area', 'heatmap', 'scatter', 'pie', 'donut', 'radialBar');
      } else if (seriesCount > 1) {
        suitableTypes.push('line', 'bar', 'area', 'scatter');
      }
      setSuitableChartTypes(suitableTypes);
      setChartType(suitableTypes[0]);
    }
  }, [datasetName, tableName]);

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
      categories: Object.keys(tableData),
      title: {
        text: 'Year',
      },
    },
    title: {
      text: `${unescape(datasetName)} - ${unescape(tableName)} Chart`, // Updated chart title with decoded names
      align: 'center',
    },
  };

  const filteredData = Object.keys(tableData).map((key) => ({
    x: key,
    y: tableData[key][selectedYear] || 0,
  }));

  return (
    <div>
      <h2>{unescape(datasetName)} - {unescape(tableName)} Chart</h2>
      <Form className="my-4">
        <Form.Group controlId="exampleForm.SelectCustom">
          <Form.Label>Select Year</Form.Label>
          <Form.Select value={selectedYear} onChange={handleChangeYear}>
            {Object.keys(tableData[Object.keys(tableData)[0]] || {}).map((year, index) => (
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
