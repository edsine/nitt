import React from 'react';

const ContactInfo = () => {
  return (
    <div className="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md mt-6 md:mt-0">
      <h3 className="text-teal-600 text-2xl font-semibold mb-4">Any Message for Us?</h3>
      <p className="text-gray-700 mb-4">You have questions and we have answers. Contact us today, we're here to help.</p>
      <ul className="text-gray-700 space-y-2">
       <li><strong>Email:</strong> <a href='info@nitt.com.ng'> info@nitt.gov.ng</a></li>
        <li><strong>Phone:</strong> +234-803-058-2989</li>
        <li><strong>Address:</strong> Basawa Road, Zaria, Kaduna State Nigeria</li>
        <li><strong>Hours:</strong> Monday - Friday: 8AM - 4PM</li>
        <li><strong>Closed:</strong> Saturday - Sunday</li>
      </ul>
    </div>
  );
};

export default ContactInfo;
