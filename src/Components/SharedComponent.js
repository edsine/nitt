import React from 'react'
import { Outlet } from 'react-router-dom'
import Navbar from './LandBar'
import Footer from './Footer'

function SharedComponent() {
  return (
    <div>
        <Navbar />
        <Outlet />
        <Footer />
    </div>
  )
}

export default SharedComponent