import {
  RESET_PASSWORD,
  RESET_PASSWORD_SUCCESS,
  RESET_PASSWORD_ERROR,
} from "./actionTypes";

export const resetPassword = (user, history) => {
  return {
    type: RESET_PASSWORD,
    payload: { user, history },
  };
};

export const resetPasswordSuccess = (message) => {
  return {
    type: RESET_PASSWORD_SUCCESS,
    payload: message,
  };
};

export const resetPasswordError = (message) => {
  return {
    type: RESET_PASSWORD_ERROR,
    payload: message,
  };
};
