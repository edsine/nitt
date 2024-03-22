import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import { GET_HELPERS } from "./actionTypes";
import { getHelpersSuccess, getHelpersFail } from "./actions";

import { getHelpers } from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchHelpers() {
  try {
    const response = yield call(getHelpers, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getHelpersSuccess(data));
    } else {
      yield put(
        getHelpersFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getHelpersFail(error));
  }
}

function* helperSaga() {
  yield takeEvery(GET_HELPERS, fetchHelpers);
}

export default helperSaga;
