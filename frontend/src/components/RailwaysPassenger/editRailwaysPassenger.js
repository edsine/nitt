import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editRailwaysPassenger } from "../../store/actions";
import YearOptions from "../yearOptions";

const EditRailwaysPassenger = (props) => {
  const {
    isOpen,
    setIsOpen,
    oldData,
    error,
    success,
    onEditRailwaysPassenger,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditRailwaysPassenger(values, oldData.id);
  };

  return (
    <Modal
      isOpen={isOpen}
      toggle={() => {
        toggle();
      }}
    >
      {error?.editError && error.editError ? (
        <Alert color="danger">{error?.editError}</Alert>
      ) : null}
      {success?.editSuccess && success?.editSuccess ? (
        <Alert color="success">{success?.editSuccess}</Alert>
      ) : null}
      <AvForm
        className="needs-validation"
        onValidSubmit={(e, v) => {
          handleValidSubmit(e, v);
        }}
        model={oldData}
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Edit Railways Passenger
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
                <Label htmlFor="numberOfPassengersCarried">
                  Passengers Carried
                </Label>
                <AvField
                  name="passengers_carried"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Passengers Carried."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfPassengersCarried"
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

EditRailwaysPassenger.propTypes = {
  onEditRailwaysPassenger: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ railwaysPassengers }) => {
  const { error, success } = railwaysPassengers;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditRailwaysPassenger: (values, id) =>
    dispatch(editRailwaysPassenger(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditRailwaysPassenger);
