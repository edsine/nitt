import {
  RESET_PASSWORD,
  RESET_PASSWORD_SUCCESS,
  RESET_PASSWORD_ERROR,
} from "./actionTypes";

const initialState = {
  success: null,
  error: null,
};

const resetPassword = (state = initialState, action) => {
  switch (action.type) {
    case RESET_PASSWORD:
      state = {
        ...state,
        error: null,
        success: null,
      };
      break;
    case RESET_PASSWORD_SUCCESS:
      state = {
        ...state,
        success: action.payload,
      };
      break;
    case RESET_PASSWORD_ERROR:
      state = { ...state, error: action.payload };
      break;
    default:
      state = { ...state };
      break;
  }
  return state;
};

export default resetPassword;
