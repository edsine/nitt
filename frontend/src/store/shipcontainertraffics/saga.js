import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_SHIP_CONTAINER_TRAFFICS,
  ADD_SHIP_CONTAINER_TRAFFIC,
  BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC,
  EDIT_SHIP_CONTAINER_TRAFFIC,
  DELETE_SHIP_CONTAINER_TRAFFIC,
} from "./actionTypes";
import {
  getShipContainerTrafficsSuccess,
  getShipContainerTrafficsFail,
  addShipContainerTrafficSuccess,
  addShipContainerTrafficFail,
  bulkUploadShipContainerTrafficSuccess,
  bulkUploadShipContainerTrafficFail,
  editShipContainerTrafficSuccess,
  editShipContainerTrafficFail,
  deleteShipContainerTrafficSuccess,
  deleteShipContainerTrafficFail,
  clearMessage,
} from "./actions";

import {
  getShipContainerTraffics,
  postShipContainerTraffic,
  postBulkUploadShipContainerTraffic,
  putShipContainerTraffic,
  deleteShipContainerTraffic,
} from "../../helpers/backend_helper";
import {
  getHeaders,
  getFileUploadHeaders,
} from "../../helpers/backend-headers/headers";

function* fetchShipContainerTraffics() {
  try {
    const response = yield call(getShipContainerTraffics, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getShipContainerTrafficsSuccess(data));
    } else {
      yield put(
        getShipContainerTrafficsFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getShipContainerTrafficsFail(error));
  }
}

function* addShipContainerTraffic({ payload }) {
  try {
    const response = yield call(postShipContainerTraffic, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addShipContainerTrafficSuccess(data, message));
    } else {
      yield put(
        addShipContainerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addShipContainerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* bulkUploadShipContainerTraffic({ payload }) {
  try {
    const response = yield call(postBulkUploadShipContainerTraffic, payload, {
      headers: getFileUploadHeaders(),
    });

    if (response?.success) {
      yield put(bulkUploadShipContainerTrafficSuccess(response.message));
    } else {
      yield put(
        bulkUploadShipContainerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(bulkUploadShipContainerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateShipContainerTraffic({ payload: { shipContainerTraffic, id } }) {
  try {
    const response = yield call(putShipContainerTraffic, shipContainerTraffic, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(
        editShipContainerTrafficSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editShipContainerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editShipContainerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeShipContainerTraffic({ payload }) {
  try {
    const response = yield call(deleteShipContainerTraffic, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteShipContainerTrafficSuccess(response?.message));
    } else {
      yield put(
        deleteShipContainerTrafficFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteShipContainerTrafficFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* shipContainerTrafficsSaga() {
  yield takeEvery(GET_SHIP_CONTAINER_TRAFFICS, fetchShipContainerTraffics);
  yield takeEvery(ADD_SHIP_CONTAINER_TRAFFIC, addShipContainerTraffic);
  yield takeEvery(BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC, bulkUploadShipContainerTraffic);
  yield takeEvery(EDIT_SHIP_CONTAINER_TRAFFIC, updateShipContainerTraffic);
  yield takeEvery(DELETE_SHIP_CONTAINER_TRAFFIC, removeShipContainerTraffic);
}

export default shipContainerTrafficsSaga;
