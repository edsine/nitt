import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import { GET_DASHBOARD_DATA } from "./actionTypes";
import {
  getDashboardDataSuccess,
  getDashboardDataFail,
  clearMessage,
} from "./actions";

import { getDashboardData } from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchDashboardData({ payload }) {
  try {
    const response = yield call(getDashboardData, payload, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getDashboardDataSuccess(data));
    } else {
      yield put(
        getDashboardDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getDashboardDataFail(error));
  }
}

function* dashboardDataSaga() {
  yield takeEvery(GET_DASHBOARD_DATA, fetchDashboardData);
}

export default dashboardDataSaga;
