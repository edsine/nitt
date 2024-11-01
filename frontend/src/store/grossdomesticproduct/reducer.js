import {
  GET_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  GET_GROSS_DOMESTIC_PRODUCT_FAIL,
  ADD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  ADD_GROSS_DOMESTIC_PRODUCT_FAIL,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_FAIL,
  DELETE_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  EDIT_GROSS_DOMESTIC_PRODUCT_FAIL,
  EDIT_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  DELETE_GROSS_DOMESTIC_PRODUCT_FAIL,
  CLEAR_MESSAGE,
} from "./actionTypes";

const INIT_STATE = {
  grossDomesticProduct: [],
  error: null,
  success: null,
};

const grossDomesticProduct = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_GROSS_DOMESTIC_PRODUCT_SUCCESS:
      return {
        ...state,
        grossDomesticProduct: action.payload,
        error: null,
      };

    case GET_GROSS_DOMESTIC_PRODUCT_FAIL:
      return {
        ...state,
        error: { ...state.error, getError: action.payload },
        success: null,
      };
    case ADD_GROSS_DOMESTIC_PRODUCT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, addSuccess: action.payload.message },
        error: null,
      };

    case ADD_GROSS_DOMESTIC_PRODUCT_FAIL:
      return {
        ...state,
        error: { ...state.error, addError: action.payload },
        success: null,
      };
    case BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_SUCCESS:
      return {
        ...state,
        success: {
          ...state.success,
          bulkUploadSuccess: action.payload,
        },
        error: null,
      };

    case BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_FAIL:
      return {
        ...state,
        error: { ...state.error, bulkUploadError: action.payload },
        success: null,
      };
    case EDIT_GROSS_DOMESTIC_PRODUCT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, editSuccess: action.payload.message },
        error: null,
      };

    case EDIT_GROSS_DOMESTIC_PRODUCT_FAIL:
      return {
        ...state,
        error: { ...state.error, editError: action.payload },
        success: null,
      };
    case DELETE_GROSS_DOMESTIC_PRODUCT_SUCCESS:
      return {
        ...state,
        success: { ...state.success, deleteSuccess: action.payload },
        error: null,
      };

    case DELETE_GROSS_DOMESTIC_PRODUCT_FAIL:
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

export default grossDomesticProduct;
