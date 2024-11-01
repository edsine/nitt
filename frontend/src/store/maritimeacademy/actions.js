import {
  GET_MARITIME_ACADEMIES,
  GET_MARITIME_ACADEMIES_FAIL,
  GET_MARITIME_ACADEMIES_SUCCESS,
  ADD_MARITIME_ACADEMY,
  ADD_MARITIME_ACADEMY_FAIL,
  ADD_MARITIME_ACADEMY_SUCCESS,
  EDIT_MARITIME_ACADEMY,
  EDIT_MARITIME_ACADEMY_FAIL,
  EDIT_MARITIME_ACADEMY_SUCCESS,
  DELETE_MARITIME_ACADEMY,
  DELETE_MARITIME_ACADEMY_FAIL,
  DELETE_MARITIME_ACADEMY_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getMaritimeAcademies = () => ({
  type: GET_MARITIME_ACADEMIES,
});

export const getMaritimeAcademiesSuccess = (maritimeAcademies) => ({
  type: GET_MARITIME_ACADEMIES_SUCCESS,
  payload: maritimeAcademies,
});

export const getMaritimeAcademiesFail = (error) => ({
  type: GET_MARITIME_ACADEMIES_FAIL,
  payload: error,
});

export const addMaritimeAcademy = (maritimeAcademy) => ({
  type: ADD_MARITIME_ACADEMY,
  payload: maritimeAcademy,
});

export const addMaritimeAcademySuccess = (maritimeAcademy, message) => ({
  type: ADD_MARITIME_ACADEMY_SUCCESS,
  payload: { maritimeAcademy, message },
});

export const addMaritimeAcademyFail = (error) => ({
  type: ADD_MARITIME_ACADEMY_FAIL,
  payload: error,
});

export const editMaritimeAcademy = (maritimeAcademy, id) => ({
  type: EDIT_MARITIME_ACADEMY,
  payload: { maritimeAcademy, id },
});

export const editMaritimeAcademySuccess = (maritimeAcademy, message) => ({
  type: EDIT_MARITIME_ACADEMY_SUCCESS,
  payload: { maritimeAcademy, message },
});

export const editMaritimeAcademyFail = (error) => ({
  type: EDIT_MARITIME_ACADEMY_FAIL,
  payload: error,
});

export const deleteMaritimeAcademy = (id) => ({
  type: DELETE_MARITIME_ACADEMY,
  payload: id,
});

export const deleteMaritimeAcademySuccess = (message) => ({
  type: DELETE_MARITIME_ACADEMY_SUCCESS,
  payload: message,
});

export const deleteMaritimeAcademyFail = (error) => ({
  type: DELETE_MARITIME_ACADEMY_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
