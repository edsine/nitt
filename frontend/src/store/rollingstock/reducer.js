import {
  GET_ROLLING_STOCKS_SUCCESS,
  GET_ROLLING_STOCKS_FAIL,
  ADD_ROLLING_STOCK_SUCCESS,
  ADD_ROLLING_STOCK_FAIL,
  DELETE_ROLLING_STOCK_SUCCESS,
  EDIT_ROLLING_STOCK_FAIL,
  EDIT_ROLLING_STOCK_SUCCESS,
  DELETE_ROLLING_STOCK_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  rollingStocks: [],
  error: null,
  success: null,
};

const rollingStocks = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_ROLLING_STOCKS_SUCCESS:
      return {
        ...state,
        rollingStocks: action.payload,
        error: null,
      };

    case GET_ROLLING_STOCKS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_ROLLING_STOCK_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_ROLLING_STOCK_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_ROLLING_STOCK_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_ROLLING_STOCK_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_ROLLING_STOCK_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_ROLLING_STOCK_FAIL:
      return {
        ...state,
        error: { ...state.error, deleteError: action.payload },
        success: null,
      };
    case CLEAR_MESSAGE:
      return {
        ...state,
        success: null,
        error: null,
      };
    default:
      return state;
  }
};

export default rollingStocks;
