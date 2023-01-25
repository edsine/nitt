import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_MARITIME_TRANSPORTS,
  ADD_MARITIME_TRANSPORT,
  EDIT_MARITIME_TRANSPORT,
  DELETE_MARITIME_TRANSPORT,
} from "./actionTypes";
import {
  getMaritimeTransportsSuccess,
  getMaritimeTransportsFail,
  addMaritimeTransportSuccess,
  addMaritimeTransportFail,
  editMaritimeTransportSuccess,
  editMaritimeTransportFail,
  deleteMaritimeTransportSuccess,
  deleteMaritimeTransportFail,
  clearMessage,
} from "./actions";

import {
  getMaritimeTransports,
  postMaritimeTransport,
  putMaritimeTransport,
  deleteMaritimeTransport,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchMaritimeTransports() {
  try {
    const response = yield call(getMaritimeTransports, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getMaritimeTransportsSuccess(data));
    } else {
      yield put(
        getMaritimeTransportsFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getMaritimeTransportsFail(error));
  }
}

function* addMaritimeTransport({ payload }) {
  try {
    const response = yield call(postMaritimeTransport, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addMaritimeTransportSuccess(data, message));
    } else {
      yield put(
        addMaritimeTransportFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addMaritimeTransportFail(error));
  }
}

function* updateMaritimeTransport({ payload: { maritimeTransport, id } }) {
  try {
    const response = yield call(putMaritimeTransport, maritimeTransport, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editMaritimeTransportSuccess(response?.data, response?.message));
    } else {
      yield put(
        editMaritimeTransportFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editMaritimeTransportFail(error));
  }
}

function* removeMaritimeTransport({ payload }) {
  try {
    const response = yield call(deleteMaritimeTransport, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteMaritimeTransportSuccess(response?.message));
    } else {
      yield put(
        deleteMaritimeTransportFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteMaritimeTransportFail(error));
  }
}

function* maritimeTransportSaga() {
  yield takeEvery(GET_MARITIME_TRANSPORTS, fetchMaritimeTransports);
  yield takeEvery(ADD_MARITIME_TRANSPORT, addMaritimeTransport);
  yield takeEvery(EDIT_MARITIME_TRANSPORT, updateMaritimeTransport);
  yield takeEvery(DELETE_MARITIME_TRANSPORT, removeMaritimeTransport);
}

export default maritimeTransportSaga;
