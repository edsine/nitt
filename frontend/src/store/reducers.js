import { combineReducers } from "redux";

// Front
import Layout from "./layout/reducer";

// Authentication
import Login from "./auth/login/reducer";
import Account from "./auth/register/reducer";
import ForgetPassword from "./auth/forgetpwd/reducer";
import Profile from "./auth/profile/reducer";

import resetPassword from "./auth/resetPassword/reducer";

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

// Helpers
import helpers from "./helpers/reducer";

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

// Gross Domestic Product
import grossDomesticProduct from "./grossdomesticproduct/reducer";

// Ship Container Traffic
import shipContainerTraffic from "./shipcontainertraffics/reducer";

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
  helpers,
  vehicleImportation,
  permissions,
  railwaysPassengers,
  rollingStock,
  dashboardData,
  maritimeAcademy,
  maritimeTransport,
  maritimeAdministration,
  trainsPunctuality,
  resetPassword,
  grossDomesticProduct,
  shipContainerTraffic,
});

export default rootReducer;
