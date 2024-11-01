import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import { GET_ROLES, ADD_ROLE, EDIT_ROLE, DELETE_ROLE } from "./actionTypes";
import {
  getRolesSuccess,
  getRolesFail,
  addRoleSuccess,
  addRoleFail,
  editRoleSuccess,
  editRoleFail,
  deleteRoleSuccess,
  deleteRoleFail,
  clearMessage,
} from "./actions";

import {
  getRoles,
  postRole,
  putRole,
  deleteRole,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchRoles() {
  try {
    const response = yield call(getRoles, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getRolesSuccess(data));
    } else {
      yield put(
        getRolesFail(response?.errors ? Object.values(response?.errors) : response?.message)
      );
    }
  } catch (error) {
    yield put(getRolesFail(error));
  }
}

function* addRole({ payload }) {
  try {
    const response = yield call(postRole, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addRoleSuccess(data, message));
    } else {
      yield put(
        addRoleFail(response?.errors ? Object.values(response?.errors) : response?.message)
      );
    }
  } catch (error) {
    yield put(addRoleFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateRole({ payload: { role, id } }) {
  try {
    const response = yield call(putRole, role, id, { headers: getHeaders() });
    if (response?.success) {
      yield put(editRoleSuccess(response?.data, response?.message));
    } else {
      yield put(
        editRoleFail(response?.errors ? Object.values(response?.errors) : response?.message)
      );
    }
  } catch (error) {
    yield put(editRoleFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeRole({ payload }) {
  try {
    const response = yield call(deleteRole, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteRoleSuccess(response?.message));
    } else {
      yield put(
        deleteRoleFail(response?.errors ? Object.values(response?.errors) : response?.message)
      );
    }
  } catch (error) {
    yield put(deleteRoleFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* roleSaga() {
  yield takeEvery(GET_ROLES, fetchRoles);
  yield takeEvery(ADD_ROLE, addRole);
  yield takeEvery(EDIT_ROLE, updateRole);
  yield takeEvery(DELETE_ROLE, removeRole);
}

export default roleSaga;
