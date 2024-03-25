import {
  GET_RAILWAYS_PASSENGERS,
  GET_RAILWAYS_PASSENGERS_FAIL,
  GET_RAILWAYS_PASSENGERS_SUCCESS,
  ADD_RAILWAYS_PASSENGER,
  ADD_RAILWAYS_PASSENGER_FAIL,
  ADD_RAILWAYS_PASSENGER_SUCCESS,
  BULK_UPLOAD_RAILWAYS_PASSENGER,
  BULK_UPLOAD_RAILWAYS_PASSENGER_SUCCESS,
  BULK_UPLOAD_RAILWAYS_PASSENGER_FAIL,
  EDIT_RAILWAYS_PASSENGER,
  EDIT_RAILWAYS_PASSENGER_FAIL,
  EDIT_RAILWAYS_PASSENGER_SUCCESS,
  DELETE_RAILWAYS_PASSENGER,
  DELETE_RAILWAYS_PASSENGER_FAIL,
  DELETE_RAILWAYS_PASSENGER_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getRailwaysPassengers = () => ({
  type: GET_RAILWAYS_PASSENGERS,
});

export const getRailwaysPassengersSuccess = (railwayPassengers) => ({
  type: GET_RAILWAYS_PASSENGERS_SUCCESS,
  payload: railwayPassengers,
});

export const getRailwaysPassengersFail = (error) => ({
  type: GET_RAILWAYS_PASSENGERS_FAIL,
  payload: error,
});

export const addRailwaysPassenger = (railwayPassenger) => ({
  type: ADD_RAILWAYS_PASSENGER,
  payload: railwayPassenger,
});

export const addRailwaysPassengerSuccess = (railwayPassenger, message) => ({
  type: ADD_RAILWAYS_PASSENGER_SUCCESS,
  payload: { railwayPassenger, message },
});

export const addRailwaysPassengerFail = (error) => ({
  type: ADD_RAILWAYS_PASSENGER_FAIL,
  payload: error,
});

export const bulkUploadRailwaysPassenger = (data) => ({
  type: BULK_UPLOAD_RAILWAYS_PASSENGER,
  payload: data,
});

export const bulkUploadRailwaysPassengerSuccess = (message) => ({
  type: BULK_UPLOAD_RAILWAYS_PASSENGER_SUCCESS,
  payload: message,
});

export const bulkUploadRailwaysPassengerFail = (error) => ({
  type: BULK_UPLOAD_RAILWAYS_PASSENGER_FAIL,
  payload: error,
});

export const editRailwaysPassenger = (railwayPassenger, id) => ({
  type: EDIT_RAILWAYS_PASSENGER,
  payload: { railwayPassenger, id },
});

export const editRailwaysPassengerSuccess = (railwayPassenger, message) => ({
  type: EDIT_RAILWAYS_PASSENGER_SUCCESS,
  payload: { railwayPassenger, message },
});

export const editRailwaysPassengerFail = (error) => ({
  type: EDIT_RAILWAYS_PASSENGER_FAIL,
  payload: error,
});

export const deleteRailwaysPassenger = (id) => ({
  type: DELETE_RAILWAYS_PASSENGER,
  payload: id,
});

export const deleteRailwaysPassengerSuccess = (message) => ({
  type: DELETE_RAILWAYS_PASSENGER_SUCCESS,
  payload: message,
});

export const deleteRailwaysPassengerFail = (error) => ({
  type: DELETE_RAILWAYS_PASSENGER_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
