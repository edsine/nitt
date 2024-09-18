import React from "react";

const Land = () => {
  return (
    <React.Fragment>

      <section>
        <div className='d-flex justify-content-center align-items-center vh-100' style={{ marginTop: "-80px" }}>
          <div>
            <div className="text-black text-center">
              <p className='display-4 display-md-2'><b>WELCOME TO NITT TRANSPORT DATA VISUALIZATION BANK</b></p>
            </div>
            <div className='mt-4 text-center'>
              <a href= '/data' className='btn btn-danger me-3'>CLICK HERE TO VIEW MORE</a>
            </div>
          </div>
        </div>
      </section>
    </React.Fragment>
  );
};

export default Land;
