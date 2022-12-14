import {
  GET_ROLES,
  GET_ROLES_FAIL,
  GET_ROLES_SUCCESS,
  ADD_ROLE,
  ADD_ROLE_FAIL,
  ADD_ROLE_SUCCESS,
  EDIT_ROLE,
  EDIT_ROLE_FAIL,
  EDIT_ROLE_SUCCESS,
  DELETE_ROLE,
  DELETE_ROLE_FAIL,
  DELETE_ROLE_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

export const getRoles = () => ({
  type: GET_ROLES,
});

export const getRolesSuccess = (roles) => ({
  type: GET_ROLES_SUCCESS,
  payload: roles,
});

export const getRolesFail = (error) => ({
  type: GET_ROLES_FAIL,
  payload: error,
});

export const addRole = (role) => ({
  type: ADD_ROLE,
  payload: role,
});

export const addRoleSuccess = (
  role,
  message
) => ({
  type: ADD_ROLE_SUCCESS,
  payload: { role, message },
});

export const addRoleFail = (error) => ({
  type: ADD_ROLE_FAIL,
  payload: error,
});

export const editRole = (role, id) => ({
  type: EDIT_ROLE,
  payload: { role, id },
});

export const editRoleSuccess = (
  role,
  message
) => ({
  type: EDIT_ROLE_SUCCESS,
  payload: { role, message },
});

export const editRoleFail = (error) => ({
  type: EDIT_ROLE_FAIL,
  payload: error,
});

export const deleteRole = (id) => ({
  type: DELETE_ROLE,
  payload: id,
});

export const deleteRoleSuccess = (message) => ({
  type: DELETE_ROLE_SUCCESS,
  payload: message,
});

export const deleteRoleFail = (error) => ({
  type: DELETE_ROLE_FAIL,
  payload: error,
});


export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
