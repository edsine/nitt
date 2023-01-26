import {
  GET_TRAINS_PUNCTUALITIES_SUCCESS,
  GET_TRAINS_PUNCTUALITIES_FAIL,
  ADD_TRAINS_PUNCTUALITY_SUCCESS,
  ADD_TRAINS_PUNCTUALITY_FAIL,
  DELETE_TRAINS_PUNCTUALITY_SUCCESS,
  EDIT_TRAINS_PUNCTUALITY_FAIL,
  EDIT_TRAINS_PUNCTUALITY_SUCCESS,
  DELETE_TRAINS_PUNCTUALITY_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  trainsPunctualities: [],
  error: null,
  success: null,
};

const trainsPunctuality = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_TRAINS_PUNCTUALITIES_SUCCESS:
      return {
        ...state,
        trainsPunctualities: action.payload,
        error: null,
      };

    case GET_TRAINS_PUNCTUALITIES_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_TRAINS_PUNCTUALITY_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_TRAINS_PUNCTUALITY_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_TRAINS_PUNCTUALITY_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_TRAINS_PUNCTUALITY_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_TRAINS_PUNCTUALITY_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_TRAINS_PUNCTUALITY_FAIL:
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

export default trainsPunctuality;
