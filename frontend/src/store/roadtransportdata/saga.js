import { call, put, takeEvery } from "redux-saga/effects"

// Crypto Redux States
import {
  GET_FREIGHT_ROAD_TRANSPORT_DATA,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA,
  GET_PASSENGER_ROAD_TRANSPORT_DATA,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA
} from "./actionTypes"
import {
  getPassengerRoadTransportDataSuccess,
  getPassengerRoadTransportDataFail,
  addPassengerRoadTransportDataSuccess,
  addPassengerRoadTransportDataFail,
  getFreightRoadTransportDataSuccess,
  getFreightRoadTransportDataFail,
  addFreightRoadTransportDataSuccess,
  addFreightRoadTransportDataFail
}
  from "./actions"

import { getPassengerRoadTransportData, getFreightRoadTransportData, postPassengerRoadTransportData } from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchPassengerRoadTransportData() {
  try {
    const response = yield call(getPassengerRoadTransportData, { headers: getHeaders() });
    if (response.success) {
      const { data } = response;
      yield put(getPassengerRoadTransportDataSuccess(data));
    }
    else {
      yield put(getPassengerRoadTransportDataFail(response.message));
    }
  } catch (error) {
    yield put(getPassengerRoadTransportDataFail(error))
  }
}

function* addPassengerRoadTransportData({ payload }) {
  console.log(payload);
  try {
    const response = yield call(postPassengerRoadTransportData, payload, { headers: getHeaders() });
    if (response?.success) {
      const { data, message } = response;
      yield put(addPassengerRoadTransportDataSuccess(data, message));
    }
    else {
      yield put(addPassengerRoadTransportDataFail(response?.message));
    }
  } catch (error) {
    yield put(addPassengerRoadTransportDataFail(error))
  }
}

function* fetchFreightRoadTransportData() {
  try {
    const response = yield call(getFreightRoadTransportData, { headers: getHeaders() });
    if (response?.success) {
      const { data, message } = response;
      yield put(getFreightRoadTransportDataSuccess(data, message));
    }
    else {
      yield put(getFreightRoadTransportDataFail(response.message));
    }
  } catch (error) {
    yield put(getFreightRoadTransportDataFail(error))
  }
}

function* roadTransportDataSaga() {
  yield takeEvery(GET_PASSENGER_ROAD_TRANSPORT_DATA, fetchPassengerRoadTransportData)
  yield takeEvery(ADD_PASSENGER_ROAD_TRANSPORT_DATA, addPassengerRoadTransportData)
  yield takeEvery(GET_FREIGHT_ROAD_TRANSPORT_DATA, fetchFreightRoadTransportData)
  yield takeEvery(ADD_FREIGHT_ROAD_TRANSPORT_DATA, fetchFreightRoadTransportData)
}

export default roadTransportDataSaga
