import React from 'react';
import Land from './Land';
import LandBar from './LandBar';
import Graph from '../assets/graphh.jpg';
import Logo from '../assets/ntdlogo.jpg';
import visualOne from '../assets/visualOne.png';




const LandingPage = () => {
  return (


    <React.Fragment>
      <div className='wrapper-landinpg'>
    <header class="header">
    
    <img src={Logo} alt="Company Logo" className="logo" />
    
    <nav class="nav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="/data">Data</a></li>
        <li><a href="#">Contact Us</a></li>
        
      </ul>
    </nav>
  </header>
   
        <div className='hero-content'>
          <h1 className='hero-title'>Welcome to NITT Visualization Data Bank</h1>
          <p class="hero-subtitle">Implement Graphs so see a perpertual vieew of your Data</p>
          <a href="#" class="btn btn-primary">Learn More</a>
        </div>

        <div className='graph-container'>
        
          <p className='graph-text'>Welcome to the Data Visualization Data Bank of the Nigerian Institute of Transport Technology NITT, Zaria, the apex Transport and Logistics Institute in Nigeria, and the West African Sub-region.</p>
       
       
        <img src={Graph} alt="Graph" className='graph-img1'/>
        
        </div>

      <footer className='LandFooter'>
          <p>&copy; NITT. All Rights Reserved</p>
        </footer>
      </div>
    </React.Fragment>
  );
}

export default LandingPage;
