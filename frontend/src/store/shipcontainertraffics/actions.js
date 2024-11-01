import {
  GET_SHIP_CONTAINER_TRAFFICS,
  GET_SHIP_CONTAINER_TRAFFICS_FAIL,
  GET_SHIP_CONTAINER_TRAFFICS_SUCCESS,
  ADD_SHIP_CONTAINER_TRAFFIC,
  ADD_SHIP_CONTAINER_TRAFFIC_FAIL,
  ADD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_FAIL,
  EDIT_SHIP_CONTAINER_TRAFFIC,
  EDIT_SHIP_CONTAINER_TRAFFIC_FAIL,
  EDIT_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  DELETE_SHIP_CONTAINER_TRAFFIC,
  DELETE_SHIP_CONTAINER_TRAFFIC_FAIL,
  DELETE_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getShipContainerTraffics = () => ({
  type: GET_SHIP_CONTAINER_TRAFFICS,
});

export const getShipContainerTrafficsSuccess = (shipContainerTraffics) => ({
  type: GET_SHIP_CONTAINER_TRAFFICS_SUCCESS,
  payload: shipContainerTraffics,
});

export const getShipContainerTrafficsFail = (error) => ({
  type: GET_SHIP_CONTAINER_TRAFFICS_FAIL,
  payload: error,
});

export const addShipContainerTraffic = (shipContainerTraffic) => ({
  type: ADD_SHIP_CONTAINER_TRAFFIC,
  payload: shipContainerTraffic,
});

export const addShipContainerTrafficSuccess = (shipContainerTraffic, message) => ({
  type: ADD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  payload: { shipContainerTraffic, message },
});

export const addShipContainerTrafficFail = (error) => ({
  type: ADD_SHIP_CONTAINER_TRAFFIC_FAIL,
  payload: error,
});

export const bulkUploadShipContainerTraffic = (data) => ({
  type: BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC,
  payload: data,
});

export const bulkUploadShipContainerTrafficSuccess = (message) => ({
  type: BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  payload: message,
});

export const bulkUploadShipContainerTrafficFail = (error) => ({
  type: BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_FAIL,
  payload: error,
});

export const editShipContainerTraffic = (shipContainerTraffic, id) => ({
  type: EDIT_SHIP_CONTAINER_TRAFFIC,
  payload: { shipContainerTraffic, id },
});

export const editShipContainerTrafficSuccess = (shipContainerTraffic, message) => ({
  type: EDIT_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  payload: { shipContainerTraffic, message },
});

export const editShipContainerTrafficFail = (error) => ({
  type: EDIT_SHIP_CONTAINER_TRAFFIC_FAIL,
  payload: error,
});

export const deleteShipContainerTraffic = (id) => ({
  type: DELETE_SHIP_CONTAINER_TRAFFIC,
  payload: id,
});

export const deleteShipContainerTrafficSuccess = (message) => ({
  type: DELETE_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  payload: message,
});

export const deleteShipContainerTrafficFail = (error) => ({
  type: DELETE_SHIP_CONTAINER_TRAFFIC_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
