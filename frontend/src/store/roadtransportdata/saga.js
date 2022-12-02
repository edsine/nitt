import { call, put, takeEvery } from "redux-saga/effects"

// Crypto Redux States
import { GET_FREIGHT_ROAD_TRANSPORT_DATA, GET_PASSENGER_ROAD_TRANSPORT_DATA } from "./actionTypes"
import {
  getPassengerRoadTransportDataSuccess,
  getPassengerRoadTransportDataFail,
  getFreightRoadTransportDataSuccess,
  getFreightRoadTransportDataFail
}
  from "./actions"

import { getPassengerRoadTransportData, getFreightRoadTransportData } from "../../helpers/backend_helper";
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

function* fetchFreightRoadTransportData() {
  try {
    const response = yield call(getFreightRoadTransportData, { headers: getHeaders() });
    if (response.success) {
      const { data } = response;
      yield put(getFreightRoadTransportDataSuccess(data));
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
  yield takeEvery(GET_FREIGHT_ROAD_TRANSPORT_DATA, fetchFreightRoadTransportData)
}

export default roadTransportDataSaga
