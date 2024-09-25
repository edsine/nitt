import React, { useState, useEffect } from 'react';
import Logo from "../assets/ntdlogo.jpg" 
import {Link} from "react-router-dom"

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);

  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };

  // Handle scroll event to make navbar fixed
  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 50) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };

    window.addEventListener('scroll', handleScroll);

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  return (
    <nav className={`bg-green-950 bg-opacity-90 ${isScrolled ? 'fixed top-0 left-0 w-full shadow-lg' : 'relative'} transition duration-300 ease-in-out`}>
      <div className="container mx-auto px-4 py-3 flex justify-between items-center">
        <div className="text-2xl font-bold">
          <Link to='/'>
           <img src={Logo} alt="Company Logo" className="w-[60px]" />
          </Link>
        </div>

        {/* Desktop Links */}
        <div className="hidden md:flex space-x-6">
  <Link to='/' className="bg-[#32CD32]  text-white  no-underline hover:bg-green-700 transition duration-300 px-3 py-1 rounded">Home</Link>
  <Link to='/data' className="bg-[#32CD32] text-white no-underline hover:bg-green-700 transition duration-300 px-3 py-1 rounded">Data</Link>
  <Link to='/contact' className="bg-[#32CD32] text-white no-underline hover:bg-green-700 transition duration-300 px-3 py-1 rounded">Contact</Link>
</div>


        {/* Mobile Menu Button */}
        <div className="md:hidden">
          <button onClick={toggleMenu} className="text-white focus:outline-none">
            <svg
              className="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M4 6h16M4 12h16m-7 6h7"
              ></path>
            </svg>
          </button>
        </div>
      </div>

      {/* Mobile Menu */}
      {isOpen && (
        <div className="md:hidden bg-green-600 px-4 pt-2 pb-4 space-y-2">
          <a href="#home" className="block text-white hover:text-green-200 transition-colors">Home</a>
          <a href="#about" className="block text-white hover:text-green-200 transition-colors">Data</a>
          <a href="#contact" className="block text-white hover:text-green-200 transition-colors">Contact</a>
        </div>
      )}
    </nav>
  );
};

export default Navbar;
