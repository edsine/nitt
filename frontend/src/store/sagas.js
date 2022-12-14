import { all, fork } from "redux-saga/effects";

//public
import AccountSaga from "./auth/register/saga";
import AuthSaga from "./auth/login/saga";
import ForgetSaga from "./auth/forgetpwd/saga";
import ProfileSaga from "./auth/profile/saga";
import LayoutSaga from "./layout/saga";
import calendarSaga from "./calendar/saga";
import chatSaga from "./chat/saga";
import tasksSaga from "./tasks/saga";
import contactsSaga from "./contacts/saga";
import roadTransportDataSaga from "./roadtransportdata/saga";
import airTransportDataSaga from "./airtransportdata/saga";
import airPassengerTrafficSaga from "./airpassengertraffic/saga";
import userSaga from "./user/saga";
import roleSaga from "./role/saga";
import vehicleImportationSaga from "./vehicleimportation/saga";
import permissionSaga from "./permission/saga";
import railwaysPassengersSaga from "./railwayspassengers/saga";
import rollingStockSaga from "./rollingstock/saga";

export default function* rootSaga() {
  yield all([
    //public
    AccountSaga(),
    fork(AuthSaga),
    ProfileSaga(),
    ForgetSaga(),
    fork(LayoutSaga),
    fork(calendarSaga),
    fork(chatSaga),
    fork(tasksSaga),
    fork(contactsSaga),
    fork(roadTransportDataSaga),
    fork(airTransportDataSaga),
    fork(airPassengerTrafficSaga),
    fork(userSaga),
    fork(roleSaga),
    fork(vehicleImportationSaga),
    fork(permissionSaga),
    fork(railwaysPassengersSaga),
    fork(rollingStockSaga)
  ]);
}
