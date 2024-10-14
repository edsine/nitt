import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import tablesData from '../Components/JsonData/Tables.json';
import { Table, Nav, Form } from 'react-bootstrap';
import Navbar from '../Components/LandBar'

function DataSetDetails() {
  const { datasetName } = useParams();
  const [tables, setTables] = useState([]);
  const [selectedTable, setSelectedTable] = useState('');
  const [selectedEndpoint, setSelectedEndpoint] = useState('');
  const [tableData, setTableData] = useState([]);
  const [selectedYear, setSelectedYear] = useState('');

  const API_URL = process.env.REACT_APP_API_URL;

  const fetchData = async (endpoint) => {
    if (endpoint !== '') {
      try {
        const response = await fetch(`${API_URL}/${endpoint}`, { cache: 'no-store' });
        if (!response.ok) {
          throw new Error(`Network response was not ok. Status: ${response.status}`);
        }
        const jsonData = await response.json();
        console.log('Fetched Data:', jsonData);

        // Validate if jsonData is an array and contains objects
        if (Array.isArray(jsonData) && jsonData.length > 0 && typeof jsonData[0] === 'object') {
          setTableData(jsonData);
        } else {
          console.warn('Invalid data format or empty data received.');
          setTableData([]);
        }
      } catch (error) {
        console.error('Fetch error:', error);
        setTableData([]); // Clear table data if an error occurs
      }
    }
  };

  useEffect(() => {
    const dataForDatasetName = tablesData[datasetName];
    if (dataForDatasetName && dataForDatasetName.tables) {
      setTables(dataForDatasetName.tables);
      setSelectedTable(dataForDatasetName.tables[0]?.name || '');
      setSelectedEndpoint(dataForDatasetName.tables[0]?.endpoint || '');
    } else {
      setTables([]);
    }
  }, [datasetName]);

  useEffect(() => {
    if (selectedEndpoint) {
      console.log('Fetching data for endpoint:', selectedEndpoint);
      fetchData(selectedEndpoint);
    }
  }, [selectedEndpoint]);

  const handleChange = (event) => {
    const dataForDatasetName = tablesData[datasetName];
    const selectedDataset = dataForDatasetName.tables.find(item => item.name === event.target.value);
    const endpoint = selectedDataset ? selectedDataset.endpoint : '';

    setSelectedTable(event.target.value);
    setSelectedEndpoint(endpoint);

    // Log selected table and endpoint to confirm correct state updates
    console.log('Selected Table:', event.target.value);
    console.log('Selected Endpoint:', endpoint);

    const firstYear = selectedDataset?.data ? Object.keys(selectedDataset.data[Object.keys(selectedDataset.data)[0]])[0] : '';
    setSelectedYear(firstYear);
  };

  const renderTableHeaders = () => {
    if (tableData.length === 0 || !tableData[0] || typeof tableData[0] !== 'object') {
      return null; // Return if no valid table data
    }
    const headers = Object.keys(tableData[0]);
    return headers.map((key, index) => <th key={index}>{key}</th>);
  };

  const renderTableRows = () => {
    if (tableData.length === 0) return null;
    return tableData.map((row, rowIndex) => (
      <tr key={rowIndex}>
        {Object.values(row).map((value, cellIndex) => (
          <td key={cellIndex}>{value}</td>
        ))}
      </tr>
    ));
  };

  return (
    
    <div>
      <Navbar/>
      <div className="bg-green-100 min-h-screen p-4">

      <h2 className='text-center m-5'>{datasetName} Details</h2>
      <div className="action-tabs">
        <Nav variant="tabs">
          <Nav.Item>
            <Nav.Link as={Link} to={`/datasetcharts/${datasetName}/${encodeURIComponent(selectedTable)}/${selectedEndpoint}`}>
              View Chart
            </Nav.Link>
          </Nav.Item>
          <Nav.Item>
            <Nav.Link as={Link} to={`/datasetanalytics/${datasetName}/${encodeURIComponent(selectedTable)}/${selectedEndpoint}`}>
              View Analytics
            </Nav.Link>
          </Nav.Item>
        </Nav>
      </div>
      <Form className="my-4">
        <Form.Group controlId="exampleForm.SelectCustom">
          <Form.Label><p className='ml-4'>Select Table</p></Form.Label>
          <Form.Select value={selectedTable} onChange={handleChange}>
            {tables.map((table, index) => (
              <option key={index} value={table.name}>
                {table.name}
              </option>
            ))}
          </Form.Select>
        </Form.Group>
      </Form>
      <div className="table-container">
        <Table striped bordered hover>
          <thead>
            <tr>
              {renderTableHeaders()}
            </tr>
          </thead>
          <tbody>
            {renderTableRows()}
          </tbody>
        </Table>
      </div>
    </div>
    </div>
  );
}

export default DataSetDetails;
