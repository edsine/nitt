import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import { GET_USERS, ADD_USER, EDIT_USER, DELETE_USER } from "./actionTypes";
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
} from "./actions";

import {
  getUsers,
  postUser,
  putUser,
  deleteUser,
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
      yield put(getUsersFail(Object.values(response?.errors)));
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
      yield put(addUserFail(Object.values(response?.errors)));
    }
  } catch (error) {
    yield put(addUserFail(error));
  }
}

function* updateUser({ payload: { user, id } }) {
  try {
    const response = yield call(putUser, user, id, { headers: getHeaders() });
    if (response?.success) {
      yield put(editUserSuccess(response?.data, response?.message));
    } else {
      yield put(editUserFail(Object.values(response?.errors)));
    }
  } catch (error) {
    yield put(editUserFail(error));
  }
}

function* removeUser({ payload }) {
  try {
    const response = yield call(deleteUser, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteUserSuccess(response?.message));
    } else {
      yield put(deleteUserFail(Object.values(response?.errors)));
    }
  } catch (error) {
    yield put(deleteUserFail(error));
  }
}

function* userSaga() {
  yield takeEvery(GET_USERS, fetchUsers);
  yield takeEvery(ADD_USER, addUser);
  yield takeEvery(EDIT_USER, updateUser);
  yield takeEvery(DELETE_USER, removeUser);
}

export default userSaga;
