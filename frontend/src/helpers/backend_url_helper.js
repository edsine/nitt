//REGISTER
export const POST_REGISTER = "auth/register";

//RECOVER
export const POST_RECOVER = "auth/recover";

//RESET PASSWORD
export const POST_RESET_PASSWORD = "auth/reset";

//LOGIN
export const POST_LOGIN = "auth/login";

//LOGOUT
export const POST_LOGOUT = "auth/logout";

// SEND VERIFICATION EMAIL
export const SEND_VERIFICATION_EMAIL = "verify";

// GET DASHBOARD DATA
export const GET_DASHBOARD_DATA = "dashboard";

// GET AUTHENTICATED USER
export const GET_AUTHENTICATED_USER = "user";

// GET APP PERMISSIONS
export const GET_APP_PERMISSIONS = "permissions";

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

// GET AIR TRANSPORT DATA
export const GET_AIR_TRANSPORT_DATA = "air_transport_data";

// ADD AIR TRANSPORT DATA
export const ADD_AIR_TRANSPORT_DATA = "air_transport_data";

// UPDATE AIR TRANSPORT DATA
export const UPDATE_AIR_TRANSPORT_DATA = (id) => `air_transport_data/${id}`;

// DELETE AIR TRANSPORT DATA
export const DELETE_AIR_TRANSPORT_DATA = (id) => `air_transport_data/${id}`;

// GET AIR PASSENGER TRAFFIC
export const GET_AIR_PASSENGER_TRAFFIC = "air_passengers_traffic";

// ADD AIR PASSENGER TRAFFIC
export const ADD_AIR_PASSENGER_TRAFFIC = "air_passengers_traffic";

// UPDATE AIR PASSENGER TRAFFIC
export const UPDATE_AIR_PASSENGER_TRAFFIC = (id) =>
  `air_passengers_traffic/${id}`;

// DELETE AIR PASSENGER TRAFFIC
export const DELETE_AIR_PASSENGER_TRAFFIC = (id) =>
  `air_passengers_traffic/${id}`;

// GET USER
export const GET_USERS = "users";

// ADD USER
export const ADD_USER = "users";

// UPDATE USER
export const PUT_USER = (id) => `users/${id}`;

// DELETE USER
export const DELETE_USER = (id) => `users/${id}`;

// UPDATE PROFILE
export const PUT_UPDATE_PROFILE = (id) => `users/update_profile/${id}`;

// UPDATE PROFILE IMAGE
export const POST_UPDATE_PROFILE_IMAGE = (id) =>
  `users/update_profile_image/${id}`;

// CHANGE PASSWORD
export const POST_CHANGE_PASSWORD = (id) => `users/change_password/${id}`;

// GET ROLES
export const GET_ROLES = "roles";

// ADD ROLE
export const ADD_ROLE = "roles";

// UPDATE ROLE
export const PUT_ROLE = (id) => `roles/${id}`;

// DELETE ROLE
export const DELETE_ROLE = (id) => `roles/${id}`;

// GET ROLES
export const GET_VEHICLE_IMPORTATIONS = "vehicle_importations";

// ADD ROLE
export const ADD_VEHICLE_IMPORTATION = "vehicle_importations";

// UPDATE ROLE
export const PUT_VEHICLE_IMPORTATION = (id) => `vehicle_importations/${id}`;

// DELETE ROLE
export const DELETE_VEHICLE_IMPORTATION = (id) => `vehicle_importations/${id}`;

// GET HELPERS
export const GET_HELPERS = "helpers";

// GET RAILWAYS PASSENGERS
export const GET_RAILWAYS_PASSENGERS = "railway_passengers";

// ADD RAILWAYS PASSENGER
export const ADD_RAILWAYS_PASSENGER = "railway_passengers";

// BULK UPLOAD RAILWAYS PASSENGER
export const BULK_UPLOAD_RAILWAYS_PASSENGER = "railway_passengers/upload";

// UPDATE RAILWAYS PASSENGER
export const PUT_RAILWAYS_PASSENGER = (id) => `railway_passengers/${id}`;

// DELETE RAILWAYS PASSENGER
export const DELETE_RAILWAYS_PASSENGER = (id) => `railway_passengers/${id}`;

