// src/Land.js
import React from 'react';
import { Link } from 'react-router-dom';

const Land = () => {
  return (
    <section className="wrapper">
      <div className="hero-content">
        <h1 className="welcomeNitt">WELCOME TO NITT DATA VISUALIZATION BANK</h1>
        <p className="hero-subtitle">Use Data to Get a 360-Degree View of Your Business</p>
        <Link to="/learn-more" className="btn viewmore-btn">Learn More</Link>
      </div>
    </section>
  );
};

export default Land;
