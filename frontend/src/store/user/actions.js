import {
  GET_USERS,
  GET_USERS_FAIL,
  GET_USERS_SUCCESS,
  ADD_USER,
  ADD_USER_FAIL,
  ADD_USER_SUCCESS,
  EDIT_USER,
  EDIT_USER_FAIL,
  EDIT_USER_SUCCESS,
  CHANGE_PASSWORD,
  CHANGE_PASSWORD_SUCCESS,
  CHANGE_PASSWORD_FAIL,
  DELETE_USER,
  DELETE_USER_FAIL,
  DELETE_USER_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

export const getUsers = () => ({
  type: GET_USERS,
});

export const getUsersSuccess = (users) => ({
  type: GET_USERS_SUCCESS,
  payload: users,
});

export const getUsersFail = (error) => ({
  type: GET_USERS_FAIL,
  payload: error,
});

export const addUser = (user) => ({
  type: ADD_USER,
  payload: user,
});

export const addUserSuccess = (user, message) => ({
  type: ADD_USER_SUCCESS,
  payload: { user, message },
});

export const addUserFail = (error) => ({
  type: ADD_USER_FAIL,
  payload: error,
});

export const editUser = (user, id) => ({
  type: EDIT_USER,
  payload: { user, id },
});

export const editUserSuccess = (user, message) => ({
  type: EDIT_USER_SUCCESS,
  payload: { user, message },
});

export const editUserFail = (error) => ({
  type: EDIT_USER_FAIL,
  payload: error,
});

export const changePassword = (values, id) => ({
  type: CHANGE_PASSWORD,
  payload: { values, id },
});

export const changePasswordSuccess = (user, message) => ({
  type: CHANGE_PASSWORD_SUCCESS,
  payload: { user, message },
});

export const changePasswordFail = (error) => ({
  type: CHANGE_PASSWORD_FAIL,
  payload: error,
});

export const deleteUser = (id) => ({
  type: DELETE_USER,
  payload: id,
});

export const deleteUserSuccess = (message) => ({
  type: DELETE_USER_SUCCESS,
  payload: message,
});

export const deleteUserFail = (error) => ({
  type: DELETE_USER_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
