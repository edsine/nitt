import { call, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_TRAINS_PUNCTUALITIES,
  ADD_TRAINS_PUNCTUALITY,
  EDIT_TRAINS_PUNCTUALITY,
  DELETE_TRAINS_PUNCTUALITY,
} from "./actionTypes";
import {
  getTrainsPunctualitiesSuccess,
  getTrainsPunctualitiesFail,
  addTrainsPunctualitySuccess,
  addTrainsPunctualityFail,
  editTrainsPunctualitySuccess,
  editTrainsPunctualityFail,
  deleteTrainsPunctualitySuccess,
  deleteTrainsPunctualityFail,
  clearMessage,
} from "./actions";

import {
  getTrainsPunctualities,
  postTrainsPunctuality,
  putTrainsPunctuality,
  deleteTrainsPunctuality,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchTrainsPunctualities() {
  try {
    const response = yield call(getTrainsPunctualities, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getTrainsPunctualitiesSuccess(data));
    } else {
      yield put(
        getTrainsPunctualitiesFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getTrainsPunctualitiesFail(error));
  }
}

function* addTrainsPunctuality({ payload }) {
  try {
    const response = yield call(postTrainsPunctuality, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addTrainsPunctualitySuccess(data, message));
    } else {
      yield put(
        addTrainsPunctualityFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addTrainsPunctualityFail(error));
  }
}

function* updateTrainsPunctuality({ payload: { trainsPunctuality, id } }) {
  try {
    const response = yield call(putTrainsPunctuality, trainsPunctuality, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(editTrainsPunctualitySuccess(response?.data, response?.message));
    } else {
      yield put(
        editTrainsPunctualityFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editTrainsPunctualityFail(error));
  }
}

function* removeTrainsPunctuality({ payload }) {
  try {
    const response = yield call(deleteTrainsPunctuality, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteTrainsPunctualitySuccess(response?.message));
    } else {
      yield put(
        deleteTrainsPunctualityFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteTrainsPunctualityFail(error));
  }
}

function* trainsPunctualitySaga() {
  yield takeEvery(GET_TRAINS_PUNCTUALITIES, fetchTrainsPunctualities);
  yield takeEvery(ADD_TRAINS_PUNCTUALITY, addTrainsPunctuality);
  yield takeEvery(EDIT_TRAINS_PUNCTUALITY, updateTrainsPunctuality);
  yield takeEvery(DELETE_TRAINS_PUNCTUALITY, removeTrainsPunctuality);
}

export default trainsPunctualitySaga;
