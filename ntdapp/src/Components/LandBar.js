import React, { useState } from "react";
import { LandData } from "../data/LandData";
import { FaBars, FaTimes } from "react-icons/fa";
import { NavLink } from "react-router-dom";
import Logo from '../assets/ntdlogo.jpg';




const LandBar = () => {
  const [toggle, setToggle] = useState(false);

  const handleToggle = () => {
    setToggle(!toggle);
  };

  // active navLinks 
  const activeLink = "border text-black px-4 py-1"; 
  const normalLink = " ";
  return (
    <React.Fragment>
      <section>
        <div className="LandBarContainer">
            <div className="LandLogo">
         {/* logo section */}
         <a className="navbar-brand" href="#">
          <img src={Logo} alt="Company Logo" className="logo" />
        </a>
        </div>

          {/* large screen */}
          <div className="d-none d-md-flex">
            <div className="d-flex gap-4 align-items-center">
              {LandData.map((item, index) => {
                return (
                  <div key={index}>
                    <NavLink to={item.path} 
                             className={({ isActive }) =>
                               isActive ? activeLink : normalLink
                             }
                             style={{
                                padding: '5px',
                                color: 'black',
                                backgroundColor: '#7ebd79',
                                borderRadius: '4px',
                                textTransform: 'uppercase',
                                textDecoration: 'none',
                                fontWeight: 'light',
                                fontSize: '15px'
                              }}
                    >
                      <span>{item.title}</span>
                    </NavLink>
                  </div>
                );
              })}
            </div>
          </div>

          {/* mobile screen */}
          <section className='d-md-none'>
            <div className="d-flex align-items-center h-20">
              <div className="fs-2">
                {toggle === false ? (
                  <FaBars onClick={handleToggle} />
                ) : (
                  <FaTimes onClick={handleToggle} />
                )}
              </div>
            </div>
          </section>
        </div>
      </section>
    </React.Fragment>
  );
};

export default LandBar;