// GET ROLLING STOCKS
export const GET_ROLLING_STOCKS = "railway_rolling_stocks";

// ADD ROLLING STOCK
export const ADD_ROLLING_STOCK = "railway_rolling_stocks";

// UPDATE ROLLING STOCK
export const PUT_ROLLING_STOCK = (id) => `railway_rolling_stocks/${id}`;

// DELETE ROLLING STOCK
export const DELETE_ROLLING_STOCK = (id) => `railway_rolling_stocks/${id}`;

// GET MARITIME ACADEMIES
export const GET_MARITIME_ACADEMIES = "maritime_academies";

// ADD MARITIME ACADEMY
export const ADD_MARITIME_ACADEMY = "maritime_academies";

// UPDATE MARITIME ACADEMY
export const PUT_MARITIME_ACADEMY = (id) => `maritime_academies/${id}`;

// DELETE MARITIME ACADEMY
export const DELETE_MARITIME_ACADEMY = (id) => `maritime_academies/${id}`;

// GET MARITIME TRANSPORTS
export const GET_MARITIME_TRANSPORTS = "maritime_transports";

// ADD MARITIME TRANSPORT
export const ADD_MARITIME_TRANSPORT = "maritime_transports";

// UPDATE MARITIME TRANSPORT
export const PUT_MARITIME_TRANSPORT = (id) => `maritime_transports/${id}`;

// DELETE MARITIME TRANSPORT
export const DELETE_MARITIME_TRANSPORT = (id) => `maritime_transports/${id}`;

// GET MARITIME ADMINISTRATIONS
export const GET_MARITIME_ADMINISTRATIONS = "maritime_administrations";

// ADD MARITIME ADMINISTRATION
export const ADD_MARITIME_ADMINISTRATION = "maritime_administrations";

// UPDATE MARITIME ADMINISTRATION
export const PUT_MARITIME_ADMINISTRATION = (id) =>
  `maritime_administrations/${id}`;

// DELETE MARITIME ADMINISTRATION
export const DELETE_MARITIME_ADMINISTRATION = (id) =>
  `maritime_administrations/${id}`;

// GET TRAINS PUNCTUALITIES
export const GET_TRAINS_PUNCTUALITIES = "trains_punctualities";

// ADD TRAINS PUNCTUALITY
export const ADD_TRAINS_PUNCTUALITY = "trains_punctualities";

// UPDATE TRAINS PUNCTUALITY
export const PUT_TRAINS_PUNCTUALITY = (id) => `trains_punctualities/${id}`;

// DELETE TRAINS PUNCTUALITY
export const DELETE_TRAINS_PUNCTUALITY = (id) => `trains_punctualities/${id}`;


// GET GROSS DOMESTIC PRODUCTS
export const GET_GROSS_DOMESTIC_PRODUCTS = "gross_domestic_products";

// ADD GROSS DOMESTIC
export const ADD_GROSS_DOMESTIC_PRODUCT = "gross_domestic_products";

// BULK UPLOAD GROSS DOMESTIC
export const BULK_UPLOAD_GROSS_DOMESTIC_PRODUCT = "gross_domestic_products/upload";

// UPDATE GROSS DOMESTIC
export const PUT_GROSS_DOMESTIC_PRODUCT = (id) => `gross_domestic_products/${id}`;

// DELETE GROSS DOMESTIC
export const DELETE_GROSS_DOMESTIC_PRODUCT = (id) => `gross_domestic_products/${id}`;


// GET SHIP CONTAINER TRAFFIC
export const GET_SHIP_CONTAINER_TRAFFICS = "ship_container_traffics";

// ADD SHIP CONTAINER TRAFFIC
export const ADD_SHIP_CONTAINER_TRAFFIC = "ship_container_traffics";

// BULK UPLOAD SHIP CONTAINER TRAFFIC
export const BULK_UPLOAD_SHIP_CONTAINER_TRAFFIC = "ship_container_traffics/upload";

// UPDATE SHIP CONTAINER TRAFFIC
export const PUT_SHIP_CONTAINER_TRAFFIC = (id) => `ship_container_traffics/${id}`;

// DELETE SHIP CONTAINER TRAFFIC
export const DELETE_SHIP_CONTAINER_TRAFFIC = (id) => `ship_container_traffics/${id}`;
