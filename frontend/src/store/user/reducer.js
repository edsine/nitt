import {
  GET_USERS_SUCCESS,
  GET_USERS_FAIL,
  ADD_USER_SUCCESS,
  ADD_USER_FAIL,
  DELETE_USER_SUCCESS,
  EDIT_USER_FAIL,
  EDIT_USER_SUCCESS,
  DELETE_USER_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  users: [],
  error: null,
  success: null,
};

const users = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_USERS_SUCCESS:
      return {
        ...state,
        users: action.payload,
        error: null,
      };

    case GET_USERS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_USER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_USER_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_USER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_USER_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_USER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_USER_FAIL:
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

export default users;
