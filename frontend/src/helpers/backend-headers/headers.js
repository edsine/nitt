export const getAccessToken = () => {
  const token = JSON.parse(localStorage.getItem("userToken"));
  const accessToken = "Bearer " + token;
  return accessToken;
};

export const getHeaders = () => {
  const headers = {
    accept: "application/json",
    Authorization: getAccessToken(),
  };
  return headers;
};

export const getFileUploadHeaders = () => {
  const headers = {
    "Accept": "*/*",
    "Content-Type": "multipart/form-data",
    Authorization: getAccessToken(),
  };
  return headers;
};
