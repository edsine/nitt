import {
  GET_MARITIME_TRANSPORTS_SUCCESS,
  GET_MARITIME_TRANSPORTS_FAIL,
  ADD_MARITIME_TRANSPORT_SUCCESS,
  ADD_MARITIME_TRANSPORT_FAIL,
  DELETE_MARITIME_TRANSPORT_SUCCESS,
  EDIT_MARITIME_TRANSPORT_FAIL,
  EDIT_MARITIME_TRANSPORT_SUCCESS,
  DELETE_MARITIME_TRANSPORT_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  maritimeTransports: [],
  error: null,
  success: null,
};

const maritimeTransports = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_MARITIME_TRANSPORTS_SUCCESS:
      return {
        ...state,
        maritimeTransports: action.payload,
        error: null,
      };

    case GET_MARITIME_TRANSPORTS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_MARITIME_TRANSPORT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_MARITIME_TRANSPORT_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_MARITIME_TRANSPORT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_MARITIME_TRANSPORT_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_MARITIME_TRANSPORT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_MARITIME_TRANSPORT_FAIL:
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

export default maritimeTransports;
