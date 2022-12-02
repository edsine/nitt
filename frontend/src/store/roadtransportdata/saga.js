import { call, put, takeEvery } from "redux-saga/effects"

// Crypto Redux States
import { GET_PASSENGER_ROAD_TRANSPORT_DATA } from "./actionTypes"
import { getPassengerRoadTransportDataSuccess, getPassengerRoadTransportDataFail } from "./actions"

import { getPassengerRoadTransportData } from "../../helpers/backend_helper";
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

function* roadTransportDataSaga() {
  yield takeEvery(GET_PASSENGER_ROAD_TRANSPORT_DATA, fetchPassengerRoadTransportData)
}

export default roadTransportDataSaga
