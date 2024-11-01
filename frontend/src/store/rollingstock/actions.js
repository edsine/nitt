import {
  GET_ROLLING_STOCKS,
  GET_ROLLING_STOCKS_FAIL,
  GET_ROLLING_STOCKS_SUCCESS,
  ADD_ROLLING_STOCK,
  ADD_ROLLING_STOCK_FAIL,
  ADD_ROLLING_STOCK_SUCCESS,
  EDIT_ROLLING_STOCK,
  EDIT_ROLLING_STOCK_FAIL,
  EDIT_ROLLING_STOCK_SUCCESS,
  DELETE_ROLLING_STOCK,
  DELETE_ROLLING_STOCK_FAIL,
  DELETE_ROLLING_STOCK_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getRollingStocks = () => ({
  type: GET_ROLLING_STOCKS,
});

export const getRollingStocksSuccess = (rollingStocks) => ({
  type: GET_ROLLING_STOCKS_SUCCESS,
  payload: rollingStocks,
});

export const getRollingStocksFail = (error) => ({
  type: GET_ROLLING_STOCKS_FAIL,
  payload: error,
});

export const addRollingStock = (rollingStock) => ({
  type: ADD_ROLLING_STOCK,
  payload: rollingStock,
});

export const addRollingStockSuccess = (rollingStock, message) => ({
  type: ADD_ROLLING_STOCK_SUCCESS,
  payload: { rollingStock, message },
});

export const addRollingStockFail = (error) => ({
  type: ADD_ROLLING_STOCK_FAIL,
  payload: error,
});

export const editRollingStock = (rollingStock, id) => ({
  type: EDIT_ROLLING_STOCK,
  payload: { rollingStock, id },
});

export const editRollingStockSuccess = (rollingStock, message) => ({
  type: EDIT_ROLLING_STOCK_SUCCESS,
  payload: { rollingStock, message },
});

export const editRollingStockFail = (error) => ({
  type: EDIT_ROLLING_STOCK_FAIL,
  payload: error,
});

export const deleteRollingStock = (id) => ({
  type: DELETE_ROLLING_STOCK,
  payload: id,
});

export const deleteRollingStockSuccess = (message) => ({
  type: DELETE_ROLLING_STOCK_SUCCESS,
  payload: message,
});

export const deleteRollingStockFail = (error) => ({
  type: DELETE_ROLLING_STOCK_FAIL,
  payload: error,
});

export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
