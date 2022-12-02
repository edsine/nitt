// import axios from "axios"
import { post } from "./api_helper"
import * as url from "./backend_url_helper"

// Gets the logged in user data from local session
const getLoggedInUser = () => {
    const user = localStorage.getItem("user")
    if (user) return JSON.parse(user)
    return null
}

//is user is logged in
const isUserAuthenticated = () => {
    return getLoggedInUser() !== null
}

// Login Method
const postLogin = data => post(url.POST_LOGIN, data);


export {
    getLoggedInUser,
    isUserAuthenticated,
    postLogin
}
