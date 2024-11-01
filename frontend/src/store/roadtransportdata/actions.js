import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  CLEAR_MESSAGE
} from "./actionTypes";

//PASSENGER
export const getPassengerRoadTransportData = () => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA,
});

export const getPassengerRoadTransportDataSuccess = (passengerRTD) => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: passengerRTD,
});

export const getPassengerRoadTransportDataFail = (error) => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const addPassengerRoadTransportData = (passengerRTD) => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA,
  payload: passengerRTD,
});

export const addPassengerRoadTransportDataSuccess = (
  passengerRTD,
  message
) => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: { passengerRTD, message },
});

export const addPassengerRoadTransportDataFail = (error) => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const editPassengerRoadTransportData = (passengerRTD, id) => ({
  type: EDIT_PASSENGER_ROAD_TRANSPORT_DATA,
  payload: { passengerRTD, id },
});

export const editPassengerRoadTransportDataSuccess = (
  passengerRTD,
  message
) => ({
  type: EDIT_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: { passengerRTD, message },
});

export const editPassengerRoadTransportDataFail = (error) => ({
  type: EDIT_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const deletePassengerRoadTransportData = (id) => ({
  type: DELETE_PASSENGER_ROAD_TRANSPORT_DATA,
  payload: id,
});

export const deletePassengerRoadTransportDataSuccess = (message) => ({
  type: DELETE_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: message,
});

export const deletePassengerRoadTransportDataFail = (error) => ({
  type: DELETE_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

//FREIGHT
export const getFreightRoadTransportData = () => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA,
});

export const getFreightRoadTransportDataSuccess = (freightRTD) => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: freightRTD,
});

export const getFreightRoadTransportDataFail = (error) => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const addFreightRoadTransportData = (freightRTD) => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA,
  payload: freightRTD,
});

export const addFreightRoadTransportDataSuccess = (freightRTD, message) => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: { freightRTD, message },
});

export const addFreightRoadTransportDataFail = (error) => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const editFreightRoadTransportData = (freightRTD, id) => ({
  type: EDIT_FREIGHT_ROAD_TRANSPORT_DATA,
  payload: { freightRTD, id },
});

export const editFreightRoadTransportDataSuccess = (freightRTD, message) => ({
  type: EDIT_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: { freightRTD, message },
});

export const editFreightRoadTransportDataFail = (error) => ({
  type: EDIT_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const deleteFreightRoadTransportData = (id) => ({
  type: DELETE_FREIGHT_ROAD_TRANSPORT_DATA,
  payload: id,
});

export const deleteFreightRoadTransportDataSuccess = (message) => ({
  type: DELETE_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: message,
});

export const deleteFreightRoadTransportDataFail = (error) => ({
  type: DELETE_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE
})