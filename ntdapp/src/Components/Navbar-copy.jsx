import React from "react";
import { useState } from "react";
import "../App.css";
import { LogoNtd } from "./Images";
import Container from "react-bootstrap/Container";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";

export default function NavbarCopy() {
  const [isNavCollapsed, setIsNavCollapsed] = useState(true);

  const handleNavCollapse = () => setIsNavCollapsed(!isNavCollapsed);
  return (
    <Navbar
      expand="lg"
      className="navbar navbar-expand-lg navbar-light bg-white"
    >
      <Container fluid>
        <a className="navbar-brand" href="#">
          <LogoNtd />
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
        <div
          className={`${
            isNavCollapsed ? "collapse" : ""
          } navbar-collapse d-lg-flex justify-content-center nav-content`}
          id="navbarNav"
        >
          <ul className="navbar-nav">
            <li className="nav-item px-4 nav-list">
              <a className="links nav-link active" aria-current="page" href="#">
                Home
              </a>
            </li>
            <li className="nav-item px-4 nav-list">
              <a className="links nav-link" href="#">
                Features
              </a>
            </li>
            <li className="nav-item px-4 nav-list">
              <a className="links nav-link" href="#">
                About
              </a>
            </li>
            <li className="nav-item px-4 nav-list">
              <a className="links nav-link">Contact</a>
            </li>
          </ul>
        </div>
      </Container>
    </Navbar>
  );
}
