import { combineReducers } from "redux";

// Front
import Layout from "./layout/reducer";

// Authentication
import Login from "./auth/login/reducer";
import Account from "./auth/register/reducer";
import ForgetPassword from "./auth/forgetpwd/reducer";
import Profile from "./auth/profile/reducer";

//Calendar
import calendar from "./calendar/reducer";

//chat
import chat from "./chat/reducer";

//contacts
import contacts from "./contacts/reducer";

//tasks
import tasks from "./tasks/reducer";

// Dashboard Data
import dashboardData from "./dashboard/reducer";

// Road Transport Data
import roadTransportData from "./roadtransportdata/reducer";

// Air Transport Data
import airTransportData from "./airtransportdata/reducer";

// Air Passenger
import airPassengerTraffic from "./airpassengertraffic/reducer";

// Users
import users from "./user/reducer";

// Roles
import roles from "./role/reducer";

// Permissions
import permissions from "./permission/reducer";

// Vehicle Importation
import vehicleImportation from "./vehicleimportation/reducer";

// Railways Passengers
import railwaysPassengers from "./railwayspassengers/reducer";

// Rolling Stock
import rollingStock from "./rollingstock/reducer";

// Maritime Academy
import maritimeAcademy from "./maritimeacademy/reducer";

// Maritime Transport
import maritimeTransport from "./maritimetransport/reducer";

// Maritime Administration
import maritimeAdministration from "./maritimeadministration/reducer";

// Trains Punctuality
import trainsPunctuality from "./trainspunctuality/reducer";

const rootReducer = combineReducers({
  // public
  Layout,
  Login,
  Account,
  ForgetPassword,
  Profile,
  calendar,
  chat,
  tasks,
  contacts,
  roadTransportData,
  airTransportData,
  airPassengerTraffic,
  users,
  roles,
  vehicleImportation,
  permissions,
  railwaysPassengers,
  rollingStock,
  dashboardData,
  maritimeAcademy,
  maritimeTransport,
  maritimeAdministration,
  trainsPunctuality,
});

export default rootReducer;
