import {
  GET_PERMISSIONS_SUCCESS,
  GET_PERMISSIONS_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  permissions: [],
  error: null,
  success: null,
};

const permissions = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_PERMISSIONS_SUCCESS:
      return {
        ...state,
        permissions: action.payload,
        error: null,
      };

    case GET_PERMISSIONS_FAIL:
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

export default permissions;
