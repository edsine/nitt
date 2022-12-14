import {
  GET_RAILWAYS_PASSENGERS_SUCCESS,
  GET_RAILWAYS_PASSENGERS_FAIL,
  ADD_RAILWAYS_PASSENGER_SUCCESS,
  ADD_RAILWAYS_PASSENGER_FAIL,
  DELETE_RAILWAYS_PASSENGER_SUCCESS,
  EDIT_RAILWAYS_PASSENGER_FAIL,
  EDIT_RAILWAYS_PASSENGER_SUCCESS,
  DELETE_RAILWAYS_PASSENGER_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  railwaysPassengers: [],
  error: null,
  success: null,
};

const railwaysPassengers = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_RAILWAYS_PASSENGERS_SUCCESS:
      return {
        ...state,
        railwaysPassengers: action.payload,
        error: null,
      };

    case GET_RAILWAYS_PASSENGERS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_RAILWAYS_PASSENGER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_RAILWAYS_PASSENGER_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_RAILWAYS_PASSENGER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_RAILWAYS_PASSENGER_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_RAILWAYS_PASSENGER_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_RAILWAYS_PASSENGER_FAIL:
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

export default railwaysPassengers;
