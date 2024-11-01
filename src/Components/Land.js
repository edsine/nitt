import React, { useEffect, useState } from "react";
import LandingImage from "../assets/landingimage.jpg";
import graphanimation from "./graphanimation.json";
import CarAnimation from "./CarAnimation.json";
import TrainAnimation from "./TrainAnimation.json";
import ShipAnimation from "./ShipAnimation.json";
import Lottie from "lottie-react";
import Logo from "../assets/ntdlogo.jpg"; 

const animations = [graphanimation, CarAnimation, TrainAnimation, ShipAnimation]; 

const Land = () => {
  const [currentAnimation, setCurrentAnimation] = useState(0);
  const [fade, setFade] = useState(true); 

  useEffect(() => {
    const interval = setInterval(() => {
    
      setFade(false);

       
      setTimeout(() => {
        setCurrentAnimation((prev) => (prev + 1) % animations.length); 
        setFade(true);
      }, 500);
    }, 5000);

    return () => clearInterval(interval);
  }, []);

  return (
    <React.Fragment>
      <section
        className="relative h-screen bg-cover bg-center"
        style={{ backgroundImage: `url(${LandingImage})` }}
      >
        <div className="absolute inset-0 bg-green-950 bg-opacity-50"></div>
        <div className="flex justify-around gap-5 items-center w-full h-full text-white px-4">
          
          {/* Text Content */}
          <div className="max-w-2xl md:text-left text-white">
            <img src={Logo} alt="Company Logo" className="w-[90px] ml-2" />

            <h1 className="text-4xl md:text-6xl font-bold">
              WELCOME TO THE NIGERIA TRANSPORT DATA VISUALIZATION DASHBOARD
            </h1>
            <p className="mt-4 ml-2 text-lg md:text-xl">
              Explore Multi-facet Nigeria Transport Data
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
            <div className={`lottie-container ${fade ? 'fade-in' : 'fade-out'}`}>
            <Lottie 
                animationData={animations[currentAnimation]} 
                className={`w-full scale-150 mr-10 ${currentAnimation === 0 ? 'graphanimation-class' : ''}`} 
              />
            </div>
          </div>
        </div>
      </section>
    </React.Fragment>
  );
};

export default Land;
