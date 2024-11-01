import {
  GET_MARITIME_TRANSPORTS,
  GET_MARITIME_TRANSPORTS_FAIL,
  GET_MARITIME_TRANSPORTS_SUCCESS,
  ADD_MARITIME_TRANSPORT,
  ADD_MARITIME_TRANSPORT_FAIL,
  ADD_MARITIME_TRANSPORT_SUCCESS,
  EDIT_MARITIME_TRANSPORT,
  EDIT_MARITIME_TRANSPORT_FAIL,
  EDIT_MARITIME_TRANSPORT_SUCCESS,
  DELETE_MARITIME_TRANSPORT,
  DELETE_MARITIME_TRANSPORT_FAIL,
  DELETE_MARITIME_TRANSPORT_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";


export const getMaritimeTransports = () => ({
  type: GET_MARITIME_TRANSPORTS,
});

export const getMaritimeTransportsSuccess = (maritimeTransports) => ({
  type: GET_MARITIME_TRANSPORTS_SUCCESS,
  payload: maritimeTransports,
});

export const getMaritimeTransportsFail = (error) => ({
  type: GET_MARITIME_TRANSPORTS_FAIL,
  payload: error,
});

export const addMaritimeTransport = (maritimeTransport) => ({
  type: ADD_MARITIME_TRANSPORT,
  payload: maritimeTransport,
});

export const addMaritimeTransportSuccess = (maritimeTransport, message) => ({
  type: ADD_MARITIME_TRANSPORT_SUCCESS,
  payload: { maritimeTransport, message },
});

export const addMaritimeTransportFail = (error) => ({
  type: ADD_MARITIME_TRANSPORT_FAIL,
  payload: error,
});

export const editMaritimeTransport = (maritimeTransport, id) => ({
  type: EDIT_MARITIME_TRANSPORT,
  payload: { maritimeTransport, id },
});

export const editMaritimeTransportSuccess = (maritimeTransport, message) => ({
  type: EDIT_MARITIME_TRANSPORT_SUCCESS,
  payload: { maritimeTransport, message },
});

export const editMaritimeTransportFail = (error) => ({
  type: EDIT_MARITIME_TRANSPORT_FAIL,
  payload: error,
});

export const deleteMaritimeTransport = (id) => ({
  type: DELETE_MARITIME_TRANSPORT,
  payload: id,
});

export const deleteMaritimeTransportSuccess = (message) => ({
  type: DELETE_MARITIME_TRANSPORT_SUCCESS,
  payload: message,
});

export const deleteMaritimeTransportFail = (error) => ({
  type: DELETE_MARITIME_TRANSPORT_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
