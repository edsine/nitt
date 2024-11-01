import {
  GET_DASHBOARD_DATA,
  GET_DASHBOARD_DATA_FAIL,
  GET_DASHBOARD_DATA_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

export const getDashboardData = (payload) => ({
  type: GET_DASHBOARD_DATA,
  payload: payload,
});

export const getDashboardDataSuccess = (data) => ({
  type: GET_DASHBOARD_DATA_SUCCESS,
  payload: data,
});

export const getDashboardDataFail = (error) => ({
  type: GET_DASHBOARD_DATA_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
