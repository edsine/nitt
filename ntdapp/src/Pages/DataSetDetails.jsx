import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import tablesData from '../Components/JsonData/Tables.json';
import { Table, Nav, Form } from 'react-bootstrap';

function DataSetDetails() {
  const { datasetName } = useParams();
  const [tables, setTables] = useState([]);
  const [selectedTable, setSelectedTable] = useState('');
  const [selectedEndpoint, setSelectedEndpoint] = useState('');
  const [tableData, setTableData] = useState(null);
  const [selectedYear, setSelectedYear] = useState('');

  const API_URL = process.env.REACT_APP_API_URL;

  const fetchData = async (endpoint) => {
    if (endpoint !== '') {
      try {
        const response = await fetch(`${API_URL}/${endpoint}`);
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        const jsonData = await response.json();
        setTableData(jsonData.data);
      } catch (error) {
        console.log(error);
      }
    }
  };

  useEffect(() => {
    const dataForDatasetName = tablesData[datasetName];
    if (dataForDatasetName && dataForDatasetName.tables) {
      setTables(dataForDatasetName.tables);
      setSelectedTable(dataForDatasetName.tables[0]?.name || '');
      setSelectedEndpoint(dataForDatasetName.tables[0]?.endpoint);
    }
  }, [datasetName]);

  useEffect(() => {
    fetchData(selectedEndpoint);
  }, [selectedEndpoint]);

  const handleChange = (event) => {
    const dataForDatasetName = tablesData[datasetName];
    const selectedDataset = dataForDatasetName.tables.find(item => item.name === event.target.value);
    const endpoint = selectedDataset ? selectedDataset.endpoint : '';
    setSelectedTable(event.target.value);
    setSelectedEndpoint(endpoint);

    const firstYear = selectedDataset.data ? Object.keys(selectedDataset.data[Object.keys(selectedDataset.data)[0]])[0] : '';
    setSelectedYear(firstYear);
  };

  return (
    <div>
      <h2>{datasetName} Details</h2>
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
          <Form.Label>Select Table</Form.Label>
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
                <th>Year</th>
                {tableData?.data && Object.keys(tableData?.data).map((column, index) => (
                  <th key={index}>{column}</th>
                ))}
              </tr>
            </thead>
            <tbody>
            {renderTableRows()}
          </tbody>
        </Table>
      </div>
    </div>
  );
}

export default DataSetDetails;
