import { takeEvery, fork, put, all, call } from "redux-saga/effects";

// Login Redux States
import { EDIT_PROFILE, EDIT_PROFILE_IMAGE } from "./actionTypes";
import { profileSuccess, profileError } from "./actions";

import { putUpdateProfile, putUpdateProfileImage } from "../../../helpers/backend_helper";
import {
  getFileUploadHeaders,
  getHeaders,
} from "../../../helpers/backend-headers/headers";

function* editProfile({ payload: { data, idx } }) {
  try {
    const response = yield call(putUpdateProfile, data, idx, {
      headers: getHeaders(),
    });
    if (response?.success) {
      localStorage.setItem("authUser", JSON.stringify(response.data));
      yield put(profileSuccess(response.message));
    } else {
      yield put(
        profileError(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(profileError(error));
  }
}

function* editProfileImage({ payload: { data, idx } }) {
  try {
    const response = yield call(putUpdateProfileImage, data, idx, {
      headers: getFileUploadHeaders(),
    });
    if (response?.success) {
      localStorage.setItem("authUser", JSON.stringify(response.data));
      yield put(profileSuccess(response.message));
    } else {
      yield put(
        profileError(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(profileError(error));
  }
}

export function* watchProfile() {
  yield takeEvery(EDIT_PROFILE, editProfile);
  yield takeEvery(EDIT_PROFILE_IMAGE, editProfileImage);
}

function* ProfileSaga() {
  yield all([fork(watchProfile)]);
}

export default ProfileSaga;
