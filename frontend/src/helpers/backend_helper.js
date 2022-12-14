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

// Update Profile
export const putUpdateProfileImage = (data, id, config) =>
  put(url.PUT_UPDATE_PROFILE_IMAGE(id), data, config);

// Change Password
export const postChangePassword = (data, id, config) =>
  post(url.POST_CHANGE_PASSWORD(id), data, config);

// Get Roles
export const getRoles = (config) => get(url.GET_ROLES, config);

// Add Role
export const postRole = (data, config) => post(url.ADD_ROLE, data, config);

// Update Role
export const putRole = (data, id, config) =>
  put(url.PUT_ROLE(id), data, config);

// Delete Role
export const deleteRole = (id, config) => del(url.DELETE_ROLE(id), config);

// Get Permissions
export const getPermissions = (config) => get(url.GET_APP_PERMISSIONS, config);

// Get VehicleImportation
export const getVehicleImportations = (config) =>
  get(url.GET_VEHICLE_IMPORTATIONS, config);

// Add VehicleImportation
export const postVehicleImportation = (data, config) =>
  post(url.ADD_VEHICLE_IMPORTATION, data, config);

// Update VehicleImportation
export const putVehicleImportation = (data, id, config) =>
  put(url.PUT_VEHICLE_IMPORTATION(id), data, config);

// Delete VehicleImportation
export const deleteVehicleImportation = (id, config) =>
  del(url.DELETE_VEHICLE_IMPORTATION(id), config);

// Get Railways Passengers
export const getRailwaysPassengers = (config) =>
  get(url.GET_RAILWAYS_PASSENGERS, config);

// Add Railways Passengers
export const postRailwaysPassenger = (data, config) =>
  post(url.ADD_RAILWAYS_PASSENGER, data, config);

// Update Railways Passengers
export const putRailwaysPassenger = (data, id, config) =>
  put(url.PUT_RAILWAYS_PASSENGER(id), data, config);

// Delete Railways Passengers
export const deleteRailwaysPassenger = (id, config) =>
  del(url.DELETE_RAILWAYS_PASSENGER(id), config);

// Get Rolling Stock
export const getRollingStocks = (config) => get(url.GET_ROLLING_STOCKS, config);

// Add Rolling Stock
export const postRollingStock = (data, config) =>
  post(url.ADD_ROLLING_STOCK, data, config);

// Update Rolling Stock
export const putRollingStock = (data, id, config) =>
  put(url.PUT_ROLLING_STOCK(id), data, config);

// Delete Rolling Stock
export const deleteRollingStock = (id, config) =>
  del(url.DELETE_ROLLING_STOCK(id), config);
