//REGISTER
export const POST_REGISTER = "auth/register";

//LOGIN
export const POST_LOGIN = "auth/login";

//LOGOUT
export const POST_LOGOUT = "auth/logout";

// GET AUTHENTICATED USER
export const GET_AUTHENTICATED_USER = "user";

// GET ROAD TRANSPORT DATA (PASSENGERS)
export const GET_PASSENGER_ROAD_TRANSPORT_DATA =
  "passenger_road_transport_data";

// ADD ROAD TRANSPORT DATA (PASSENGERS)
export const ADD_PASSENGER_ROAD_TRANSPORT_DATA =
  "passenger_road_transport_data";

// UPDATE ROAD TRANSPORT DATA (PASSENGERS)
export const UPDATE_PASSENGER_RTD = (id) =>
  `passenger_road_transport_data/${id}`;

// DELETE ROAD TRANSPORT DATA (PASSENGERS)
export const DELETE_PASSENGER_RTD = (id) =>
  `passenger_road_transport_data/${id}`;

// GET ROAD TRANSPORT DATA (FREIGHT)
export const GET_FREIGHT_ROAD_TRANSPORT_DATA = "freight_road_transport_data";

// ADD ROAD TRANSPORT DATA (FREIGHT)
export const ADD_FREIGHT_ROAD_TRANSPORT_DATA = "freight_road_transport_data";

// UPDATE ROAD TRANSPORT DATA (PASSENGERS)
export const UPDATE_FREIGHT_RTD = (id) => `freight_road_transport_data/${id}`;

// DELETE ROAD TRANSPORT DATA (PASSENGERS)
export const DELETE_FREIGHT_RTD = (id) => `freight_road_transport_data/${id}`;

// UPDATE USER
export const PUT_USER = (id) => `users/${id}`;

// UPDATE PROFILE
export const PUT_UPDATE_PROFILE = (id) => `users/update_profile/${id}`;
