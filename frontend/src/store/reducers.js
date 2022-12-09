import { combineReducers } from "redux"

// Front
import Layout from "./layout/reducer"

// Authentication
import Login from "./auth/login/reducer"
import Account from "./auth/register/reducer"
import ForgetPassword from "./auth/forgetpwd/reducer"
import Profile from "./auth/profile/reducer"

//Calendar
import calendar from "./calendar/reducer"

//chat
import chat from "./chat/reducer"

//contacts
import contacts from "./contacts/reducer"

//tasks
import tasks from "./tasks/reducer"

// Road Transport Data
import roadTransportData from "./roadtransportdata/reducer";

// Air Transport Data
import airTransportData from "./airtransportdata/reducer";

// Air Passenger
import airPassengerTraffic from "./airpassengertraffic/reducer";

// Users
import users from "./user/reducer";

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
  users
})

export default rootReducer
