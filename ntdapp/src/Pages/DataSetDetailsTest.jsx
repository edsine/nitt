import React, { useState, useEffect } from "react";
import { useParams, Link } from "react-router-dom";
import { Table, Nav, Form, Spinner, Alert } from "react-bootstrap";
import tablesData from "../Components/JsonData/Tables.json";

function DataSetDetailsTest() {
  const { datasetName } = useParams();
  const [tables, setTables] = useState([]);
  const [selectedTable, setSelectedTable] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const API_URL = process.env.REACT_APP_API_URL;

  const fetchData = async (endpoint) => {
    setLoading(true);
    try {
      const response = await fetch(`${API_URL}/${endpoint}`);
      if (!response.ok) {
        throw new Error("Failed to fetch data");
      }
      const responseData = await response.json();
      console.log(responseData); // Log the entire data object for debugging
      if (responseData && responseData.data) {
        // Extract name and tables data
        const { name, data: tablesData } = responseData.data;
        // Convert tablesData object into an array of tables
        const tables = Object.keys(tablesData).map((tableName) => ({
          name: tableName,
          data: tablesData[tableName],
        }));
        setTables(tables);
        setSelectedTable(tables[0]?.name || "");
      } else {
        throw new Error("Invalid data format");
      }
      setError(null);
    } catch (error) {
      setError(error.message || "An error occurred while fetching data");
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    const dataset = tablesData[datasetName];
    if (dataset && dataset.tables && dataset.tables.length > 0) {
      const firstTableEndpoint = dataset.tables[0].endpoint;
      fetchData(firstTableEndpoint);
    }
  }, [datasetName]);

  const handleChange = (event) => {
    setSelectedTable(event.target.value);
    const selectedTableInfo = tablesData[datasetName].tables.find(
      (table) => table.name === event.target.value
    );
    if (selectedTableInfo) {
      fetchData(selectedTableInfo.endpoint);
    }
  };

  return (
    <div>
      <h2>{datasetName} Details</h2>
      <div className="action-tabs">
        <Nav variant="tabs">
          <Nav.Item>
            <Nav.Link
              as={Link}
              to={`/datasetcharts/${datasetName}/${selectedTable}`}
            >
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
            {tablesData[datasetName].tables.map((table, index) => (
              <option key={index} value={table.name}>
                {table.name}
              </option>
            ))}
          </Form.Select>
        </Form.Group>
      </Form>
      {loading && <Spinner animation="border" role="status" />}
      {error && <Alert variant="danger">{error}</Alert>}
      <div className="table-container">
        {tables.map((table, index) => (
          <div
            key={index}
            className="table"
            style={{ display: selectedTable === table.name ? "block" : "none" }}
          >
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
                {Object.keys(table.data).map((key, index) =>
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
                )}
              </tbody>
            </Table>
          </div>
        ))}
      </div>
    </div>
  );
}

export default DataSetDetailsTest;
