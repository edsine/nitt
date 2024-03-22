import {
  GET_HELPERS,
  GET_HELPERS_FAIL,
  GET_HELPERS_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

export const getHelpers = () => ({
  type: GET_HELPERS,
});

export const getHelpersSuccess = (helpers) => ({
  type: GET_HELPERS_SUCCESS,
  payload: helpers,
});

export const getHelpersFail = (error) => ({
  type: GET_HELPERS_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
