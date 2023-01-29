import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_USERS,
  ADD_USER,
  EDIT_USER,
  DELETE_USER,
  CHANGE_PASSWORD,
} from "./actionTypes";
import {
  getUsersSuccess,
  getUsersFail,
  addUserSuccess,
  addUserFail,
  editUserSuccess,
  editUserFail,
  deleteUserSuccess,
  deleteUserFail,
  clearMessage,
  changePasswordSuccess,
  changePasswordFail,
} from "./actions";

import {
  getUsers,
  postUser,
  putUser,
  deleteUser,
  postChangePassword,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchUsers() {
  try {
    const response = yield call(getUsers, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getUsersSuccess(data));
    } else {
      yield put(
        getUsersFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getUsersFail(error));
  }
}

function* addUser({ payload }) {
  try {
    const response = yield call(postUser, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addUserSuccess(data, message));
    } else {
      yield put(
        addUserFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addUserFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* updateUser({ payload: { user, id } }) {
  try {
    const response = yield call(putUser, user, id, { headers: getHeaders() });
    if (response?.success) {
      yield put(editUserSuccess(response?.data, response?.message));
    } else {
      yield put(
        editUserFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editUserFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* updatePassword({ payload: { values, id } }) {
  try {
    const response = yield call(postChangePassword, values, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(changePasswordSuccess(response?.data, response?.message));
    } else {
      yield put(
        changePasswordFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(changePasswordFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* removeUser({ payload }) {
  try {
    const response = yield call(deleteUser, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteUserSuccess(response?.message));
    } else {
      yield put(
        deleteUserFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteUserFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* userSaga() {
  yield takeEvery(GET_USERS, fetchUsers);
  yield takeEvery(ADD_USER, addUser);
  yield takeEvery(EDIT_USER, updateUser);
  yield takeEvery(CHANGE_PASSWORD, updatePassword);
  yield takeEvery(DELETE_USER, removeUser);
}

export default userSaga;
