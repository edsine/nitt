import React from 'react'
import Land from './Land'
import LandBar from './LandBar'



const LandingPage = () => {
  return (
    <React.Fragment>
    <section>
    <div className='wrapper-md' style={{ paddingLeft: "80px", paddingRight: "80px" }}>

        <LandBar/>
        <Land/>
      </div>
    </section>
  </React.Fragment>
  )
}

export default LandingPage