import {
  GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS,
  ADD_FREIGHT_ROAD_TRANSPORT_DATA_FAIL
} from "./actionTypes"

const INIT_STATE = {
  passengersRTD: [],
  freightRTD: [],
  error: null,
  success: null
}

const roadTransportData = (state = INIT_STATE, action) => {
  switch (action.type) {
    case GET_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        passengersRTD: action.payload,
      }

    case GET_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: action.payload,
      }
    case ADD_PASSENGER_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        passengersRTD: action.payload.passengersRTD,
        success: action.payload.message
      }

    case ADD_PASSENGER_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: action.payload,
      }
    case GET_FREIGHT_ROAD_TRANSPORT_DATA_SUCCESS:
      return {
        ...state,
        freightRTD: action.payload.freightRTD,
        success: action.payload.message
      }

    case GET_FREIGHT_ROAD_TRANSPORT_DATA_FAIL:
      return {
        ...state,
        error: action.payload,
      }

    default:
      return state
  }
}

export default roadTransportData
