// import axios from "axios"
import { get, post, put } from "./api_helper"
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

// Add Road Transport Data (Passengers)
const postPassengerRoadTransportData = (data, config) => post(url.ADD_PASSENGER_ROAD_TRANSPORT_DATA, data, config);

// Get Road Transport Data (Freight)
const getFreightRoadTransportData = config => get(url.GET_FREIGHT_ROAD_TRANSPORT_DATA, config);

// Update User
const putUser = (data, id, config) => put(url.PUT_USER(id), data, config)

// Update Profile
const putUpdateProfile = (data, id, config) => put(url.PUT_UPDATE_PROFILE(id), data, config)

export {
    getLoggedInUser,
    getPassengerRoadTransportData,
    postPassengerRoadTransportData,
    getFreightRoadTransportData,
    getAuthenticatedUser,
    isUserAuthenticated,
    postLogin,
    postLogout,
    putUser,
    putUpdateProfile
}
