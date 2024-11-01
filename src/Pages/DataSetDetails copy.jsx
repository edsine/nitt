import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import datasets from '../Components/JsonData/DataSets.json'; // Assuming correct path
import tables from '../Components/JsonData/Tables.json'; // Assuming correct path
import { Table, Nav, Form } from 'react-bootstrap';

function DataSetDetails() {
  const { datasetName } = useParams();
  const [selectedDataset, setSelectedDataset] = useState(null);
  const [selectedTable, setSelectedTable] = useState('');
  const [selectedTableData, setSelectedTableData] = useState([]);

  useEffect(() => {
    // Find the selected dataset by its name
    const dataset = datasets.find(dataset => dataset.name === datasetName);
    setSelectedDataset(dataset);

    // If a dataset is found and it has tables, select the first table name by default
    if (dataset && dataset.tables && dataset.tables.length > 0) {
      setSelectedTable(dataset.tables[0].name);
      // Find the data for the selected table
      const tableData = tables[dataset.tables[0].name]; // Assuming table data is stored in Tables.json with table names as keys
      setSelectedTableData(tableData);
    }
  }, [datasetName]);

  const handleChange = (event) => {
    const selectedTableName = event.target.value;
    setSelectedTable(selectedTableName);
    // Find and set the data for the selected table
    const tableData = tables[selectedTableName];
    setSelectedTableData(tableData);
  };

  return (
    <div>
      <h2>{datasetName} Details</h2>
      <div className="action-tabs">
        <Nav variant="tabs">
          <Nav.Item>
            <Nav.Link as={Link} to={`/datasetcharts/${datasetName}`}>
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
      {selectedDataset && selectedDataset.tables && selectedDataset.tables.length > 0 && (
        <Form className="my-4">
          <Form.Group controlId="exampleForm.SelectCustom">
            <Form.Label>Select Table</Form.Label>
            <Form.Select value={selectedTable} onChange={handleChange}>
              {selectedDataset.tables.map((table, index) => (
                <option key={index} value={table.name}>
                  {table.name}
                </option>
              ))}
            </Form.Select>
          </Form.Group>
        </Form>
      )}
      {selectedTableData && selectedTableData.length > 0 && (
        <div className="table-container">
          <Table striped bordered hover>
            <thead>
              <tr>
                <th>Year</th>
                {/* Assuming each object in the table data array has 'year' and other properties */}
                {Object.keys(selectedTableData[0]).map((category, index) => (
                  <th key={index}>{category}</th>
                ))}
              </tr>
            </thead>
            <tbody>
              {selectedTableData.map((row, index) => (
                <tr key={index}>
                  <td>{row.year}</td> {/* Assuming each row object has a 'year' property */}
                  {Object.values(row).map((value, index) => (
                    <td key={index}>{value}</td>
                  ))}
                </tr>
              ))}
            </tbody>
          </Table>
        </div>
      )}
    </div>
  );
}

export default DataSetDetails;
