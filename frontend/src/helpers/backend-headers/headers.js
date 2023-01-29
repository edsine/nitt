export const getAccessToken = () => {
  const token = JSON.parse(localStorage.getItem("userToken"));
  const accessToken = "Bearer " + token;
  return accessToken;
};

export const getHeaders = () => {
  const headers = {
    Authorization: getAccessToken(),
  };
  return headers;
};

export const getFileUploadHeaders = () => {
  const headers = {
    "Content-Type": "multipart/form-data",
    Authorization: getAccessToken(),
  };
  return headers;
};
