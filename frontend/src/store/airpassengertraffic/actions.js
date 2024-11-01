import {
  GET_AIR_PASSENGER_TRAFFIC,
  GET_AIR_PASSENGER_TRAFFIC_FAIL,
  GET_AIR_PASSENGER_TRAFFIC_SUCCESS,
  ADD_AIR_PASSENGER_TRAFFIC,
  ADD_AIR_PASSENGER_TRAFFIC_FAIL,
  ADD_AIR_PASSENGER_TRAFFIC_SUCCESS,
  EDIT_AIR_PASSENGER_TRAFFIC,
  EDIT_AIR_PASSENGER_TRAFFIC_FAIL,
  EDIT_AIR_PASSENGER_TRAFFIC_SUCCESS,
  DELETE_AIR_PASSENGER_TRAFFIC,
  DELETE_AIR_PASSENGER_TRAFFIC_FAIL,
  DELETE_AIR_PASSENGER_TRAFFIC_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getAirPassengerTraffic = () => ({
  type: GET_AIR_PASSENGER_TRAFFIC,
});

export const getAirPassengerTrafficSuccess = (airPassengerTraffic) => ({
  type: GET_AIR_PASSENGER_TRAFFIC_SUCCESS,
  payload: airPassengerTraffic,
});

export const getAirPassengerTrafficFail = (error) => ({
  type: GET_AIR_PASSENGER_TRAFFIC_FAIL,
  payload: error,
});

export const addAirPassengerTraffic = (airPassengerTraffic) => ({
  type: ADD_AIR_PASSENGER_TRAFFIC,
  payload: airPassengerTraffic,
});

export const addAirPassengerTrafficSuccess = (
  airPassengerTraffic,
  message
) => ({
  type: ADD_AIR_PASSENGER_TRAFFIC_SUCCESS,
  payload: { airPassengerTraffic, message },
});

export const addAirPassengerTrafficFail = (error) => ({
  type: ADD_AIR_PASSENGER_TRAFFIC_FAIL,
  payload: error,
});

export const editAirPassengerTraffic = (airPassengerTraffic, id) => ({
  type: EDIT_AIR_PASSENGER_TRAFFIC,
  payload: { airPassengerTraffic, id },
});

export const editAirPassengerTrafficSuccess = (
  airPassengerTraffic,
  message
) => ({
  type: EDIT_AIR_PASSENGER_TRAFFIC_SUCCESS,
  payload: { airPassengerTraffic, message },
});

export const editAirPassengerTrafficFail = (error) => ({
  type: EDIT_AIR_PASSENGER_TRAFFIC_FAIL,
  payload: error,
});

export const deleteAirPassengerTraffic = (id) => ({
  type: DELETE_AIR_PASSENGER_TRAFFIC,
  payload: id,
});

export const deleteAirPassengerTrafficSuccess = (message) => ({
  type: DELETE_AIR_PASSENGER_TRAFFIC_SUCCESS,
  payload: message,
});

export const deleteAirPassengerTrafficFail = (error) => ({
  type: DELETE_AIR_PASSENGER_TRAFFIC_FAIL,
  payload: error,
});


export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
