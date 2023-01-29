import {
  GET_AIR_TRANSPORT_DATA,
  GET_AIR_TRANSPORT_DATA_FAIL,
  GET_AIR_TRANSPORT_DATA_SUCCESS,
  ADD_AIR_TRANSPORT_DATA,
  ADD_AIR_TRANSPORT_DATA_FAIL,
  ADD_AIR_TRANSPORT_DATA_SUCCESS,
  EDIT_AIR_TRANSPORT_DATA,
  EDIT_AIR_TRANSPORT_DATA_FAIL,
  EDIT_AIR_TRANSPORT_DATA_SUCCESS,
  DELETE_AIR_TRANSPORT_DATA,
  DELETE_AIR_TRANSPORT_DATA_FAIL,
  DELETE_AIR_TRANSPORT_DATA_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getAirTransportData = () => ({
  type: GET_AIR_TRANSPORT_DATA,
});

export const getAirTransportDataSuccess = (airTransportData) => ({
  type: GET_AIR_TRANSPORT_DATA_SUCCESS,
  payload: airTransportData,
});

export const getAirTransportDataFail = (error) => ({
  type: GET_AIR_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const addAirTransportData = (airTransportData) => ({
  type: ADD_AIR_TRANSPORT_DATA,
  payload: airTransportData,
});

export const addAirTransportDataSuccess = (
  airTransportData,
  message
) => ({
  type: ADD_AIR_TRANSPORT_DATA_SUCCESS,
  payload: { airTransportData, message },
});

export const addAirTransportDataFail = (error) => ({
  type: ADD_AIR_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const editAirTransportData = (airTransportData, id) => ({
  type: EDIT_AIR_TRANSPORT_DATA,
  payload: { airTransportData, id },
});

export const editAirTransportDataSuccess = (
  airTransportData,
  message
) => ({
  type: EDIT_AIR_TRANSPORT_DATA_SUCCESS,
  payload: { airTransportData, message },
});

export const editAirTransportDataFail = (error) => ({
  type: EDIT_AIR_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const deleteAirTransportData = (id) => ({
  type: DELETE_AIR_TRANSPORT_DATA,
  payload: id,
});

export const deleteAirTransportDataSuccess = (message) => ({
  type: DELETE_AIR_TRANSPORT_DATA_SUCCESS,
  payload: message,
});

export const deleteAirTransportDataFail = (error) => ({
  type: DELETE_AIR_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
