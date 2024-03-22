import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_AIR_PASSENGER_TRAFFIC,
  ADD_AIR_PASSENGER_TRAFFIC,
  EDIT_AIR_PASSENGER_TRAFFIC,
  DELETE_AIR_PASSENGER_TRAFFIC,
} from "./actionTypes";
import {
  getAirPassengerTrafficSuccess,
  getAirPassengerTrafficFail,
  addAirPassengerTrafficSuccess,
  addAirPassengerTrafficFail,
  editAirPassengerTrafficSuccess,
  editAirPassengerTrafficFail,
  deleteAirPassengerTrafficSuccess,
  deleteAirPassengerTrafficFail,
  clearMessage,
} from "./actions";

import {
  getAirPassengerTraffic,
  postAirPassengerTraffic,
  putAirPassengerTraffic,
  deleteAirPassengerTraffic,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchAirPassengerTraffic() {
  try {
    const response = yield call(getAirPassengerTraffic, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getAirPassengerTrafficSuccess(data));
    } else {
      yield put(
        getAirPassengerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getAirPassengerTrafficFail(error));
  }
}

function* addAirPassengerTraffic({ payload }) {
  try {
    const response = yield call(postAirPassengerTraffic, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addAirPassengerTrafficSuccess(data, message));
    } else {
      yield put(
        addAirPassengerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addAirPassengerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateAirPassengerTraffic({ payload: { airPassengerTraffic, id } }) {
  try {
    const response = yield call(
      putAirPassengerTraffic,
      airPassengerTraffic,
      id,
      { headers: getHeaders() }
    );
    if (response?.success) {
      yield put(
        editAirPassengerTrafficSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editAirPassengerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editAirPassengerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeAirPassengerTraffic({ payload }) {
  try {
    const response = yield call(deleteAirPassengerTraffic, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteAirPassengerTrafficSuccess(response?.message));
    } else {
      yield put(
        deleteAirPassengerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteAirPassengerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* airPassengerTrafficSaga() {
  yield takeEvery(GET_AIR_PASSENGER_TRAFFIC, fetchAirPassengerTraffic);
  yield takeEvery(ADD_AIR_PASSENGER_TRAFFIC, addAirPassengerTraffic);
  yield takeEvery(EDIT_AIR_PASSENGER_TRAFFIC, updateAirPassengerTraffic);
  yield takeEvery(DELETE_AIR_PASSENGER_TRAFFIC, removeAirPassengerTraffic);
}

export default airPassengerTrafficSaga;
