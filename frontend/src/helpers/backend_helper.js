// import axios from "axios"
import { del, get, post, put } from "./api_helper";
import * as url from "./backend_url_helper";

// Gets the logged in user data from local session
export const getLoggedInUser = () => {
  const user = localStorage.getItem("user");
  if (user) return JSON.parse(user);
  return null;
};

//is user is logged in
export const isUserAuthenticated = () => {
  return getLoggedInUser() !== null;
};

// Get App Permissions
export const getAppPermissions = (config) =>
  get(url.GET_APP_PERMISSIONS, config);

// Login Method
export const postLogin = (data) => post(url.POST_LOGIN, data);

// Logout Method
export const postLogout = (data, config) => post(url.POST_LOGOUT, data, config);

// Get Authenticated User Method
export const getAuthenticatedUser = (config) =>
  get(url.GET_AUTHENTICATED_USER, config);

// Get Road Transport Data (Passengers)
export const getPassengerRoadTransportData = (config) =>
  get(url.GET_PASSENGER_ROAD_TRANSPORT_DATA, config);

// Add Road Transport Data (Passengers)
export const postPassengerRoadTransportData = (data, config) =>
  post(url.ADD_PASSENGER_ROAD_TRANSPORT_DATA, data, config);

// Update Road Transport Data (Passengers)
export const putPassengerRoadTransportData = (data, id, config) =>
  put(url.UPDATE_PASSENGER_RTD(id), data, config);

// Delete Road Transport Data (Passengers)
export const deletePassengerRoadTransportData = (id, config) =>
  del(url.DELETE_PASSENGER_RTD(id), config);

// Get Road Transport Data (Freight)
export const getFreightRoadTransportData = (config) =>
  get(url.GET_FREIGHT_ROAD_TRANSPORT_DATA, config);

// Add Road Transport Data (Freight)
export const postFreightRoadTransportData = (data, config) =>
  post(url.ADD_FREIGHT_ROAD_TRANSPORT_DATA, data, config);

// Update Road Transport Data (Freight)
export const putFreightRoadTransportData = (data, id, config) =>
  put(url.UPDATE_FREIGHT_RTD(id), data, config);

// Delete Road Transport Data (Freight)
export const deleteFreightRoadTransportData = (id, config) =>
  del(url.DELETE_FREIGHT_RTD(id), config);

// Get Air Transport Data
export const getAirTransportData = (config) =>
  get(url.GET_AIR_TRANSPORT_DATA, config);

// Add Air Transport Data
export const postAirTransportData = (data, config) =>
  post(url.ADD_AIR_TRANSPORT_DATA, data, config);

// Update Air Transport Data
export const putAirTransportData = (data, id, config) =>
  put(url.UPDATE_AIR_TRANSPORT_DATA(id), data, config);

// Delete Air Transport Data
export const deleteAirTransportData = (id, config) =>
  del(url.DELETE_AIR_TRANSPORT_DATA(id), config);

// Get Air Passenger Traffic
export const getAirPassengerTraffic = (config) =>
  get(url.GET_AIR_PASSENGER_TRAFFIC, config);

// Add Air Passenger Traffic
export const postAirPassengerTraffic = (data, config) =>
  post(url.ADD_AIR_PASSENGER_TRAFFIC, data, config);

// Update Air Passenger Traffic
export const putAirPassengerTraffic = (data, id, config) =>
  put(url.UPDATE_AIR_PASSENGER_TRAFFIC(id), data, config);

// Delete Air Passenger Traffic
export const deleteAirPassengerTraffic = (id, config) =>
  del(url.DELETE_AIR_PASSENGER_TRAFFIC(id), config);

// Get Users
export const getUsers = (config) => get(url.GET_USERS, config);

// Add User
export const postUser = (data, config) => post(url.ADD_USER, data, config);

// Update User
export const putUser = (data, id, config) =>
  put(url.PUT_USER(id), data, config);

// Delete User
export const deleteUser = (id, config) => del(url.DELETE_USER(id), config);

// Update Profile
export const putUpdateProfile = (data, id, config) =>
  put(url.PUT_UPDATE_PROFILE(id), data, config);
