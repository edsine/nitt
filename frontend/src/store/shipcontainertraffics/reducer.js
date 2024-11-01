import {
  GET_SHIP_CONTAINER_TRAFFICS_SUCCESS,
  GET_SHIP_CONTAINER_TRAFFICS_FAIL,
  ADD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  ADD_SHIP_CONTAINER_TRAFFIC_FAIL,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_FAIL,
  DELETE_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  EDIT_SHIP_CONTAINER_TRAFFIC_FAIL,
  EDIT_SHIP_CONTAINER_TRAFFIC_SUCCESS,
  DELETE_SHIP_CONTAINER_TRAFFIC_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  shipContainerTraffics: [],
  error: null,
  success: null,
};

const shipContainerTraffics = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_SHIP_CONTAINER_TRAFFICS_SUCCESS:
      return {
        ...state,
        shipContainerTraffics: action.payload,
        error: null,
      };

    case GET_SHIP_CONTAINER_TRAFFICS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_SHIP_CONTAINER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_SHIP_CONTAINER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: {
          ...state.success,
          bulkUploadSuccess: action.payload,
        },
        error: null,
      };

    case BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, bulkUploadError: action.payload },
        success: null,
      };
    case EDIT_SHIP_CONTAINER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_SHIP_CONTAINER_TRAFFIC_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_SHIP_CONTAINER_TRAFFIC_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_SHIP_CONTAINER_TRAFFIC_FAIL:
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

export default shipContainerTraffics;
