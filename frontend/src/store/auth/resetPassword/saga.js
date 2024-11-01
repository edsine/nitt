import { call, put, takeEvery } from "redux-saga/effects";

// Login Redux States
import { RESET_PASSWORD } from "./actionTypes";
import { resetPasswordError, resetPasswordSuccess } from "./actions";

import { postResetPassword } from "../../../helpers/backend_helper";

function* resetPassword({ payload: { user, history } }) {
  try {
    const response = yield call(postResetPassword, {
      token: user.token,
      password: user.password,
      password_confirmation: user.password_confirmation,
    });
    if (response.success) {
      const { token, user, userPermissions } = response.data;
      localStorage.setItem("userPermissions", JSON.stringify(userPermissions));
      localStorage.setItem("authUser", JSON.stringify(user));
      localStorage.setItem("userToken", JSON.stringify(token));
      yield put(resetPasswordSuccess(user));
      history.push("/dashboard");
    } else {
      yield put(
        resetPasswordError(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(resetPasswordError(error));
  }
}

function* resetPasswordSaga() {
  yield takeEvery(RESET_PASSWORD, resetPassword);
}

export default resetPasswordSaga;
