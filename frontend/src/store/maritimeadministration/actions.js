import {
  GET_MARITIME_ADMINISTRATIONS,
  GET_MARITIME_ADMINISTRATIONS_FAIL,
  GET_MARITIME_ADMINISTRATIONS_SUCCESS,
  ADD_MARITIME_ADMINISTRATION,
  ADD_MARITIME_ADMINISTRATION_FAIL,
  ADD_MARITIME_ADMINISTRATION_SUCCESS,
  EDIT_MARITIME_ADMINISTRATION,
  EDIT_MARITIME_ADMINISTRATION_FAIL,
  EDIT_MARITIME_ADMINISTRATION_SUCCESS,
  DELETE_MARITIME_ADMINISTRATION,
  DELETE_MARITIME_ADMINISTRATION_FAIL,
  DELETE_MARITIME_ADMINISTRATION_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";


export const getMaritimeAdministrations = () => ({
  type: GET_MARITIME_ADMINISTRATIONS,
});

export const getMaritimeAdministrationsSuccess = (maritimeAdministrations) => ({
  type: GET_MARITIME_ADMINISTRATIONS_SUCCESS,
  payload: maritimeAdministrations,
});

export const getMaritimeAdministrationsFail = (error) => ({
  type: GET_MARITIME_ADMINISTRATIONS_FAIL,
  payload: error,
});

export const addMaritimeAdministration = (maritimeAdministration) => ({
  type: ADD_MARITIME_ADMINISTRATION,
  payload: maritimeAdministration,
});

export const addMaritimeAdministrationSuccess = (maritimeAdministration, message) => ({
  type: ADD_MARITIME_ADMINISTRATION_SUCCESS,
  payload: { maritimeAdministration, message },
});

export const addMaritimeAdministrationFail = (error) => ({
  type: ADD_MARITIME_ADMINISTRATION_FAIL,
  payload: error,
});

export const editMaritimeAdministration = (maritimeAdministration, id) => ({
  type: EDIT_MARITIME_ADMINISTRATION,
  payload: { maritimeAdministration, id },
});

export const editMaritimeAdministrationSuccess = (maritimeAdministration, message) => ({
  type: EDIT_MARITIME_ADMINISTRATION_SUCCESS,
  payload: { maritimeAdministration, message },
});

export const editMaritimeAdministrationFail = (error) => ({
  type: EDIT_MARITIME_ADMINISTRATION_FAIL,
  payload: error,
});

export const deleteMaritimeAdministration = (id) => ({
  type: DELETE_MARITIME_ADMINISTRATION,
  payload: id,
});

export const deleteMaritimeAdministrationSuccess = (message) => ({
  type: DELETE_MARITIME_ADMINISTRATION_SUCCESS,
  payload: message,
});

export const deleteMaritimeAdministrationFail = (error) => ({
  type: DELETE_MARITIME_ADMINISTRATION_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
