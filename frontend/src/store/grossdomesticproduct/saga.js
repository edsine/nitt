import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_GROSS_DOMESTIC_PRODUCT,
  ADD_GROSS_DOMESTIC_PRODUCT,
  BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT,
  EDIT_GROSS_DOMESTIC_PRODUCT,
  DELETE_GROSS_DOMESTIC_PRODUCT,
} from "./actionTypes";
import {
  getGrossDomesticProductSuccess,
  getGrossDomesticProductFail,
  addGrossDomesticProductSuccess,
  addGrossDomesticProductFail,
  bulkUploadGrossDomesticProductSuccess,
  bulkUploadGrossDomesticProductFail,
  editGrossDomesticProductSuccess,
  editGrossDomesticProductFail,
  deleteGrossDomesticProductSuccess,
  deleteGrossDomesticProductFail,
  clearMessage,
} from "./actions";

import {
  getGrossDomesticProducts,
  postGrossDomesticProduct,
  postBulkUploadGrossDomesticProduct,
  putGrossDomesticProduct,
  deleteGrossDomesticProduct,
} from "../../helpers/backend_helper";
import {
  getHeaders,
  getFileUploadHeaders,
} from "../../helpers/backend-headers/headers";

function* fetchGrossDomesticProduct() {
  try {
    const response = yield call(getGrossDomesticProducts, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getGrossDomesticProductSuccess(data));
    } else {
      yield put(
        getGrossDomesticProductFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getGrossDomesticProductFail(error));
  }
}

function* addGrossDomesticProduct({ payload }) {
  try {
    const response = yield call(postGrossDomesticProduct, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addGrossDomesticProductSuccess(data, message));
    } else {
      yield put(
        addGrossDomesticProductFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addGrossDomesticProductFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* bulkUploadGrossDomesticProduct({ payload }) {
  try {
    const response = yield call(postBulkUploadGrossDomesticProduct, payload, {
      headers: getFileUploadHeaders(),
    });

    if (response?.success) {
      yield put(bulkUploadGrossDomesticProductSuccess(response.message));
    } else {
      yield put(
        bulkUploadGrossDomesticProductFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(bulkUploadGrossDomesticProductFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateGrossDomesticProduct({
  payload: { grossDomesticProduct, id },
}) {
  try {
    const response = yield call(
      putGrossDomesticProduct,
      grossDomesticProduct,
      id,
      { headers: getHeaders() }
    );
    if (response?.success) {
      yield put(
        editGrossDomesticProductSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editGrossDomesticProductFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editGrossDomesticProductFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeGrossDomesticProduct({ payload }) {
  try {
    const response = yield call(deleteGrossDomesticProduct, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteGrossDomesticProductSuccess(response?.message));
    } else {
      yield put(
        deleteGrossDomesticProductFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteGrossDomesticProductFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* grossDomesticProductSaga() {
  yield takeEvery(GET_GROSS_DOMESTIC_PRODUCT, fetchGrossDomesticProduct);
  yield takeEvery(ADD_GROSS_DOMESTIC_PRODUCT, addGrossDomesticProduct);
  yield takeEvery(
    BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT,
    bulkUploadGrossDomesticProduct
  );
  yield takeEvery(EDIT_GROSS_DOMESTIC_PRODUCT, updateGrossDomesticProduct);
  yield takeEvery(DELETE_GROSS_DOMESTIC_PRODUCT, removeGrossDomesticProduct);
}

export default grossDomesticProductSaga;
