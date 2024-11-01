import {
  GET_VEHICLE_IMPORTATIONS,
  GET_VEHICLE_IMPORTATIONS_FAIL,
  GET_VEHICLE_IMPORTATIONS_SUCCESS,
  ADD_VEHICLE_IMPORTATION,
  ADD_VEHICLE_IMPORTATION_FAIL,
  ADD_VEHICLE_IMPORTATION_SUCCESS,
  EDIT_VEHICLE_IMPORTATION,
  EDIT_VEHICLE_IMPORTATION_FAIL,
  EDIT_VEHICLE_IMPORTATION_SUCCESS,
  DELETE_VEHICLE_IMPORTATION,
  DELETE_VEHICLE_IMPORTATION_FAIL,
  DELETE_VEHICLE_IMPORTATION_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getVehicleImportations = () => ({ 
  type: GET_VEHICLE_IMPORTATIONS,
});

export const getVehicleImportationsSuccess = (vehicleImportations) => ({
  type: GET_VEHICLE_IMPORTATIONS_SUCCESS,
  payload: vehicleImportations,
});

export const getVehicleImportationsFail = (error) => ({
  type: GET_VEHICLE_IMPORTATIONS_FAIL,
  payload: error,
});

export const addVehicleImportation = (vehicleImportation) => ({
  type: ADD_VEHICLE_IMPORTATION,
  payload: vehicleImportation,
});

export const addVehicleImportationSuccess = (vehicleImportation, message) => ({
  type: ADD_VEHICLE_IMPORTATION_SUCCESS,
  payload: { vehicleImportation, message },
});

export const addVehicleImportationFail = (error) => ({
  type: ADD_VEHICLE_IMPORTATION_FAIL,
  payload: error,
});

export const editVehicleImportation = (vehicleImportation, id) => ({
  type: EDIT_VEHICLE_IMPORTATION,
  payload: { vehicleImportation, id },
});

export const editVehicleImportationSuccess = (vehicleImportation, message) => ({
  type: EDIT_VEHICLE_IMPORTATION_SUCCESS,
  payload: { vehicleImportation, message },
});

export const editVehicleImportationFail = (error) => ({
  type: EDIT_VEHICLE_IMPORTATION_FAIL,
  payload: error,
});

export const deleteVehicleImportation = (id) => ({
  type: DELETE_VEHICLE_IMPORTATION,
  payload: id,
});

export const deleteVehicleImportationSuccess = (message) => ({
  type: DELETE_VEHICLE_IMPORTATION_SUCCESS,
  payload: message,
});

export const deleteVehicleImportationFail = (error) => ({
  type: DELETE_VEHICLE_IMPORTATION_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
