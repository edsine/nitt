import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_MARITIME_ACADEMIES,
  ADD_MARITIME_ACADEMY,
  EDIT_MARITIME_ACADEMY,
  DELETE_MARITIME_ACADEMY,
} from "./actionTypes";
import {
  getMaritimeAcademiesSuccess,
  getMaritimeAcademiesFail,
  addMaritimeAcademySuccess,
  addMaritimeAcademyFail,
  editMaritimeAcademySuccess,
  editMaritimeAcademyFail,
  deleteMaritimeAcademySuccess,
  deleteMaritimeAcademyFail,
  clearMessage,
} from "./actions";

import {
  getMaritimeAcademies,
  postMaritimeAcademy,
  putMaritimeAcademy,
  deleteMaritimeAcademy,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchMaritimeAcademies() {
  try {
    const response = yield call(getMaritimeAcademies, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getMaritimeAcademiesSuccess(data));
    } else {
      yield put(
        getMaritimeAcademiesFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getMaritimeAcademiesFail(error));
  }
}

function* addMaritimeAcademy({ payload }) {
  try {
    const response = yield call(postMaritimeAcademy, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addMaritimeAcademySuccess(data, message));
    } else {
      yield put(
        addMaritimeAcademyFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addMaritimeAcademyFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateMaritimeAcademy({ payload: { maritimeAcademy, id } }) {
  try {
    const response = yield call(putMaritimeAcademy, maritimeAcademy, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editMaritimeAcademySuccess(response?.data, response?.message));
    } else {
      yield put(
        editMaritimeAcademyFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editMaritimeAcademyFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeMaritimeAcademy({ payload }) {
  try {
    const response = yield call(deleteMaritimeAcademy, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteMaritimeAcademySuccess(response?.message));
    } else {
      yield put(
        deleteMaritimeAcademyFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteMaritimeAcademyFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* maritimeAcademySaga() {
  yield takeEvery(GET_MARITIME_ACADEMIES, fetchMaritimeAcademies);
  yield takeEvery(ADD_MARITIME_ACADEMY, addMaritimeAcademy);
  yield takeEvery(EDIT_MARITIME_ACADEMY, updateMaritimeAcademy);
  yield takeEvery(DELETE_MARITIME_ACADEMY, removeMaritimeAcademy);
}

export default maritimeAcademySaga;
