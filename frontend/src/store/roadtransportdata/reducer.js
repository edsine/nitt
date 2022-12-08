import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  passengersRTD: [],
  freightRTD: [],
  error: null,
  success: null,
};

const roadTransportData = (state = INIT_STATE, action) => {
  switch (action.type) {
    //PASSENGER
    case GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        passengersRTD: action.payload,
        error: null,
      };

    case GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, deleteError: action.payload },
        success: null,
      };
    //FREIGHT
    case GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        freightRTD: action.payload,
        error: null,
      };

    case GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_FREIGHT_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_FREIGHT_ROAD_TRANSPORT_DATA_FAIL:
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

export default roadTransportData;
