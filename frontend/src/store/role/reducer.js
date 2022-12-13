import {
  GET_ROLES_SUCCESS,
  GET_ROLES_FAIL,
  ADD_ROLE_SUCCESS,
  ADD_ROLE_FAIL,
  DELETE_ROLE_SUCCESS,
  EDIT_ROLE_FAIL,
  EDIT_ROLE_SUCCESS,
  DELETE_ROLE_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  roles: [],
  error: null,
  success: null,
};

const roles = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_ROLES_SUCCESS:
      return {
        ...state,
        roles: action.payload,
        error: null,
      };

    case GET_ROLES_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_ROLE_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_ROLE_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_ROLE_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_ROLE_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_ROLE_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_ROLE_FAIL:
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

export default roles;
