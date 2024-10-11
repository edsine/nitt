import React from "react";

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-6">
      <div className="container mx-auto px-4">
        <div className="flex flex-col md:flex-row justify-between items-center">
          <div className="text-xl font-bold mb-4 md:mb-0">
            <a href="/" className="text-green-500 no-underline">
              NITT
            </a>
          </div>

          <div className="flex space-x-6 mb-4 md:mb-0">
            <a href="#about" className="hover:text-green-500 transition duration-300 no-underline">About</a>
            <a href="#services" className="hover:text-green-500 transition duration-300 no-underline">Services</a>
            <a href="#contact" className="hover:text-green-500 transition duration-300 no-underline">Contact</a>
          </div>
        </div>

        <div className="mt-6 text-center text-sm text-gray-400">
          &copy; {new Date().getFullYear()} NITT. All rights reserved.
        </div>
      </div>
    </footer>
  );
};

export default Footer;
