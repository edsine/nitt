// import React from 'react';

// function Footer() {
//   return (
//     <footer className="bg-dark text-white text-center text-lg-start fixed-bottom">
//       {/* Grid container */}
//       <div className="container p-4">
//         {/*Grid row*/}
//         <div className="row">
//           {/*Grid column*/}
//           <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
//             <h5 className="text-uppercase">Links</h5>

//             <ul className="list-unstyled mb-0">
//               <li>
//                 <a href="#!" className="text-white">Link 1</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 2</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 3</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 4</a>
//               </li>
//             </ul>
//           </div>
//           {/*Grid column*/}
//           <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
//             <h5 className="text-uppercase">Links</h5>

//             <ul className="list-unstyled mb-0">
//               <li>
//                 <a href="#!" className="text-white">Link 1</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 2</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 3</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 4</a>
//               </li>
//             </ul>
//           </div>

//           {/* Repeat the above Grid column pattern for other columns */}
//           <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
//             <h5 className="text-uppercase">Links</h5>

//             <ul className="list-unstyled mb-0">
//               <li>
//                 <a href="#!" className="text-white">Link 1</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 2</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 3</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 4</a>
//               </li>
//             </ul>
//           </div>

//           <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
//             <h5 className="text-uppercase">Links</h5>

//             <ul className="list-unstyled mb-0">
//               <li>
//                 <a href="#!" className="text-white">Link 1</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 2</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 3</a>
//               </li>
//               <li>
//                 <a href="#!" className="text-white">Link 4</a>
//               </li>
//             </ul>
//           </div>
//         </div>
//         {/*Grid row*/}
//       </div>
//       {/* Grid container */}

//       {/* Copyright */}
//       <div className="text-center p-3" style={{ backgroundColor: 'rgba(0, 0, 0, 0.05)' }}>
//         © 2020 Copyright:
//         <a className="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
//       </div>
//       {/* Copyright */}
//     </footer>
//   );
// }

// export default Footer;



import React from "react";

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-6">
      <div className="container mx-auto px-4">
        <div className="flex flex-col md:flex-row justify-between items-center">
          <div className="text-xl font-bold mb-4 md:mb-0">
            <a href="/" className="text-green-500">
              NITT
            </a>
          </div>

          <div className="flex space-x-6 mb-4 md:mb-0">
            <a href="#about" className="hover:text-green-500 transition duration-300">About</a>
            <a href="#services" className="hover:text-green-500 transition duration-300">Services</a>
            <a href="#contact" className="hover:text-green-500 transition duration-300">Contact</a>
          </div>

          {/* <div className="flex space-x-4">
            <a href="https://facebook.com" className="hover:text-green-500 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M18 2h-3.5a4.5 4.5 0 00-4.5 4.5V8H8v4h2v8h4v-8h2.5l.5-4h-3V6.5a1.5 1.5 0 011.5-1.5H18V2z" />
              </svg>
            </a>
            <a href="https://twitter.com" className="hover:text-green-500 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016.5 2a4.48 4.48 0 00-4.39 5.48A12.94 12.94 0 013 4.47a4.48 4.48 0 001.38 5.98A4.45 4.45 0 012 9.54v.06a4.48 4.48 0 003.59 4.4A4.48 4.48 0 012.5 14v.06a4.48 4.48 0 004.19 4.52A9.03 9.03 0 010 20.36a12.94 12.94 0 007 2.04c8.36 0 12.93-6.94 12.93-12.93 0-.2 0-.42-.02-.63A9.23 9.23 0 0023 3z" />
              </svg>
            </a>
            <a href="https://linkedin.com" className="hover:text-green-500 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 8a6 6 0 00-12 0v8a6 6 0 0012 0V8z" />
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 14v8m-8-8h8" />
              </svg>
            </a>
          </div> */}
        </div>

        <div className="mt-6 text-center text-sm text-gray-400">
          &copy; {new Date().getFullYear()} NITT. All rights reserved.
        </div>
      </div>
    </footer>
  );
};

export default Footer;
