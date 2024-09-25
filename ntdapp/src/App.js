import React from "react";
import { Routes, Route } from "react-router-dom";

// PAGES/COMPONENTS
import Home from "./Pages/Homes";
import Contact from "./Components/contact/Contact";
import About from "./Pages/About";
import SharedComponent from "./Components/SharedComponent";
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
import Navbar from "./Components/Navbar";


function App() {
  return (
    <>
      <div className="main">
        <div>
          <div>
            <Routes>
              <Route path="/" element={<SharedComponent />}>
                <Route path="/data" element={<Home />}></Route>
                <Route path="/" element={<LandingPage />}></Route>
                <Route path="/about" element={<About />}></Route>
                <Route path="/contact" element={<Contact />}></Route>
              </Route>
              <Route path="/charttemp" element={<ChartTemp />}></Route>
              <Route path="/maptemp" element={<MapTemp />}></Route>
              <Route path="/tabletemp" element={<TableTemp />}></Route>
              <Route path="/apexbob" element={<ApexBob />}></Route>
              <Route path="/tabletemp" element={<ApexCand />}></Route>
              <Route path="/tabletemp" element={<ApexCandle />}></Route>
              <Route path="/tabletemp" element={<ApexPie />}></Route>
              <Route path="/tabletemp" element={<ApexPie />}></Route>
              <Route path="/tabletemp" element={<ApexPie />}></Route>
              <Route path="/tabletemp" element={<ApexPie />}></Route>
              <Route
                path="/datasetdetails/:datasetName"
                element={<DataSetDetails />}
              ></Route>
              <Route
                path="/datasetdetailstest/:datasetName"
                element={<DataSetDetailsTest />}
              ></Route>
              <Route
                path="/datasetcharts/:datasetName/:tableName/:selectedEndpoint"
                element={<DataSetCharts />}
              ></Route>
              <Route
                path="/datasetanalytics/:datasetName/:tableName/:selectedEndpoint"
                element={<DatasetAnalytics />}
              ></Route>
              {/* <Route path="/datasetdetails/:datasetName" component={DataSetDetails} /> */}
            </Routes>
          </div>
        </div>
        {/* <Footer /> */}
      </div>
    </>
  );
}

export default App;
