import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addRailwaysPassenger } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddRailwaysPassenger = (props) => {
  const { isOpen, setIsOpen, error, success, onAddRailwaysPassenger } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddRailwaysPassenger(values);
  };

  return (
    <Modal
      isOpen={isOpen}
      toggle={() => {
        toggle();
      }}
    >
      {error?.addError && error.addError ? (
        <Alert color="danger">{error?.addError}</Alert>
      ) : null}
      {success?.addSuccess && success?.addSuccess ? (
        <Alert color="success">{success?.addSuccess}</Alert>
      ) : null}
      <AvForm
        className="needs-validation"
        onValidSubmit={(e, v) => {
          handleValidSubmit(e, v);
        }}
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Add Railways Passenger
          </h5>
          <button
            type="button"
            onClick={() => {
              setIsOpen(false);
            }}
            className="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div className="modal-body">
          <Row>
            <Col md="12">
              <div className="mb-3">
                <Label htmlFor="year">Year</Label>
                <AvField
                  name="year"
                  placeholder=""
                  type="select"
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                >
                  <option>Select</option>
                  <YearOptions></YearOptions>
                </AvField>
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfUrbanPassengersCarried">
                  Urban Passengers Carried
                </Label>
                <AvField
                  name="number_of_urban_passengers_carried"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Urban Passengers Carried."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfUrbanPassengersCarried"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfRegionalPassengersCarried">
                  Regional Passengers Carried
                </Label>
                <AvField
                  name="number_of_regional_passengers_carried"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Regional Passengers Carried"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfRegionalPassengersCarried"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="freightCarried">Freight Carried</Label>
                <AvField
                  name="freight_carried"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Freight Carried"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="freightCarried"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfFreightTrains">Freight Trains</Label>
                <AvField
                  name="number_of_freight_trains"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Freight Trains"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfFreightTrains"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfPassengerTrains">
                  Passenger Trains
                </Label>
                <AvField
                  name="number_of_passenger_trains"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Passenger Trains"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfPassengerTrains"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="freightRevenueGeneration">
                  Freight Revenue Generation
                </Label>
                <AvField
                  name="freight_revenue_generation"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Revenue Generated from Freight"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="freightRevenueGeneration"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="passengerRevenueGeneration">
                  Passenger Revenue Generation
                </Label>
                <AvField
                  name="passenger_revenue_generation"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Revenue Generated from Freight"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="passengerRevenueGeneration"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="passengerRevenueGeneration">
                  Passenger Revenue Generation
                </Label>
                <AvField
                  name="passenger_revenue_generation"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Revenue Generated from Freight"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="passengerRevenueGeneration"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="freightFuelConsumptionRate">
                  Freight Fuel Consumption
                </Label>
                <AvField
                  name="freight_fuel_consumption_rate"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Freight Fuel Consumption Rate"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="freightFuelConsumptionRate"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="passengerFuelConsumptionRate">
                  Passenger Fuel Consumption
                </Label>
                <AvField
                  name="passenger_fuel_consumption_rate"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Freight Fuel Consumption Rate"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="passengerFuelConsumptionRate"
                />
              </div>
            </Col>
          </Row>
        </div>
        <div className="modal-footer">
          <button
            type="button"
            onClick={() => {
              toggle();
            }}
            className="btn btn-success waves-effect"
            data-dismiss="modal"
          >
            Close
          </button>
          <button
            type="submit"
            className="btn btn-success waves-effect waves-light"
          >
            Save changes
          </button>
        </div>
      </AvForm>
    </Modal>
  );
};

AddRailwaysPassenger.propTypes = {
  onAddRailwaysPassenger: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ railwaysPassengers }) => {
  const { error, success } = railwaysPassengers;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddRailwaysPassenger: (values) => dispatch(addRailwaysPassenger(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddRailwaysPassenger);
