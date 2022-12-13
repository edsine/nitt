import {
  GET_VEHICLE_IMPORTATIONS_SUCCESS,
  GET_VEHICLE_IMPORTATIONS_FAIL,
  ADD_VEHICLE_IMPORTATION_SUCCESS,
  ADD_VEHICLE_IMPORTATION_FAIL,
  DELETE_VEHICLE_IMPORTATION_SUCCESS,
  EDIT_VEHICLE_IMPORTATION_FAIL,
  EDIT_VEHICLE_IMPORTATION_SUCCESS,
  DELETE_VEHICLE_IMPORTATION_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  vehicleImportations: [],
  error: null,
  success: null,
};

const vehicleImportation = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_VEHICLE_IMPORTATIONS_SUCCESS:
      return {
        ...state,
        vehicleImportations: action.payload,
        error: null,
      };

    case GET_VEHICLE_IMPORTATIONS_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_VEHICLE_IMPORTATION_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_VEHICLE_IMPORTATION_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case EDIT_VEHICLE_IMPORTATION_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_VEHICLE_IMPORTATION_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_VEHICLE_IMPORTATION_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_VEHICLE_IMPORTATION_FAIL:
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

export default vehicleImportation;
