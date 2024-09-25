import React, { useEffect, useState } from "react";
import LandingImage from "../assets/landingimage.jpg";
import graphanimation from "./graphanimation.json";
import Lottie from "lottie-react";

const Land = () => {

  return (
    <React.Fragment>
      <section
        className="relative h-screen bg-cover bg-center"
        style={{ backgroundImage: `url(${LandingImage})` }}
    
      >
        <div className="absolute inset-0 bg-green-950 bg-opacity-50"></div>

          <div className="flex justify-around gap-5 items-center  w-full h-full text-white px-4">
            {/* Text Content */}
            <div className="max-w-2xl md:text-left text-white">
              <h1 className="text-4xl md:text-6xl font-bold">
                WELCOME TO NITT TRANSPORT DATA VISUALIZATION BANK
              </h1>
              <p className="mt-4 ml- text-lg md:text-xl">
                {" "}
                {/* Reduced margin-left */}
                Explore comprehensive transport data and visualizations.
              </p>
              <div className="mt-6">
                <a
                  href="/data"
                  className="px-4 py-2 bg-[#32CD32] text-white font-light rounded-lg shadow-md no-underline hover:bg-green-700 transition duration-300"
                >
                  CLICK HERE TO VIEW MORE
                </a>
              </div>
            </div>



            {/* Lottie Animation */}
            <div className="hidden md:flex flex-shrink-0 md:mr-16 w-64 md:w-[450px]">
              {" "}
              {/* Increased width for the animation */}
              <Lottie animationData={graphanimation} className="w-full scale-150 mr-10" />  
            </div> 
          </div>
      </section>
    </React.Fragment>
  );
};

export default Land;
