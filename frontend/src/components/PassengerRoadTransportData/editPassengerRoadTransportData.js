import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editPassengerRoadTransportData } from "../../store/actions";

const EditPassengerRoadTransportData = (props) => {
  const { isOpen, setIsOpen, oldData } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    props.onEditPassengerRTD(values, oldData.id);
  };

  return (
    <Modal
      isOpen={isOpen}
      toggle={() => {
        toggle();
      }}
    >
      {props.error?.editError && props.error.editError ? (
        <Alert color="danger">{props.error?.editError}</Alert>
      ) : null}
      {props.success?.editSuccess && props.success?.editSuccess ? (
        <Alert color="success">{props.success?.editSuccess}</Alert>
      ) : null}
      <AvForm
        className="needs-validation"
        onValidSubmit={(e, v) => {
          handleValidSubmit(e, v);
        }}
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Edit Passenger Road Transport Data
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
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="year">Year</Label>
                <AvField
                  name="year"
                  placeholder=""
                  type="number"
                  value={oldData?.year}
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfPassengersCarried">
                  Passengers Carried
                </Label>
                <AvField
                  name="number_of_passengers_carried"
                  placeholder=""
                  type="number"
                  value={oldData?.number_of_passengers_carried}
                  errorMessage="Enter Number of Passengers Carried."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfPassengersCarried"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfVehiclesInFleet">
                  No. of Vehicles in Fleet
                </Label>
                <AvField
                  name="number_of_vehicles_in_fleet"
                  placeholder=""
                  type="number"
                  value={oldData?.number_of_vehicles_in_fleet}
                  errorMessage="Enter Number of Vehicles in Fleet."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfVehiclesInFleet"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="revenueFromOperation">
                  Revenue from Operation
                </Label>
                <AvField
                  name="revenue_from_operation"
                  placeholder=""
                  type="number"
                  value={oldData?.revenue_from_operation}
                  errorMessage="Enter Revenue from Operations"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="revenueFromOperation"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfEmployees">Number of Employees</Label>
                <AvField
                  name="number_of_employees"
                  placeholder=""
                  type="number"
                  value={oldData?.number_of_employees}
                  errorMessage="Enter Number of Employees"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfEmployees"
                />
              </div>
            </Col>
            <Col md="12">
              <div className="mb-3">
                <Label htmlFor="annualCostOfVehicleMaintenance">
                  Annual Cost of Vehicle Maintenance
                </Label>
                <AvField
                  name="annual_cost_of_vehicle_maintenance"
                  placeholder=""
                  type="number"
                  value={oldData?.annual_cost_of_vehicle_maintenance}
                  errorMessage="Enter Annual Cost of Vehicle Maintenance"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="annualCostOfVehicleMaintenance"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfAccidents">No. of Accidents</Label>
                <AvField
                  name="number_of_accidents"
                  placeholder=""
                  type="number"
                  value={oldData?.number_of_accidents}
                  errorMessage="Enter Number of Accidents"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfAccidents"
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

EditPassengerRoadTransportData.propTypes = {
  onEditPassengerRTD: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = (state) => {
  const { error, success } = state.roadTransportData;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditPassengerRTD: (values, id) =>
    dispatch(editPassengerRoadTransportData(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditPassengerRoadTransportData);
