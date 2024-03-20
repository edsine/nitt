import React from "react";
import { Routes, Route } from "react-router-dom";
import HomeCopy from "./Pages/Home-copy";
import Contact from "./Pages/Contact";
import About from "./Pages/About";
import NavbarCopy from "./Components/Navbar-copy";
import Footer from "./Components/Footer";
import "./App.css";
function App() {
  return (
    <>
      <div className="main">
        <NavbarCopy/>
        <Routes>
            <Route path="/" element={<HomeCopy />}></Route>
            <Route path="/about" element={<About />}></Route>
            <Route path="/contact" element={<Contact />}></Route>
        </Routes>
        <Footer/>
      </div>
    </>
  );
}

export default App;
