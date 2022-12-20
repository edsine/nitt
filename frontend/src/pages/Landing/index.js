import React, { useState } from "react";
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink,
  Row,
  Col,
} from "reactstrap";
import { Link } from "react-router-dom";

import logo from "../../assets/images/nitt-logo.png";
import landingImage from "../../assets/images/landing-page.png";

const Landing = () => {
  const [isOpen, setIsOpen] = useState(false);

  const toggle = () => setIsOpen(!isOpen);
  return (
    <div className="mx-5">
      <Navbar light={true} expand="md">
        <NavbarBrand href="/">
          <img
            alt="logo"
            src={logo}
            style={{
              height: 40,
              width: 40,
            }}
          />
          NITT
        </NavbarBrand>
        <NavbarToggler onClick={toggle} />
        <Collapse isOpen={isOpen} navbar>
          <Nav className="ms-auto" navbar>
            <NavItem className="m-3">
              <NavLink href="https://nitt.gov.ng/">NITT Website</NavLink>
            </NavItem>
            <NavItem className="m-3">
              <Link
                className="btn btn-outline-success waves-effect"
                style={{ borderRadius: "0px 20px 0px 20px" }}
                to="/login"
              >
                <span className="text-success">Login</span>
              </Link>
            </NavItem>
            <NavItem className="m-3">
              <Link
                className="btn btn-success waves-effect"
                style={{ borderRadius: "0px 20px 0px 20px" }}
                to="/register"
              >
                <span>Register</span>
              </Link>
            </NavItem>
          </Nav>
        </Collapse>
      </Navbar>
      <div
        style={{
          display: "flex",
          alignItems: "center",
        }}
        className="pt-5"
      >
        <Row className="mt-5">
          <Col lg={5} md={12} sm={12}>
            <h1>Nigerian Institute of Transport Technology</h1>
            <span>Digitization Dashboard</span>
            <p className="mt-5 fs-5">
              Welcome to NITT digitization dashboard! Here you'll find real-time
              updates on everything from vehicle, air, train and freight
              transport data. Our dashboard has the information you need to plan
              your transport projects. Our dashboard is designed to be
              user-friendly and easy to navigate. You can quickly navigate
              across all provided indicators, to get a forecast of transport
              information in Nigeria. So if you want to stay up-to-date
              Nigeria's Transport information, be sure to bookmark our dashboard
              and check it out anytime.
            </p>
            <Link
              className="btn btn-success waves-effect px-5 mt-5"
              style={{ borderRadius: "0px 20px 0px 20px" }}
              to="/register"
            >
              <span>GET STARTED</span>
            </Link>
          </Col>
          <Col lg={7} md={12} sm={12} className="d-sm-none d-md-block">
            <img
              style={{ maxWidth: "90%" }}
              src={landingImage}
              alt="landing page"
            />
          </Col>
        </Row>
      </div>
    </div>
  );
};

export default Landing;
