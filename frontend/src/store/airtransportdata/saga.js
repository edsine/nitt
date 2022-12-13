import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_AIR_TRANSPORT_DATA,
  ADD_AIR_TRANSPORT_DATA,
  EDIT_AIR_TRANSPORT_DATA,
  DELETE_AIR_TRANSPORT_DATA,
} from "./actionTypes";
import {
  getAirTransportDataSuccess,
  getAirTransportDataFail,
  addAirTransportDataSuccess,
  addAirTransportDataFail,
  editAirTransportDataSuccess,
  editAirTransportDataFail,
  deleteAirTransportDataSuccess,
  deleteAirTransportDataFail,
  clearMessage,
} from "./actions";

import {
  getAirTransportData,
  postAirTransportData,
  putAirTransportData,
  deleteAirTransportData,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchAirTransportData() {
  try {
    const response = yield call(getAirTransportData, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getAirTransportDataSuccess(data));
    } else {
      yield put(
        getAirTransportDataFail(
          response?.message || Object.values(response?.errors)
        )
      );
    }
  } catch (error) {
    yield put(getAirTransportDataFail(error));
  }
}

function* addAirTransportData({ payload }) {
  try {
    const response = yield call(postAirTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addAirTransportDataSuccess(data, message));
    } else {
      yield put(
        addAirTransportDataFail(
          response?.message || Object.values(response?.errors)
        )
      );
    }
  } catch (error) {
    yield put(addAirTransportDataFail(error));
  }
}

function* updateAirTransportData({ payload: { airTransportData, id } }) {
  try {
    const response = yield call(putAirTransportData, airTransportData, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editAirTransportDataSuccess(response?.data, response?.message));
    } else {
      yield put(
        editAirTransportDataFail(
          response?.message || Object.values(response?.errors)
        )
      );
    }
  } catch (error) {
    yield put(editAirTransportDataFail(error));
  }
}

function* removeAirTransportData({ payload }) {
  try {
    const response = yield call(deleteAirTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteAirTransportDataSuccess(response?.message));
    } else {
      yield put(
        deleteAirTransportDataFail(
          response?.message || Object.values(response?.errors)
        )
      );
    }
  } catch (error) {
    yield put(deleteAirTransportDataFail(error));
  }
}

function* airTransportDataSaga() {
  yield takeEvery(GET_AIR_TRANSPORT_DATA, fetchAirTransportData);
  yield takeEvery(ADD_AIR_TRANSPORT_DATA, addAirTransportData);
  yield takeEvery(EDIT_AIR_TRANSPORT_DATA, updateAirTransportData);
  yield takeEvery(DELETE_AIR_TRANSPORT_DATA, removeAirTransportData);
}

export default airTransportDataSaga;
