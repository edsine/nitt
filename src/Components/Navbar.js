import React from 'react';
import { useState } from 'react';
import Logo from '../assets/ntdlogo.jpg';
import "../App.css";

function Navbar() {
  const [isNavCollapsed, setIsNavCollapsed] = useState(true);

  const handleNavCollapse = () => setIsNavCollapsed(!isNavCollapsed);

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-white">
      <div className="container-fluid">
        <a className="navbar-brand" href="#">
          <img src={Logo} alt="Company Logo" className="logo" />
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded={!isNavCollapsed ? true : false}
          aria-label="Toggle navigation"
          onClick={handleNavCollapse}
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className={`${isNavCollapsed ? 'collapse' : ''} navbar-collapse rounded-end d-lg-flex justify-content-center w-25`} id="navbarNav" style={{ boxShadow: '5px 5px 5px rgba(0, 0, 0, 0.2)', width:"50%" }}>
          <ul className="navbar-nav">
            <li className="nav-item">
              <a className="links nav-link active" aria-current="page" href="/charttemp">Charts</a>
            </li>
            <li className="nav-item">
              <a className="links nav-link" href="/tabletemp">Tables</a>
            </li>
            <li className="nav-item">
              {/* <a className="links nav-link" href="#">About</a> */}
            </li>
            <li className="nav-item">
              {/* <a className="links nav-link">Contact</a> */}
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
