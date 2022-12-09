import {
  GET_AIR_TRANSPORT_DATA_SUCCESS,
  GET_AIR_TRANSPORT_DATA_FAIL,
  ADD_AIR_TRANSPORT_DATA_SUCCESS,
  ADD_AIR_TRANSPORT_DATA_FAIL,
  DELETE_AIR_TRANSPORT_DATA_SUCCESS,
  EDIT_AIR_TRANSPORT_DATA_FAIL,
  EDIT_AIR_TRANSPORT_DATA_SUCCESS,
  DELETE_AIR_TRANSPORT_DATA_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  airTransportData: [],
  error: null,
  success: null,
};

const airTransportData = (state = INIT_STATE, action) => {
  switch (action.type) {
    //PASSENGER
    case GET_AIR_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        airTransportData: action.payload,
        error: null,
      };

    case GET_AIR_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_AIR_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_AIR_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_AIR_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_AIR_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_AIR_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_AIR_TRANSPORT_DATA_FAIL:
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

export default airTransportData;
