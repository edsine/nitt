import {
  GET_PERMISSIONS,
  GET_PERMISSIONS_FAIL,
  GET_PERMISSIONS_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

export const getPermissions = () => ({
  type: GET_PERMISSIONS,
});

export const getPermissionsSuccess = (permissions) => ({
  type: GET_PERMISSIONS_SUCCESS,
  payload: permissions,
});

export const getPermissionsFail = (error) => ({
  type: GET_PERMISSIONS_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
