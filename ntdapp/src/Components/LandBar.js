import React, { useState } from "react";
import { LandData } from "../data/LandData";
import { FaBars, FaTimes } from "react-icons/fa";
import { NavLink } from "react-router-dom";

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
        <div className="w-100 h-20 d-flex justify-content-between align-items-center text-white fs-4 px-4 px-md-0">
          {/* logo section */}
          <div className="d-flex align-items-center">
            <p>
              <span className="text-danger fw-bold"></span></p>
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
