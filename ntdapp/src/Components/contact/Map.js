import React from "react";

function Map() {
  return (
    <div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3914.5400086432505!2d7.6826214!3d11.147596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11b2841be04d4441%3A0x3563411d7900c5fe!2s4MXM%2B22Q%2C%20Zaria%20810106%2C%20Kaduna!5e0!3m2!1sen!2sng!4v1727104357286!5m2!1sen!2sng"
        width="100%"
        height="450"
        style={{ border: 0 }}
        allowFullScreen={true}
        loading="lazy"
        className="rounded-md"
        referrerPolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  );
}

export default Map;
