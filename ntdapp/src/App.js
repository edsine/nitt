import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./Pages/Home";
import Contact from "./Pages/Contact";
import About from "./Pages/About";
import Navbar from "./Components/Navbar";
import Footer from "./Components/Footer";
import "./App.css";
function App() {
  return (
    <>
      <div className="main">
        <Navbar/>
        <Routes>
            <Route path="/" element={<Home />}></Route>
            <Route path="/about" element={<About />}></Route>
            <Route path="/contact" element={<Contact />}></Route>
        </Routes>
        <Footer/>
      </div>
    </>
  );
}

export default App;
