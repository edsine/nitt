import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA,
  EDIT_PASSENGER_ROAD_TRANSPORT_DATA,
  DELETE_PASSENGER_ROAD_TRANSPORT_DATA,
  GET_FREIGHT_ROAD_TRANSPORT_DATA,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA,
  EDIT_FREIGHT_ROAD_TRANSPORT_DATA,
  DELETE_FREIGHT_ROAD_TRANSPORT_DATA,
} from "./actionTypes";
import {
  getPassengerRoadTransportDataSuccess,
  getPassengerRoadTransportDataFail,
  addPassengerRoadTransportDataSuccess,
  addPassengerRoadTransportDataFail,
  editPassengerRoadTransportDataSuccess,
  editPassengerRoadTransportDataFail,
  deletePassengerRoadTransportDataSuccess,
  deletePassengerRoadTransportDataFail,
  getFreightRoadTransportDataSuccess,
  getFreightRoadTransportDataFail,
  addFreightRoadTransportDataSuccess,
  addFreightRoadTransportDataFail,
  editFreightRoadTransportDataSuccess,
  editFreightRoadTransportDataFail,
  deleteFreightRoadTransportDataSuccess,
  deleteFreightRoadTransportDataFail,
  clearMessage,
} from "./actions";

import {
  getPassengerRoadTransportData,
  postPassengerRoadTransportData,
  putPassengerRoadTransportData,
  deletePassengerRoadTransportData,
  getFreightRoadTransportData,
  postFreightRoadTransportData,
  putFreightRoadTransportData,
  deleteFreightRoadTransportData,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchPassengerRoadTransportData() {
  try {
    const response = yield call(getPassengerRoadTransportData, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getPassengerRoadTransportDataSuccess(data));
    } else {
      yield put(
        getPassengerRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getPassengerRoadTransportDataFail(error));
  }
}

function* addPassengerRoadTransportData({ payload }) {
  try {
    const response = yield call(postPassengerRoadTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addPassengerRoadTransportDataSuccess(data, message));
    } else {
      yield put(
        addPassengerRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addPassengerRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updatePassengerRoadTransportData({ payload: { passengerRTD, id } }) {
  try {
    const response = yield call(
      putPassengerRoadTransportData,
      passengerRTD,
      id,
      { headers: getHeaders() }
    );
    if (response?.success) {
      yield put(
        editPassengerRoadTransportDataSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editPassengerRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editPassengerRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removePassengerRoadTransportData({ payload }) {
  try {
    const response = yield call(deletePassengerRoadTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deletePassengerRoadTransportDataSuccess(response?.message));
    } else {
      yield put(
        deletePassengerRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deletePassengerRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* fetchFreightRoadTransportData() {
  try {
    const response = yield call(getFreightRoadTransportData, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(getFreightRoadTransportDataSuccess(response?.data));
    } else {
      yield put(
        getFreightRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getFreightRoadTransportDataFail(error));
  }
}

function* addFreightRoadTransportData({ payload }) {
  try {
    const response = yield call(postFreightRoadTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(
        addFreightRoadTransportDataSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        addFreightRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addFreightRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* updateFreightRoadTransportData({ payload: { freightRTD, id } }) {
  try {
    const response = yield call(putFreightRoadTransportData, freightRTD, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(
        editFreightRoadTransportDataSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editFreightRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editFreightRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* removeFreightRoadTransportData({ payload }) {
  try {
    const response = yield call(deleteFreightRoadTransportData, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteFreightRoadTransportDataSuccess(response?.message));
    } else {
      yield put(
        deleteFreightRoadTransportDataFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteFreightRoadTransportDataFail(error));
  }
  yield delay(3000);
  yield put(clearMessage());
}

function* roadTransportDataSaga() {
  yield takeEvery(
    GET_PASSENGER_ROAD_TRANSPORT_DATA,
    fetchPassengerRoadTransportData
  );
  yield takeEvery(
    ADD_PASSENGER_ROAD_TRANSPORT_DATA,
    addPassengerRoadTransportData
  );
  yield takeEvery(
    EDIT_PASSENGER_ROAD_TRANSPORT_DATA,
    updatePassengerRoadTransportData
  );
  yield takeEvery(
    DELETE_PASSENGER_ROAD_TRANSPORT_DATA,
    removePassengerRoadTransportData
  );
  yield takeEvery(
    GET_FREIGHT_ROAD_TRANSPORT_DATA,
    fetchFreightRoadTransportData
  );
  yield takeEvery(ADD_FREIGHT_ROAD_TRANSPORT_DATA, addFreightRoadTransportData);
  yield takeEvery(
    EDIT_FREIGHT_ROAD_TRANSPORT_DATA,
    updateFreightRoadTransportData
  );
  yield takeEvery(
    DELETE_FREIGHT_ROAD_TRANSPORT_DATA,
    removeFreightRoadTransportData
  );
}

export default roadTransportDataSaga;
