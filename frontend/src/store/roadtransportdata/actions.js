import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL
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
