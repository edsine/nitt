import {
  PROFILE_ERROR,
  PROFILE_SUCCESS,
  EDIT_PROFILE,
  PROFILE_IMAGE_ERROR,
  PROFILE_IMAGE_SUCCESS,
  RESET_PROFILE_FLAG,
  EDIT_PROFILE_IMAGE,
  SEND_VERIFICATION_EMAIL_SUCCESS,
  SEND_VERIFICATION_EMAIL_ERROR,
} from "./actionTypes";

const initialState = {
  error: "",
  success: "",
  profileImageError: "",
  profileImageSuccess: "",
  verificationEmailError: "",
  verificationEmailSuccess: "",
};

const profile = (state = initialState, action) => {
  switch (action.type) {
    case EDIT_PROFILE:
      state = { ...state };
      break;
    case PROFILE_SUCCESS:
      state = { ...state, success: action.payload };
      break;
    case PROFILE_ERROR:
      state = { ...state, error: action.payload };
      break;
    case EDIT_PROFILE_IMAGE:
      state = { ...state };
      break;
    case PROFILE_IMAGE_SUCCESS:
      state = { ...state, profileImageSuccess: action.payload };
      break;
    case PROFILE_IMAGE_ERROR:
      state = { ...state, profileImageError: action.payload };
      break;
    case SEND_VERIFICATION_EMAIL_SUCCESS:
      state = { ...state, verificationEmailSuccess: action.payload };
      break;
    case SEND_VERIFICATION_EMAIL_ERROR:
      state = { ...state, verificationEmailError: action.payload };
      break;
    case RESET_PROFILE_FLAG:
      state = { ...state, success: null };
      break;
    default:
      state = { ...state };
      break;
  }
  return state;
};

export default profile;
