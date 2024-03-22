import axios from "axios";

//apply base url for axios
export const API_URL = process.env.REACT_APP_API_URL;

export const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;

const axiosApi = axios.create({
  baseURL: API_URL,
});

axiosApi.defaults.headers.post["Content-Type"] = "application/json";

axiosApi.defaults.headers.post["Accept"] = "application/json";

// axiosApi.defaults.withCredentials = true;

axiosApi.interceptors.response.use(
  (response) => response
  // error => Promise.reject(error)
);

export async function get(url, config = {}) {
  return await axiosApi
    .get(url, { ...config })
    .then((response) => response.data)
    .catch((error) => {
      return error.response?.data;
    });
}

export async function post(url, data, config = {}) {
  return axiosApi
    .post(url, { ...data }, { ...config })
    .then((response) => response.data)
    .catch((error) => {
      return error.response?.data;
    });
}

export async function filePost(url, data, config = {}) {
  return axiosApi
    .post(url, data, { ...config })
    .then((response) => response.data)
    .catch((error) => {
      return error.response?.data;
    });
}

export async function put(url, data, config = {}) {
  return axiosApi
    .put(url, { ...data }, { ...config })
    .then((response) => response.data)
    .catch((error) => {
      return error.response?.data;
    });
}

export async function del(url, config = {}) {
  return await axiosApi
    .delete(url, { ...config })
    .then((response) => response.data)
    .catch((error) => {
      return error.response?.data;
    });
}
