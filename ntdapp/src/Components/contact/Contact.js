import React from 'react';
import ContactForm from './ContactForm';
import ContactInfo from './ContactInfo';
import Map from './Map';

function Contact() {
  return (
    <div className="bg-green-100 min-h-screen p-4">
    <div className='p-10'>
      <h3 className="text-teal-600 text-center text-4xl font-semibold mt-4 mb-4">Contact Us</h3>
      <div className='flex flex-col items-center justify-center'>
        <ContactForm />
        <ContactInfo />
      </div>
        <Map />
    </div>
    </div>
  )
}

export default Contact