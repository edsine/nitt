// import axios from "axios"
import { config } from "@fullcalendar/react"
import { get, post } from "./api_helper"
import * as url from "./backend_url_helper"

// Gets the logged in user data from local session
const getLoggedInUser = () => {
    const user = localStorage.getItem("user")
    if (user) return JSON.parse(user)
    return null
}

//is user is logged in
const isUserAuthenticated = () => {
    return getLoggedInUser() !== null
}

// Login Method
const postLogin = data => post(url.POST_LOGIN, data);

// Logout Method
const postLogout = (data, config) => post(url.POST_LOGOUT, data, config);

// Get Authenticated User Method
const getAuthenticatedUser = config => get(url.GET_AUTHENTICATED_USER, config);

// Get Road Transport Data (Passengers)
const getPassengerRoadTransportData = config => get(url.GET_PASSENGER_ROAD_TRANSPORT_DATA, config);

export {
    getLoggedInUser,
    getPassengerRoadTransportData,
    getAuthenticatedUser,
    isUserAuthenticated,
    postLogin,
    postLogout
}
