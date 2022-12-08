import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL
}
  from "./actionTypes"

export const getPassengerRoadTransportData = () => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA,
})

export const getPassengerRoadTransportDataSuccess = passengerRTD => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: passengerRTD,
})

export const getPassengerRoadTransportDataFail = error => ({
  type: GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
})

export const getFreightRoadTransportData = () => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA,
})

export const getFreightRoadTransportDataSuccess = freightRTD => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: freightRTD,
})

export const getFreightRoadTransportDataFail = error => ({
  type: GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
})


export const addPassengerRoadTransportData = passengerRTD => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA,
  payload: passengerRTD,
})

export const addPassengerRoadTransportDataSuccess = (passengerRTD, message) => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: {passengerRTD, message},
})

export const addPassengerRoadTransportDataFail = error => ({
  type: ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
})

export const addFreightRoadTransportData = () => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA,
})

export const addFreightRoadTransportDataSuccess = (freightRTD, message) => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  payload: {freightRTD, message},
})

export const addFreightRoadTransportDataFail = error => ({
  type: ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  payload: error,
})