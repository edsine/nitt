import {
  GET_GROSS_DOMESTIC_PRODUCT,
  GET_GROSS_DOMESTIC_PRODUCT_FAIL,
  GET_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  ADD_GROSS_DOMESTIC_PRODUCT,
  ADD_GROSS_DOMESTIC_PRODUCT_FAIL,
  ADD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_FAIL,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  EDIT_GROSS_DOMESTIC_PRODUCT,
  EDIT_GROSS_DOMESTIC_PRODUCT_FAIL,
  EDIT_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  DELETE_GROSS_DOMESTIC_PRODUCT,
  DELETE_GROSS_DOMESTIC_PRODUCT_FAIL,
  DELETE_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  CLEAR_MESSAGE,
} from "./actionTypes";

//PASSENGER
export const getGrossDomesticProduct = () => ({
  type: GET_GROSS_DOMESTIC_PRODUCT,
});

export const getGrossDomesticProductSuccess = (grossDomesticProduct) => ({
  type: GET_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  payload: grossDomesticProduct,
});

export const getGrossDomesticProductFail = (error) => ({
  type: GET_GROSS_DOMESTIC_PRODUCT_FAIL,
  payload: error,
});

export const addGrossDomesticProduct = (grossDomesticProduct) => ({
  type: ADD_GROSS_DOMESTIC_PRODUCT,
  payload: grossDomesticProduct,
});

export const addGrossDomesticProductSuccess = (
  grossDomesticProduct,
  message
) => ({
  type: ADD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  payload: { grossDomesticProduct, message },
});

export const addGrossDomesticProductFail = (error) => ({
  type: ADD_GROSS_DOMESTIC_PRODUCT_FAIL,
  payload: error,
});

export const bulkUploadGrossDomesticProduct = (data) => ({
  type: BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT,
  payload: data,
});

export const bulkUploadGrossDomesticProductSuccess = (
  message
) => ({
  type: BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  payload: message,
});

export const bulkUploadGrossDomesticProductFail = (error) => ({
  type: BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT_FAIL,
  payload: error,
});

export const editGrossDomesticProduct = (grossDomesticProduct, id) => ({
  type: EDIT_GROSS_DOMESTIC_PRODUCT,
  payload: { grossDomesticProduct, id },
});

export const editGrossDomesticProductSuccess = (
  grossDomesticProduct,
  message
) => ({
  type: EDIT_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  payload: { grossDomesticProduct, message },
});

export const editGrossDomesticProductFail = (error) => ({
  type: EDIT_GROSS_DOMESTIC_PRODUCT_FAIL,
  payload: error,
});

export const deleteGrossDomesticProduct = (id) => ({
  type: DELETE_GROSS_DOMESTIC_PRODUCT,
  payload: id,
});

export const deleteGrossDomesticProductSuccess = (message) => ({
  type: DELETE_GROSS_DOMESTIC_PRODUCT_SUCCESS,
  payload: message,
});

export const deleteGrossDomesticProductFail = (error) => ({
  type: DELETE_GROSS_DOMESTIC_PRODUCT_FAIL,
  payload: error,
});


export const clearMessage = () => ({
  type: CLEAR_MESSAGE,
});
