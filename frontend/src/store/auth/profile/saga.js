import { takeEvery, fork, put, all, call } from "redux-saga/effects";

// Login Redux States
import { EDIT_PROFILE } from "./actionTypes";
import { profileSuccess, profileError } from "./actions";

import { putUpdateProfile } from "../../../helpers/backend_helper";
import {
  getFileUploadHeaders,
  getHeaders,
} from "../../../helpers/backend-headers/headers";

function* editProfile({ payload: { data, idx } }) {
  try {
    const response = yield call(putUpdateProfile, data, idx, {
      headers: getFileUploadHeaders(),
    });
    if (response?.success) {
      localStorage.setItem("authUser", JSON.stringify(response.data));
      yield put(profileSuccess(response.message));
    } else {
      yield put(profileError("An error occured"));
    }
  } catch (error) {
    yield put(profileError(error));
  }
}
export function* watchProfile() {
  yield takeEvery(EDIT_PROFILE, editProfile);
}

function* ProfileSaga() {
  yield all([fork(watchProfile)]);
}

export default ProfileSaga;
