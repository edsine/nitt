// DataSetDetails.jsx

import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import tablesData from '../Components/JsonData/Tables.json';
import { Table, Nav, Form } from 'react-bootstrap';

function DataSetDetails() {
  const { datasetName } = useParams();
  const [tables, setTables] = useState([]);
  const [selectedTable, setSelectedTable] = useState('');

  useEffect(() => {
    // Fetch data for the selected datasetName from your data source
    // For demonstration purposes, I'm using the tablesData directly from Tables.json
    const dataForDatasetName = tablesData[datasetName];
    if (dataForDatasetName && dataForDatasetName.tables) {
      setTables(dataForDatasetName.tables);
      setSelectedTable(dataForDatasetName.tables[0]?.name || '');
    }
    console.log(tablesData);
  }, [datasetName]);

  const handleChange = (event) => {
    setSelectedTable(event.target.value);
  };

  return (
    <div>
      <h2>{datasetName} Details</h2>
      <div className="action-tabs">
        <Nav variant="tabs">
          <Nav.Item>
            <Nav.Link as={Link} to={`/datasetcharts/${datasetName}/${selectedTable}`}>
              View Chart
            </Nav.Link>
          </Nav.Item>
          <Nav.Item>
            <Nav.Link as={Link} to={`/datasetanalytics/${datasetName}`}>
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
        {tables.map((table, index) => (
          <div key={index} className="table" style={{ display: selectedTable === table.name ? 'block' : 'none' }}>
            <h3>{table.name}</h3>
            <Table striped bordered hover>
              <thead>
                <tr>
                  <th>Year</th>
                  {Object.keys(table.data).map((column, index) => (
                    <th key={index}>{column}</th>
                  ))}
                </tr>
              </thead>
              <tbody>
                {Object.keys(table.data).map((key, index) => (
                  Object.keys(table.data[key]).map((year, rowIndex) => (
                    <tr key={`${key}-${rowIndex}`}>
                      <td>{year}</td>
                      {Object.keys(table.data).map((innerKey, cellIndex) => (
                        <td key={`${key}-${innerKey}-${cellIndex}`}>
                          {table.data[innerKey][year]}
                        </td>
                      ))}
                    </tr>
                  ))
                ))}
              </tbody>
            </Table>
          </div>
        ))}
      </div>
    </div>
  );
}

export default DataSetDetails;
