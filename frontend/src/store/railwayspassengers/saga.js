import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_RAILWAYS_PASSENGERS,
  ADD_RAILWAYS_PASSENGER,
  EDIT_RAILWAYS_PASSENGER,
  DELETE_RAILWAYS_PASSENGER,
} from "./actionTypes";
import {
  getRailwaysPassengersSuccess,
  getRailwaysPassengersFail,
  addRailwaysPassengerSuccess,
  addRailwaysPassengerFail,
  editRailwaysPassengerSuccess,
  editRailwaysPassengerFail,
  deleteRailwaysPassengerSuccess,
  deleteRailwaysPassengerFail,
  clearMessage,
} from "./actions";

import {
  getRailwaysPassengers,
  postRailwaysPassenger,
  putRailwaysPassenger,
  deleteRailwaysPassenger,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchRailwaysPassengers() {
  try {
    const response = yield call(getRailwaysPassengers, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getRailwaysPassengersSuccess(data));
    } else {
      yield put(
        getRailwaysPassengersFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getRailwaysPassengersFail(error));
  }
}

function* addRailwaysPassenger({ payload }) {
  try {
    const response = yield call(postRailwaysPassenger, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addRailwaysPassengerSuccess(data, message));
    } else {
      yield put(
        addRailwaysPassengerFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addRailwaysPassengerFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* updateRailwaysPassenger({ payload: { railwayPassenger, id } }) {
  try {
    const response = yield call(putRailwaysPassenger, railwayPassenger, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(
        editRailwaysPassengerSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editRailwaysPassengerFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editRailwaysPassengerFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* removeRailwaysPassenger({ payload }) {
  try {
    const response = yield call(deleteRailwaysPassenger, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteRailwaysPassengerSuccess(response?.message));
    } else {
      yield put(
        deleteRailwaysPassengerFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteRailwaysPassengerFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* railwaysPassengersSaga() {
  yield takeEvery(GET_RAILWAYS_PASSENGERS, fetchRailwaysPassengers);
  yield takeEvery(ADD_RAILWAYS_PASSENGER, addRailwaysPassenger);
  yield takeEvery(EDIT_RAILWAYS_PASSENGER, updateRailwaysPassenger);
  yield takeEvery(DELETE_RAILWAYS_PASSENGER, removeRailwaysPassenger);
}

export default railwaysPassengersSaga;
