import { call, delay, put, takeEvery } from "redux-saga/effects";

// Crypto Redux States
import {
  GET_VEHICLE_IMPORTATIONS,
  ADD_VEHICLE_IMPORTATION,
  EDIT_VEHICLE_IMPORTATION,
  DELETE_VEHICLE_IMPORTATION,
} from "./actionTypes";
import {
  getVehicleImportationsSuccess,
  getVehicleImportationsFail,
  addVehicleImportationSuccess,
  addVehicleImportationFail,
  editVehicleImportationSuccess,
  editVehicleImportationFail,
  deleteVehicleImportationSuccess,
  deleteVehicleImportationFail,
  clearMessage,
} from "./actions";

import {
  getVehicleImportations,
  postVehicleImportation,
  putVehicleImportation,
  deleteVehicleImportation,
} from "../../helpers/backend_helper";
import { getHeaders } from "../../helpers/backend-headers/headers";

function* fetchVehicleImportation() {
  try {
    const response = yield call(getVehicleImportations, {
      headers: getHeaders(),
    });
    if (response.success) {
      const { data } = response;
      yield put(getVehicleImportationsSuccess(data));
    } else {
      yield put(
        getVehicleImportationsFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(getVehicleImportationsFail(error));
  }
}

function* addVehicleImportation({ payload }) {
  try {
    const response = yield call(postVehicleImportation, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      const { data, message } = response;
      yield put(addVehicleImportationSuccess(data, message));
    } else {
      yield put(
        addVehicleImportationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(addVehicleImportationFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* updateVehicleImportation({ payload: { vehicleImportation, id } }) {
  try {
    const response = yield call(putVehicleImportation, vehicleImportation, id, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(
        editVehicleImportationSuccess(response?.data, response?.message)
      );
    } else {
      yield put(
        editVehicleImportationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(editVehicleImportationFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* removeVehicleImportation({ payload }) {
  try {
    const response = yield call(deleteVehicleImportation, payload, {
      headers: getHeaders(),
    });
    if (response?.success) {
      yield put(deleteVehicleImportationSuccess(response?.message));
    } else {
      yield put(
        deleteVehicleImportationFail(
          response?.errors ? Object.values(response?.errors) : response?.message
        )
      );
    }
  } catch (error) {
    yield put(deleteVehicleImportationFail(error));
  }
  yield delay(2000);
  yield put(clearMessage());
}

function* vehicleImportationSaga() {
  yield takeEvery(GET_VEHICLE_IMPORTATIONS, fetchVehicleImportation);
  yield takeEvery(ADD_VEHICLE_IMPORTATION, addVehicleImportation);
  yield takeEvery(EDIT_VEHICLE_IMPORTATION, updateVehicleImportation);
  yield takeEvery(DELETE_VEHICLE_IMPORTATION, removeVehicleImportation);
}

export default vehicleImportationSaga;
