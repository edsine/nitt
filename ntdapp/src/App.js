import React from "react";
import { Routes, Route, useLocation } from "react-router-dom";
import Home from "./Pages/Homes";
import Contact from "./Pages/Contact";
import About from "./Pages/About";
import Navbar from "./Components/Navbar";
import Footer from "./Components/Footer";
import MapTemp from "./Pages/Templates/Map_Template";
import TableTemp from "./Pages/Templates/Table_Template";
import ChartTemp from "./Pages/Templates/Chart_Template";
import ApexBob from "./Components/apexcharts/ApexBob";
import ApexCand from "./Components/apexcharts/ApexCand";
import ApexCandle from "./Components/apexcharts/ApexCandle";
import ApexPie from "./Components/apexcharts/ApexPie";
import DataSetDetails from "./Pages/DataSetDetails";
import DataSetCharts from "./Pages/DataSetCharts";
import DataSetDetailsTest from "./Pages/DataSetDetailsTest";
import DatasetAnalytics from "./Pages/DataSetAnalytics";
import LandingPage from "./Components/LandingPage";
import "./App.css";

function App() {
  
  const location = useLocation();

  return (
    <>
      <div className="main">
        {location.pathname !== "/" && <Navbar />}
        <div className="container">
          <div className="row">
            <Routes>
              <Route path="/" element={<LandingPage />} />
              <Route path="/data" element={<Home />} />
              <Route path="/about" element={<About />} />
              <Route path="/contact" element={<Contact />} />
              <Route path="/charttemp" element={<ChartTemp />} />
              <Route path="/maptemp" element={<MapTemp />} />
              <Route path="/tabletemp" element={<TableTemp />} />
              <Route path="/apexbob" element={<ApexBob />} />
              <Route path="/tabletemp" element={<ApexCand />} />
              <Route path="/tabletemp" element={<ApexCandle />} />
              <Route path="/tabletemp" element={<ApexPie />} />
              <Route
                path="/datasetdetails/:datasetName"
                element={<DataSetDetails />}
              />
              <Route
                path="/datasetdetailstest/:datasetName"
                element={<DataSetDetailsTest />}
              />
              <Route
                path="/datasetcharts/:datasetName/:tableName/:selectedEndpoint"
                element={<DataSetCharts />}
              />
              <Route
                path="/datasetanalytics/:datasetName/:tableName/:selectedEndpoint"
                element={<DatasetAnalytics />}
              />
            </Routes>
          </div>
        </div>
        {/* <Footer /> */}
      </div>
    </>
  );
}

export default App;
