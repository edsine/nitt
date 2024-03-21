import React from "react";
import { Routes, Route } from "react-router-dom";
import HomeCopy from "./Pages/Home-copy";
import Home from "./Pages/Home";
import Contact from "./Pages/Contact";
import About from "./Pages/About";
import NavbarCopy from "./Components/Navbar-copy";
import Footer from "./Components/Footer";
import "./App.css";
import MapTemp from "./Pages/Templates/Map_Template";
import TableTemp from "./Pages/Templates/Table_Template";
import ChartTemp from "./Pages/Templates/Chart_Template";

function App() {
  return (
    <>
      <div className="main">
        {/* <Navbar /> */}
        <NavbarCopy />
        <div className="container-fluid">
          <div className="row">
            <Routes>
              <Route path="/" element={<HomeCopy />}></Route>
              <Route path="/home" element={<Home />}></Route>
              <Route path="/about" element={<About />}></Route>
              <Route path="/contact" element={<Contact />}></Route>
              <Route path="/charttemp" element={<ChartTemp />}></Route>
              <Route path="/maptemp" element={<MapTemp />}></Route>
              <Route path="/tabletemp" element={<TableTemp />}></Route>
            </Routes>
          </div>
        </div>
        <Footer />
      </div>
    </>
  );
}

export default App;
