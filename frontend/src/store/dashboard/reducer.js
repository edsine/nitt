import {
  GET_DASHBOARD_DATA_SUCCESS,
  GET_DASHBOARD_DATA_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  data: [],
  error: null,
  success: null,
};

const dashboardData = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_DASHBOARD_DATA_SUCCESS:
      return {
        ...state,
        data: action.payload,
        error: null,
      };

    case GET_DASHBOARD_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
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

export default dashboardData;
