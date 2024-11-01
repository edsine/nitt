import {
  GET_TRAINS_PUNCTUALITIES,
  GET_TRAINS_PUNCTUALITIES_FAIL,
  GET_TRAINS_PUNCTUALITIES_SUCCESS,
  ADD_TRAINS_PUNCTUALITY,
  ADD_TRAINS_PUNCTUALITY_FAIL,
  ADD_TRAINS_PUNCTUALITY_SUCCESS,
  EDIT_TRAINS_PUNCTUALITY,
  EDIT_TRAINS_PUNCTUALITY_FAIL,
  EDIT_TRAINS_PUNCTUALITY_SUCCESS,
  DELETE_TRAINS_PUNCTUALITY,
  DELETE_TRAINS_PUNCTUALITY_FAIL,
  DELETE_TRAINS_PUNCTUALITY_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getTrainsPunctualities = () => ({
  type: GET_TRAINS_PUNCTUALITIES,
});

export const getTrainsPunctualitiesSuccess = (trainsPunctualities) => ({
  type: GET_TRAINS_PUNCTUALITIES_SUCCESS,
  payload: trainsPunctualities,
});

export const getTrainsPunctualitiesFail = (error) => ({
  type: GET_TRAINS_PUNCTUALITIES_FAIL,
  payload: error,
});

export const addTrainsPunctuality = (trainsPunctuality) => ({
  type: ADD_TRAINS_PUNCTUALITY,
  payload: trainsPunctuality,
});

export const addTrainsPunctualitySuccess = (trainsPunctuality, message) => ({
  type: ADD_TRAINS_PUNCTUALITY_SUCCESS,
  payload: { trainsPunctuality, message },
});

export const addTrainsPunctualityFail = (error) => ({
  type: ADD_TRAINS_PUNCTUALITY_FAIL,
  payload: error,
});

export const editTrainsPunctuality = (trainsPunctuality, id) => ({
  type: EDIT_TRAINS_PUNCTUALITY,
  payload: { trainsPunctuality, id },
});

export const editTrainsPunctualitySuccess = (trainsPunctuality, message) => ({
  type: EDIT_TRAINS_PUNCTUALITY_SUCCESS,
  payload: { trainsPunctuality, message },
});

export const editTrainsPunctualityFail = (error) => ({
  type: EDIT_TRAINS_PUNCTUALITY_FAIL,
  payload: error,
});

export const deleteTrainsPunctuality = (id) => ({
  type: DELETE_TRAINS_PUNCTUALITY,
  payload: id,
});

export const deleteTrainsPunctualitySuccess = (message) => ({
  type: DELETE_TRAINS_PUNCTUALITY_SUCCESS,
  payload: message,
});

export const deleteTrainsPunctualityFail = (error) => ({
  type: DELETE_TRAINS_PUNCTUALITY_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
