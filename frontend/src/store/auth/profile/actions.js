import {
  PROFILE_ERROR,
  PROFILE_SUCCESS,
  EDIT_PROFILE,
  EDIT_PROFILE_IMAGE,
  PROFILE_IMAGE_SUCCESS,
  SEND_VERIFICATION_EMAIL,
  SEND_VERIFICATION_EMAIL_SUCCESS,
  SEND_VERIFICATION_EMAIL_ERROR,
  PROFILE_IMAGE_ERROR,
  RESET_PROFILE_FLAG,
} from "./actionTypes";

export const editProfile = (data, idx) => {
  return {
    type: EDIT_PROFILE,
    payload: { data, idx },
  };
};

export const profileSuccess = (msg) => {
  return {
    type: PROFILE_SUCCESS,
    payload: msg,
  };
};

export const profileError = (error) => {
  return {
    type: PROFILE_ERROR,
    payload: error,
  };
};

export const editProfileImage = (data, idx) => {
  return {
    type: EDIT_PROFILE_IMAGE,
    payload: { data, idx },
  };
};

export const profileImageSuccess = (msg) => {
  return {
    type: PROFILE_IMAGE_SUCCESS,
    payload: msg,
  };
};

export const profileImageError = (error) => {
  return {
    type: PROFILE_IMAGE_ERROR,
    payload: error,
  };
};

export const sendVerificationEmail = () => {
  return {
    type: SEND_VERIFICATION_EMAIL,
    payload: null
  };
};

export const sendVerificationEmailSuccess = (msg) => {
  return {
    type: SEND_VERIFICATION_EMAIL_SUCCESS,
    payload: msg,
  };
};

export const sendVerificationEmailError = (error) => {
  return {
    type: SEND_VERIFICATION_EMAIL_ERROR,
    payload: error,
  };
};

export const resetProfileFlag = (error) => {
  return {
    type: RESET_PROFILE_FLAG,
  };
};
