import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_ROLLING_STOCKS,
  ADD_ROLLING_STOCK,
  EDIT_ROLLING_STOCK,
  DELETE_ROLLING_STOCK,
} from "./actionTypes";
import {
  getRollingStocksSuccess,
  getRollingStocksFail,
  addRollingStockSuccess,
  addRollingStockFail,
  editRollingStockSuccess,
  editRollingStockFail,
  deleteRollingStockSuccess,
  deleteRollingStockFail,
  clearMessage,
} from "./actions";

import {
  getRollingStocks,
  postRollingStock,
  putRollingStock,
  deleteRollingStock,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchRollingStocks() {
  try {
    const response = yield call(getRollingStocks, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getRollingStocksSuccess(data));
    } else {
      yield put(
        getRollingStocksFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getRollingStocksFail(error));
  }
}

function* addRollingStock({ payload }) {
  try {
    const response = yield call(postRollingStock, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addRollingStockSuccess(data, message));
    } else {
      yield put(
        addRollingStockFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addRollingStockFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* updateRollingStock({ payload: { rollingStock, id } }) {
  try {
    const response = yield call(putRollingStock, rollingStock, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editRollingStockSuccess(response?.data, response?.message));
    } else {
      yield put(
        editRollingStockFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editRollingStockFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* removeRollingStock({ payload }) {
  try {
    const response = yield call(deleteRollingStock, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteRollingStockSuccess(response?.message));
    } else {
      yield put(
        deleteRollingStockFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteRollingStockFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* rollingStockSaga() {
  yield takeEvery(GET_ROLLING_STOCKS, fetchRollingStocks);
  yield takeEvery(ADD_ROLLING_STOCK, addRollingStock);
  yield takeEvery(EDIT_ROLLING_STOCK, updateRollingStock);
  yield takeEvery(DELETE_ROLLING_STOCK, removeRollingStock);
}

export default rollingStockSaga;
