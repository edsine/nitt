import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_MARITIME_ADMINISTRATIONS,
  ADD_MARITIME_ADMINISTRATION,
  EDIT_MARITIME_ADMINISTRATION,
  DELETE_MARITIME_ADMINISTRATION,
} from "./actionTypes";
import {
  getMaritimeAdministrationsSuccess,
  getMaritimeAdministrationsFail,
  addMaritimeAdministrationSuccess,
  addMaritimeAdministrationFail,
  editMaritimeAdministrationSuccess,
  editMaritimeAdministrationFail,
  deleteMaritimeAdministrationSuccess,
  deleteMaritimeAdministrationFail,
  clearMessage,
} from "./actions";

import {
  getMaritimeAdministrations,
  postMaritimeAdministration,
  putMaritimeAdministration,
  deleteMaritimeAdministration,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchMaritimeAdministrations() {
  try {
    const response = yield call(getMaritimeAdministrations, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getMaritimeAdministrationsSuccess(data));
    } else {
      yield put(
        getMaritimeAdministrationsFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getMaritimeAdministrationsFail(error));
  }
}

function* addMaritimeAdministration({ payload }) {
  try {
    const response = yield call(postMaritimeAdministration, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addMaritimeAdministrationSuccess(data, message));
    } else {
      yield put(
        addMaritimeAdministrationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addMaritimeAdministrationFail(error));
  }
}

function* updateMaritimeAdministration({ payload: { maritimeAdministration, id } }) {
  try {
    const response = yield call(putMaritimeAdministration, maritimeAdministration, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editMaritimeAdministrationSuccess(response?.data, response?.message));
    } else {
      yield put(
        editMaritimeAdministrationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editMaritimeAdministrationFail(error));
  }
}

function* removeMaritimeAdministration({ payload }) {
  try {
    const response = yield call(deleteMaritimeAdministration, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteMaritimeAdministrationSuccess(response?.message));
    } else {
      yield put(
        deleteMaritimeAdministrationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteMaritimeAdministrationFail(error));
  }
}

function* maritimeAdministrationSaga() {
  yield takeEvery(GET_MARITIME_ADMINISTRATIONS, fetchMaritimeAdministrations);
  yield takeEvery(ADD_MARITIME_ADMINISTRATION, addMaritimeAdministration);
  yield takeEvery(EDIT_MARITIME_ADMINISTRATION, updateMaritimeAdministration);
  yield takeEvery(DELETE_MARITIME_ADMINISTRATION, removeMaritimeAdministration);
}

export default maritimeAdministrationSaga;
