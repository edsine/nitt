import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import { GET_PERMISSIONS } from "./actionTypes";
import {
  getPermissionsSuccess,
  getPermissionsFail,
  clearMessage,
} from "./actions";

import {
  getPermissions,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchPermissions() {
  try {
    const response = yield call(getPermissions, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getPermissionsSuccess(data));
    } else {
      yield put(
        getPermissionsFail(response?.errors ? Object.values(response?.errors) : response?.message)
      );
    }
  } catch (error) {
    yield put(getPermissionsFail(error));
  }
}


function* permissionSaga() {
  yield takeEvery(GET_PERMISSIONS, fetchPermissions);
}

export default permissionSaga;
