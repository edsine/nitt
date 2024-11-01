import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Form, Container, Row, Col, Card, ListGroup } from 'react-bootstrap';
import Chart from 'react-apexcharts';
import { PCA } from 'ml-pca';

function DatasetAnalytics() {
  const { datasetName, tableName, selectedEndpoint } = useParams();
  const [tableData, setTableData, setData] = useState({});
  const [selectedYear, setSelectedYear] = useState('');
  const [summaryStatistics, setSummaryStatistics] = useState(null);
  const [correlationResults, setCorrelationResults] = useState({});
  const [trendAnalysis, setTrendAnalysis] = useState({});
  const [regressionResults, setRegressionResults] = useState({});
  const [timeSeriesAnalysis, setTimeSeriesAnalysis] = useState({});
  const [segmentationAnalysis, setSegmentationAnalysis] = useState({});
  const [classificationAnalysis, setClassificationAnalysis] = useState({});
  const [pcaResults, setPCAResults] = useState([]);
  const [isLoadingPCA, setIsLoadingPCA] = useState(true);

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
        setTableData(jsonData.data);
        setSelectedYear(Object.keys(jsonData.data.data[Object.keys(jsonData.data.data)[0]])[0]);

        // Calculate PCA after data is available
        calculatePCA(jsonData.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, [selectedEndpoint]);

  //   fetchData();
  // }, [selectedEndpoint]);

  useEffect(() => {
    if (tableData && Object.keys(tableData).length > 0) {
      calculateSummaryStatistics(tableData.data);
      calculateCorrelationResults(tableData.data);
      calculateTrendAnalysis(tableData.data);
      calculateRegressionAnalysis(tableData.data);
      calculateSegmentationAnalysis(tableData.data);
      calculateClassificationAnalysis(tableData.data);
      setIsLoadingPCA(false);
    }
  }, [tableData, selectedYear]);

  const calculateSummaryStatistics = (data) => {
    const values = Object.values(data).map(item => item[selectedYear]);
    const mean = values.reduce((acc, val) => acc + val, 0) / values.length;
    const sortedValues = values.sort((a, b) => a - b);
    const medianIndex = Math.floor(sortedValues.length / 2);
    const median = sortedValues.length % 2 === 0 ? (sortedValues[medianIndex - 1] + sortedValues[medianIndex]) / 2 : sortedValues[medianIndex];
    const min = Math.min(...values);
    const max = Math.max(...values);

    const summaryStats = {
      mean,
      median,
      min,
      max,
    };
    setSummaryStatistics(summaryStats);
  };

  const calculateCorrelationResults = (data) => {
    const correlationResults = {};
    const attributes = Object.keys(data);

    for (let i = 0; i < attributes.length; i++) {
      const attr1 = attributes[i];
      correlationResults[attr1] = {};
      for (let j = i + 1; j < attributes.length; j++) {
        const attr2 = attributes[j];
        const values1 = Object.values(data[attr1]);
        const values2 = Object.values(data[attr2]);
        const mean1 = values1.reduce((acc, val) => acc + val, 0) / values1.length;
        const mean2 = values2.reduce((acc, val) => acc + val, 0) / values2.length;
        let covariance = 0;
        let stdDev1 = 0;
        let stdDev2 = 0;
        for (let k = 0; k < values1.length; k++) {
          covariance += (values1[k] - mean1) * (values2[k] - mean2);
          stdDev1 += Math.pow((values1[k] - mean1), 2);
          stdDev2 += Math.pow((values2[k] - mean2), 2);
        }
        covariance /= values1.length;
        stdDev1 = Math.sqrt(stdDev1 / values1.length);
        stdDev2 = Math.sqrt(stdDev2 / values2.length);
        const correlationCoefficient = covariance / (stdDev1 * stdDev2);
        correlationResults[attr1][attr2] = correlationCoefficient.toFixed(2);
      }
    }
    setCorrelationResults(correlationResults);
  };

  const calculateTrendAnalysis = (data) => {
    const trendAnalysis = {};
    const years = Object.keys(data[Object.keys(data)[0]]);
    for (const attribute in data) {
      const values = Object.values(data[attribute]);
      const slope = calculateLinearRegressionSlope(years.map(Number), values.map(Number));
      trendAnalysis[attribute] = slope.toFixed(2);
    }
    setTrendAnalysis(trendAnalysis);
  };

  const calculateLinearRegressionSlope = (xValues, yValues) => {
    const n = xValues.length;
    let sumX = 0;
    let sumY = 0;
    let sumXY = 0;
    let sumX2 = 0;

    for (let i = 0; i < n; i++) {
      sumX += xValues[i];
      sumY += yValues[i];
      sumXY += xValues[i] * yValues[i];
      sumX2 += xValues[i] ** 2;
    }

    const slope = (n * sumXY - sumX * sumY) / (n * sumX2 - sumX ** 2);
    return slope;
  };

  const calculateRegressionAnalysis = (data) => {
    const regressionResults = {};
    // Perform regression analysis calculations here
    // Example: Calculate the regression line equation (y = mx + b) for each attribute
    const years = Object.keys(data[Object.keys(data)[0]]);
    for (const attribute in data) {
      const values = Object.values(data[attribute]);
      const slope = calculateLinearRegressionSlope(years.map(Number), values.map(Number));
      const intercept = calculateLinearRegressionIntercept(years.map(Number), values.map(Number), slope);
      regressionResults[attribute] = { slope: slope.toFixed(2), intercept: intercept.toFixed(2) };
    }
    setRegressionResults(regressionResults);
  };

  const calculateLinearRegressionIntercept = (xValues, yValues, slope) => {
    const n = xValues.length;
    let sumX = 0;
    let sumY = 0;

    for (let i = 0; i < n; i++) {
      sumX += xValues[i];
      sumY += yValues[i];
    }

    const meanX = sumX / n;
    const meanY = sumY / n;

    const intercept = meanY - slope * meanX;
    return intercept;
  };

  useEffect(() => {
    if (tableData && Object.keys(tableData).length > 0) {
      const timeSeriesAnalysisData = calculateTimeSeriesAnalysis(tableData.data);
      setTimeSeriesAnalysis(timeSeriesAnalysisData);
    }
  }, [tableData]);


  // Function to detect seasonality
  const detectSeasonality = (values) => {
    // Perform seasonal decomposition using methods like Fourier Transform or Autocorrelation
    // Calculate seasonal components if detected
    // For simplicity, let's assume a basic method of checking if there's a repeating pattern in the data
    for (let i = 1; i <= Math.floor(values.length / 2); i++) {
      const period = values.slice(0, i);
      const isSeasonal = values.every((value, index) => value === values[index % i]);
      if (isSeasonal) {
        return { period: i };
      }
    }
    return null;
  };

  // Function to detect anomalies
  const detectAnomalies = (values) => {
    const anomalies = [];
    const threshold = 2.5; // Adjust this threshold based on your data and requirements
    const mean = values.reduce((acc, val) => acc + val, 0) / values.length;
    const stdDev = Math.sqrt(values.reduce((acc, val) => acc + (val - mean) ** 2, 0) / values.length);

    // Detect anomalies based on Z-score
    values.forEach((value, index) => {
      const zScore = Math.abs((value - mean) / stdDev);
      if (zScore > threshold) {
        anomalies.push({ index, value });
      }
    });

    return anomalies;
  };

  const calculateTimeSeriesAnalysis = (data) => {
    const timeSeriesAnalysis = {};

    // Extracting years and values from the data
    const years = Object.keys(data[Object.keys(data)[0]]);
    const attributes = Object.keys(data);

    // Perform time series analysis for each attribute
    attributes.forEach(attribute => {
      const values = Object.values(data[attribute]);

      // Detecting trends using linear regression
      const slope = calculateLinearRegressionSlope(years.map(Number), values.map(Number));
      const intercept = calculateLinearRegressionIntercept(years.map(Number), values.map(Number), slope);

      // Trend analysis
      timeSeriesAnalysis[attribute] = {
        trend: {
          slope: slope.toFixed(2),
          intercept: intercept.toFixed(2)
        }
      };

      // Seasonality analysis
      const seasonalComponents = detectSeasonality(values);
      if (seasonalComponents) {
        timeSeriesAnalysis[attribute].seasonality = seasonalComponents;
      }

      // Anomaly detection
      const anomalies = detectAnomalies(values);
      if (anomalies.length > 0) {
        timeSeriesAnalysis[attribute].anomalies = anomalies;
      }
    });

    return timeSeriesAnalysis;
  };

  const calculateSegmentationAnalysis = (data) => {
    const segmentationResults = {}; // Placeholder for segmentation analysis results

    // Segment data based on a categorical attribute
    const categories = Object.keys(data); // Assuming each category is represented as an attribute

    categories.forEach(category => {
      // Analyze data within each category
      const values = Object.values(data[category]);
      const mean = calculateMean(values);
      const median = calculateMedian(values);

      // Store the segmentation analysis results
      segmentationResults[category] = { mean, median };
    });

    setSegmentationAnalysis(segmentationResults); // Update state with segmentation analysis results
  };

  const calculateMean = (values) => {
    // Calculate mean of an array of values
    const sum = values.reduce((acc, val) => acc + val, 0);
    return sum / values.length;
  };

  const calculateMedian = (values) => {
    // Calculate median of an array of values
    const sortedValues = values.sort((a, b) => a - b);
    const length = sortedValues.length;
    const middleIndex = Math.floor(length / 2);

    if (length % 2 === 0) {
      // If the array length is even, average the two middle values
      return (sortedValues[middleIndex - 1] + sortedValues[middleIndex]) / 2;
    } else {
      // If the array length is odd, return the middle value
      return sortedValues[middleIndex];
    }
  };

  const calculateClassificationAnalysis = (data) => {
    // Calculate classification analysis
    // Implementation of classification analysis
    const classificationResults = {}; // Placeholder for classification analysis results
    const labels = Object.keys(data); // Assuming each label is represented as an attribute
    labels.forEach(label => {
      const values = Object.values(data[label]);
      const accuracy = calculateAccuracy(values);
      const precision = calculatePrecision(values);
      const recall = calculateRecall(values);
      const f1Score = calculateF1Score(precision, recall);
      classificationResults[label] = { accuracy, precision, recall, f1Score };
    });
    setClassificationAnalysis(classificationResults); // Update state with classification analysis results
  };

  const calculateAccuracy = (values) => {
    // Calculate accuracy
    // Implementation of accuracy calculation
    const truePositives = values.filter(val => val === true).length;
    const falsePositives = values.filter(val => val === false).length;
    const totalSamples = values.length;

    return (truePositives + falsePositives) / totalSamples;
  };

  const calculatePrecision = (values) => {
    // Calculate precision
    // Implementation of precision calculation
    const truePositives = values.filter(val => val === true).length;
    const falsePositives = values.filter(val => val === false).length;

    return truePositives / (truePositives + falsePositives);
  };

  const calculateRecall = (values) => {
    // Calculate recall
    // Implementation of recall calculation
    const truePositives = values.filter(val => val === true).length;
    const falseNegatives = values.filter(val => val === false).length;

    return truePositives / (truePositives + falseNegatives);
  };

  const calculateF1Score = (precision, recall) => {
    // Calculate F1-score
    // Implementation of F1-score calculation
    return 2 * ((precision * recall) / (precision + recall));
  };


  // Custom function to calculate standard deviation
  const calculateStandardDeviation = (values, mean) => {
    const squaredDifferences = values.map(val => (val - mean) ** 2);
    const sumOfSquaredDifferences = squaredDifferences.reduce((acc, val) => acc + val, 0);
    const variance = sumOfSquaredDifferences / values.length;
    return Math.sqrt(variance);
  };


  const calculatePCA = async (data) => {
    try {
      if (!data || !data.data) {
        console.error('Data is not available for PCA calculation.');
        return;
      }

      const attributes = Object.keys(data.data);
      const matrix = Object.values(data.data).map(obj => Object.values(obj));

      // Handle missing values (imputation)
      const imputedMatrix = fillMissing(matrix);

      // Standardize features
      const standardizedMatrix = standardize(imputedMatrix);

      // Perform PCA
      const pca = new PCA(standardizedMatrix);
      const pcaResults = pca.predict(3); // Specify number of components

      setPCAResults(pcaResults);
    } catch (error) {
      console.error('Error during PCA calculation:', error);
    }
  };

  // Custom function to standardize data
  const standardize = (data) => {
    const standardizedData = [];

    // Calculate mean and standard deviation for each column
    for (let i = 0; i < data[0].length; i++) {
      const columnValues = data.map(row => row[i]);
      const columnMean = calculateMean(columnValues);
      const columnStdDev = calculateStandardDeviation(columnValues, columnMean);

      // Standardize values in the column
      const standardizedColumn = columnValues.map(value => (value - columnMean) / columnStdDev);
      standardizedData.push(standardizedColumn);
    }

    // Transpose the standardized data to get the original shape
    const transposedData = [];
    for (let i = 0; i < standardizedData[0].length; i++) {
      const rowData = [];
      for (let j = 0; j < standardizedData.length; j++) {
        rowData.push(standardizedData[j][i]);
      }
      transposedData.push(rowData);
    }

    return transposedData;
  };

  // Custom function to fill missing values with mean
  const fillMissing = (data) => {
    const filledData = [];

    // Iterate over each row
    for (let i = 0; i < data.length; i++) {
      const filledRow = [];

      // Iterate over each value in the row
      for (let j = 0; j < data[i].length; j++) {
        if (isNaN(data[i][j])) {
          // If value is NaN (missing), replace with mean of the column
          const columnValues = data.map(row => row[j]).filter(value => !isNaN(value));
          const columnMean = calculateMean(columnValues);
          filledRow.push(columnMean);
        } else {
          // If value is not missing, keep it as it is
          filledRow.push(data[i][j]);
        }
      }

      filledData.push(filledRow);
    }

    return filledData;
  };

  // Function to replace NaN values with 0
  const replaceNaNWithZero = (value) => {
    return isNaN(value) ? 0 : value;
  };

  // Utility function to replace null values with 0
  const replaceNullWithZero = (value) => (value === null ? 0 : value);

  {/* Generate series data for the chart */ }
  // const correlationSeriesData = Object.keys(correlationResults).map((variable1, index1) => ({
  //   name: variable1,
  //   data: Object.keys(correlationResults[variable1]).map((variable2, index2) => ({
  //     x: index2, // Using index as x-coordinate
  //     y: index1, // Using index as y-coordinate
  //     value: isNaN(correlationResults[variable1][variable2]) ? 0 : parseFloat(correlationResults[variable1][variable2]),
  //   })),
  // }));



  // Transform trendAnalysis into series data
  const trendSeriesData = Object.keys(trendAnalysis).map(attribute => ({
    name: attribute,
    data: Object.keys(trendAnalysis[attribute]).map(year => ({
      x: year,
      y: trendAnalysis[attribute][year],
    })),
  }));

  // Transform segmentationAnalysis into series data
  const segmentationSeriesData = Object.keys(segmentationAnalysis).map(category => ({
    name: category,
    data: [
      { x: 'Mean', y: segmentationAnalysis[category].mean || 0 },
      { x: 'Median', y: segmentationAnalysis[category].median || 0 },
    ],
  }));

  // Transform classificationAnalysis into series data
  const classificationSeriesData = Object.keys(classificationAnalysis).map(label => ({
    name: label,
    data: [
      { x: 'Accuracy', y: classificationAnalysis[label].accuracy || 0 },
      { x: 'Precision', y: classificationAnalysis[label].precision || 0 },
      { x: 'Recall', y: classificationAnalysis[label].recall || 0 },
      { x: 'F1-Score', y: classificationAnalysis[label].f1Score || 0 },
    ],
  }));

  // Transform regressionResults into series data
  const regressionSeriesData = Object.keys(regressionResults).map(attribute => ({
    name: attribute,
    data: [
      { x: 'Slope', y: regressionResults[attribute].slope },
      { x: 'Intercept', y: regressionResults[attribute].intercept },
    ],
  }));

  // Transform timeSeriesAnalysis into series data
  // Generate series data for the chart
  const timeSeriesSeriesData = Object.keys(timeSeriesAnalysis).map(attribute => ({
    name: attribute,
    data: [
      { name: 'Trend Slope', value: timeSeriesAnalysis[attribute].trend.slope || 0 }, // Replace NaN with 0 or handle appropriately
      { name: 'Trend Intercept', value: timeSeriesAnalysis[attribute].trend.intercept || 0 }, // Replace NaN with 0 or handle appropriately
      // Add more data points as needed for anomalies, seasonality, etc.
      ...(timeSeriesAnalysis[attribute].seasonality ? [{ name: 'Seasonality Period', value: timeSeriesAnalysis[attribute].seasonality.period }] : []),
      ...(timeSeriesAnalysis[attribute].anomalies ? timeSeriesAnalysis[attribute].anomalies.map(anomaly => ({ name: `Anomaly Index: ${anomaly.index}`, value: anomaly.value })) : []),
    ],
  }));

  // Transform pcaResults into series data
  const pcaSeriesData = pcaResults.map((component, index) => ({
    name: `Component ${index + 1}`,
    data: component.map(value => ({
      x: '',
      y: value,
    })),
  }));


  // Define options for PCA chart
  const pcaOptions = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    xaxis: {
      categories: pcaResults && pcaResults.length > 0 ? Array.from({ length: pcaResults[0].length }, (_, i) => i + 1) : [], // Check if pcaResults is not null and has length > 0
      title: {
        text: 'Component Index',
      },
    },
    yaxis: {
      title: {
        text: 'Value',
      },
    },
    legend: {
      show: true,
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -30,
      offsetX: -5,
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: 'smooth',
    },
    markers: {
      size: 6,
      strokeWidth: 0,
      hover: {
        sizeOffset: 2,
      },
    },
    grid: {
      borderColor: '#f1f1f1',
    },
  };

  const heatmapOptions = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    xaxis: {
      categories: Object.keys(correlationResults), // Use attribute names for x-axis
    },
    yaxis: {
      categories: Object.keys(correlationResults), // Use attribute names for y-axis
    },
    plotOptions: {
      heatmap: {
        colorScale: {
          ranges: [
            {
              from: -1,
              to: 1,
              color: '#FF0000',
              foreColor: '#000000', // Adjust as needed
              name: 'Range Name', // Optional
            },
          ],
          inverse: false, // Optional
          min: -1, // Optional
          max: 1, // Optional
        },
      },
    },
  };


  const correlationSeriesData = Object.keys(correlationResults).map(variable1 => ({
    name: variable1,
    data: Object.keys(correlationResults[variable1]).map(variable2 => {
      const value = correlationResults[variable1][variable2];
      const parsedValue = isNaN(parseFloat(value)) ? 0 : parseFloat(value);
      return {
        x: variable2,
        y: parsedValue,
      };
    }),
  }));


  return (
    <div>
      <h2>{datasetName} - {tableName} Analytics</h2>
      <Form className="my-4">
        <Form.Group controlId="exampleForm.SelectCustom">
          <Form.Label>Select Year</Form.Label>
          <Form.Select value={selectedYear} onChange={(e) => setSelectedYear(e.target.value)}>
            {Object.keys(tableData.data && tableData.data[Object.keys(tableData.data)[0]] || {}).map((year, index) => (
              <option key={index} value={year}>
                {year}
              </option>
            ))}
          </Form.Select>
        </Form.Group>
      </Form>
      {/* Display existing summary statistics */}
      {summaryStatistics && (
        <div>
          <h3>Summary Statistics for {selectedYear}</h3>
          <ul>
            <li>Mean: {summaryStatistics.mean}</li>
            <li>Median: {summaryStatistics.median}</li>
            <li>Minimum: {summaryStatistics.min}</li>
            <li>Maximum: {summaryStatistics.max}</li>
          </ul>
        </div>
      )}

      {/* Display Correlation Analysis Results */}
      {correlationResults && Object.keys(correlationResults).length > 0 && (
        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Correlation Analysis</Card.Title>
                  <ListGroup variant="flush">
                    {Object.keys(correlationResults).map((variable1, index) => (
                      <ListGroup.Item key={index}>
                        {variable1}:
                        <ListGroup>
                          {Object.keys(correlationResults[variable1]).map((variable2, subIndex) => (
                            <ListGroup.Item key={subIndex}>
                              {variable2}: {replaceNullWithZero(correlationResults[variable1][variable2])}
                            </ListGroup.Item>
                          ))}
                        </ListGroup>
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Correlation Analysis</Card.Title>
                  <Chart
                    options={heatmapOptions}
                    series={correlationSeriesData}
                    type="heatmap"
                    width="100%"
                    height="400"
                  />
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}


      {/* Display Trend Analysis results */}
      {/* {trendAnalysis && Object.keys(trendAnalysis).length > 0 && (
        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Trend Analysis</Card.Title>
                  <ListGroup variant="flush">
                    {Object.keys(trendAnalysis).map((attribute, index) => (
                      <ListGroup.Item key={index}>
                        {attribute}: Slope - {trendAnalysis[attribute].slope}, Intercept - {trendAnalysis[attribute].intercept}
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Trend Analysis</Card.Title>
                  {Object.keys(trendAnalysis).map((attribute, index) => (
                    <div key={index} className="mt-3">
                      <Card.Title>{attribute}</Card.Title>
                      <Chart
                        options={{
                          chart: {
                            toolbar: {
                              show: false,
                            },
                          },
                          xaxis: {
                            categories: Object.keys(tableData.data && tableData.data[Object.keys(tableData.data)[0]] || {}),
                          },
                          yaxis: {
                            title: {
                              text: 'Value',
                            },
                          },
                        }}
                        series={trendSeriesData}
                        type="line"
                        width="100%"
                        height="400"
                      />
                    </div>
                  ))}
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )} */}


      {/* Display Regression Analysis results */}
      {regressionResults && Object.keys(regressionResults).length > 0 && (

        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Regression Analysis</Card.Title>
                  <ListGroup variant="flush">
                    {Object.keys(regressionResults).map((attribute, index) => (
                      <ListGroup.Item key={index}>
                        {attribute}: Slope - {regressionResults[attribute].slope}, Intercept - {regressionResults[attribute].intercept}
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Regression Analysis</Card.Title>
                  <Chart
                    options={{
                      chart: {
                        toolbar: {
                          show: false,
                        },
                      },
                      xaxis: {
                        categories: Object.keys(regressionResults),
                      },
                      yaxis: {
                        title: {
                          text: 'Value',
                        },
                      },
                    }}

                    series={regressionSeriesData}
                    type="line"
                    width="100%"
                    height="400"
                  />
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}

      {/* Display Time Series Analysis Results */}
      {timeSeriesAnalysis && Object.keys(timeSeriesAnalysis).length > 0 && (

        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Time Series Analysis</Card.Title>
                  {Object.keys(timeSeriesAnalysis).map((attribute, index) => (
                    <div key={index} className="mt-3">
                      <Card.Title>{attribute}</Card.Title>
                      <ListGroup variant="flush">
                        {/* Trend Analysis */}
                        <ListGroup.Item>
                          <strong>Trend Analysis:</strong> Slope: {timeSeriesAnalysis[attribute].trend.slope}, Intercept: {timeSeriesAnalysis[attribute].trend.intercept}
                        </ListGroup.Item>
                        {/* Seasonality Analysis */}
                        {timeSeriesAnalysis[attribute].seasonality && (
                          <ListGroup.Item>
                            <strong>Seasonality Analysis:</strong> Period: {timeSeriesAnalysis[attribute].seasonality.period}
                          </ListGroup.Item>
                        )}
                        {/* Anomaly Detection */}
                        {timeSeriesAnalysis[attribute].anomalies && (
                          <ListGroup.Item>
                            <strong>Anomaly Detection:</strong> Anomalies:
                            <ListGroup variant="flush">
                              {timeSeriesAnalysis[attribute].anomalies.map((anomaly, idx) => (
                                <ListGroup.Item key={idx}>Index: {anomaly.index}, Value: {anomaly.value}</ListGroup.Item>
                              ))}
                            </ListGroup>
                          </ListGroup.Item>
                        )}
                      </ListGroup>
                    </div>
                  ))}
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Time Series Analysis</Card.Title>
                  {Object.keys(timeSeriesAnalysis).map((attribute, index) => (
                    <div key={index} className="mt-3">
                      <Card.Title>{attribute}</Card.Title>
                      <Chart
                        options={{
                          chart: {
                            toolbar: {
                              show: false,
                            },
                          },
                          xaxis: {
                            categories: timeSeriesSeriesData.find(data => data.name === attribute)?.data.map(item => item.name) || [], // Categories are the attribute names
                          },
                          yaxis: {
                            title: {
                              text: 'Value',
                            },
                          },
                        }}
                        series={[{ name: attribute, data: timeSeriesSeriesData.find(data => data.name === attribute)?.data.map(item => item.value) || [] }]}
                        type="line"
                        width="100%"
                        height="400"
                      />
                    </div>
                  ))}
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}

      {/* Placeholder for Segmentation Analysis */}
      {segmentationAnalysis && Object.keys(segmentationAnalysis).length > 0 && (
        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Segmentation Analysis</Card.Title>
                  <ListGroup variant="flush">
                    {Object.keys(segmentationAnalysis).map((category, index) => (
                      <ListGroup.Item key={index}>
                        <strong>{category}:</strong> Mean - {segmentationAnalysis[category].mean}, Median - {segmentationAnalysis[category].median}
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Segmentation Analysis</Card.Title>
                  {Object.keys(segmentationAnalysis).map((category, index) => (
                    <div key={index} className="mt-3">
                      <Card.Title>{category}</Card.Title>
                      <Chart
                        options={{
                          chart: {
                            toolbar: {
                              show: false,
                            },
                          },
                          xaxis: {
                            categories: ['Mean', 'Median'],
                          },
                          yaxis: {
                            title: {
                              text: 'Value',
                            },
                          },
                        }}
                        series={segmentationSeriesData.filter(data => data.name === category)}
                        type="bar"
                        width="100%"
                        height="400"
                      />
                    </div>
                  ))}
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}

      {/* Display Classification Analysis results */}
      {Object.keys(classificationAnalysis).length > 0 && (
        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Classification Analysis</Card.Title>
                  <ListGroup variant="flush">
                    {Object.keys(classificationAnalysis).map((label, index) => (
                      <ListGroup.Item key={index}>
                        {label}:
                        <ListGroup>
                          <ListGroup.Item>Accuracy: {classificationAnalysis[label].accuracy.toFixed(2)}</ListGroup.Item>
                          <ListGroup.Item>Precision: {classificationAnalysis[label].precision.toFixed(2)}</ListGroup.Item>
                          <ListGroup.Item>Recall: {classificationAnalysis[label].recall.toFixed(2)}</ListGroup.Item>
                          <ListGroup.Item>F1-Score: {classificationAnalysis[label].f1Score.toFixed(2)}</ListGroup.Item>
                        </ListGroup>
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Classification Analysis</Card.Title>
                  <Chart
                    options={{
                      chart: {
                        toolbar: {
                          show: false,
                        },
                        stacked: true,
                      },
                      plotOptions: {
                        bar: {
                          horizontal: false,
                        },
                      },
                      xaxis: {
                        categories: Object.keys(classificationAnalysis),
                      },
                      yaxis: {
                        title: {
                          text: 'Percentage',
                        },
                      },
                    }}
                    series={classificationSeriesData}
                    type="bar"
                    width="100%"
                    height="400"
                  />
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}

      {/* Display PCA results */}
      {!isLoadingPCA && pcaResults.length > 0 && (

        <Container className='col-md-12'>
          <Row className="mt-4">
            <Col className="col-md-4">
              <Card>
                <Card.Body>
                  <Card.Title>Principal Component Analysis (PCA)</Card.Title>
                  <ListGroup variant="flush">
                    {pcaResults.map((component, index) => (
                      <ListGroup.Item key={index}>
                        Component {index + 1}:
                        <ListGroup variant="flush">
                          {component.map((value, idx) => (
                            <ListGroup.Item key={idx}>{value.toFixed(6)}</ListGroup.Item>
                          ))}
                        </ListGroup>
                      </ListGroup.Item>
                    ))}
                  </ListGroup>
                </Card.Body>
              </Card>
            </Col>
            <Col className="col-md-8">
              <Card>
                <Card.Body>
                  <Card.Title>Principal Component Analysis (PCA)</Card.Title>
                  <Chart
                    options={pcaOptions}
                    series={pcaSeriesData}
                    type="line"
                    width="100%"
                    height="400"
                  />
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Container>
      )}

      {/* Loading message for PCA results */}
      {isLoadingPCA && (
        <Row className="mt-4">
          <Col>
            <p>Loading PCA results...</p>
          </Col>
        </Row>
      )}

    </div>
  );
}

export default DatasetAnalytics;
