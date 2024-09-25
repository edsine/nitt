import React from 'react';

const ContactForm = () => {
  return (
    <div className="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md">
      <form>
        <label htmlFor="name" className="block text-gray-700">Full Name</label>
        <input type="text" id="name" className="w-full p-2 mb-4 border focus:border-teal-400 rounded" required />

        <label htmlFor="email" className="block text-gray-700">Email</label>
        <input type="email" id="email" className="w-full p-2 mb-4 border focus:border-teal-400 rounded" required />

        <label htmlFor="subject" className="block text-gray-700">Subject</label>
        <input type="text" id="subject" className="w-full p-2 mb-4 border focus:border-teal-400 rounded" required />

        <label htmlFor="message" className="block text-gray-700">Your Message</label>
        <textarea id="message" rows="5" className="w-full p-2 mb-4 border focus:border-teal-400 rounded" required></textarea>

        <div className="flex items-center mb-4">
          <input type="checkbox" id="captcha" className="mr-2" />
          <label htmlFor="captcha">I'm not a robot</label>
        </div>

        <button type="submit" className="bg-teal-600 text-white py-2 px-4 rounded hover:bg-teal-500">
          Send
        </button>
      </form>
    </div>
  );
};

export default ContactForm;
