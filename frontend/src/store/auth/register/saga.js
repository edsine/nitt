import { takeEvery, fork, put, all, call } from "redux-saga/effects";

//Account Redux states
import { REGISTER_USER } from "./actionTypes";
import { registerUserSuccessful, registerUserFailed } from "./actions";

//Include Both Helper File with needed methods
import { getFirebaseBackend } from "../../../helpers/firebase_helper";
import {
  postFakeRegister,
  postJwtRegister,
} from "../../../helpers/fakebackend_helper";
import { postRegister } from "../../../helpers/backend_helper";

// initialize relavant method of both Auth
const fireBaseBackend = getFirebaseBackend();

// Is user register successfull then direct plot user in redux.
function* registerUser({ payload: { user, history } }) {
  try {
    if (process.env.REACT_APP_DEFAULTAUTH === "firebase") {
      const response = yield call(
        fireBaseBackend.registerUser,
        user.email,
        user.password
      );
      yield put(registerUserSuccessful(response));
    } else if (process.env.REACT_APP_DEFAULTAUTH === "jwt") {
      const response = yield call(postJwtRegister, "/post-jwt-register", user);
      console.log(response);
      yield put(registerUserSuccessful(response));
    } else if (process.env.REACT_APP_DEFAULTAUTH === "fake") {
      const response = yield call(postFakeRegister, user);
      yield put(registerUserSuccessful(response));
    } else if (process.env.REACT_APP_DEFAULTAUTH === "backend") {
      console.log(user);
      const response = yield call(postRegister, {
        name: user.name,
        email: user.email,
        password: user.password,
        password_confirmation: user.password_confirmation,
      });
      if (response.success) {
        const { token, user, userPermissions } = response.data;
        localStorage.setItem(
          "userPermissions",
          JSON.stringify(userPermissions)
        );
        localStorage.setItem("authUser", JSON.stringify(user));
        localStorage.setItem("userToken", JSON.stringify(token));
        yield put(registerUserSuccessful(user));
        history.push("/dashboard");
      } else {
        yield put(
          registerUserFailed(
            response?.errors
              ? Object.values(response?.errors)
              : response?.message
          )
        );
      }
    }
  } catch (error) {
    yield put(registerUserFailed(error));
  }
}

export function* watchUserRegister() {
  yield takeEvery(REGISTER_USER, registerUser);
}

function* accountSaga() {
  yield all([fork(watchUserRegister)]);
}

export default accountSaga;
