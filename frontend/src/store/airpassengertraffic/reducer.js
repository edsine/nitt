import {
  GET_AIR_PASSENGER_TRAFFIC_SUCCESS,
  GET_AIR_PASSENGER_TRAFFIC_FAIL,
  ADD_AIR_PASSENGER_TRAFFIC_SUCCESS,
  ADD_AIR_PASSENGER_TRAFFIC_FAIL,
  DELETE_AIR_PASSENGER_TRAFFIC_SUCCESS,
  EDIT_AIR_PASSENGER_TRAFFIC_FAIL,
  EDIT_AIR_PASSENGER_TRAFFIC_SUCCESS,
  DELETE_AIR_PASSENGER_TRAFFIC_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  airPassengerTraffic: [],
  error: null,
  success: null,
};

const airPassengerTraffic = (state = INIT_STATE, action) => {
  switch (action.type) {
    //PASSENGER
    case GET_AIR_PASSENGER_TRAFFIC_SUCCESS:
      return {
        ...state,
        airPassengerTraffic: action.payload,
        error: null,
      };

    case GET_AIR_PASSENGER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_AIR_PASSENGER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_AIR_PASSENGER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_AIR_PASSENGER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_AIR_PASSENGER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_AIR_PASSENGER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_AIR_PASSENGER_TRAFFIC_FAIL:
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

export default airPassengerTraffic;
