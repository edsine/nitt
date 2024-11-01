import {
  GET_HELPERS_SUCCESS,
  GET_HELPERS_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  helpers: [],
  error: null,
  success: null,
};

const helpers = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_HELPERS_SUCCESS:
      return {
        ...state,
        helpers: action.payload,
        error: null,
      };

    case GET_HELPERS_FAIL:
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

export default helpers;
