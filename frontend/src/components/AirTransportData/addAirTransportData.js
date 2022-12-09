import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addAirTransportData } from "../../store/actions";

const AddAirTransportData = (props) => {
  const { isOpen, setIsOpen, error, success, onAddAirTransportData } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddAirTransportData(values);
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
            Add Air Transport Data
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
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfDomesticRegisteredAirlines">
                  Domestic Registered Airlines
                </Label>
                <AvField
                  name="number_of_domestic_registered_airlines"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Domestic Registered Airlines."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfDomesticRegisteredAirlines"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfDomesticDeregisteredAirlines">
                  Domestic Deregistered Airlines
                </Label>
                <AvField
                  name="number_of_domestic_deregistered_airlines"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Domestic Deregistered Airlines."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfDomesticDeregisteredAirlines"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfInternationalRegisteredAirlines">
                  International Registered Airlines
                </Label>
                <AvField
                  name="number_of_international_registered_airlines"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of International Registered Airlines."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfInternationalRegisteredAirlines"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfInternationalDeregisteredAirlines">
                  International Deregistered Airlines
                </Label>
                <AvField
                  name="number_of_international_deregistered_airlines"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of International Deregistered Airlines."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfInternationalDeregisteredAirlines"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="numberOfNearAccidents">
                  No. of Near Accidents
                </Label>
                <AvField
                  name="number_of_near_accidents"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Near Accidents"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfNearAccidents"
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

AddAirTransportData.propTypes = {
  onAddAirTransportData: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = (state) => {
  const { error, success } = state.airTransportData;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddAirTransportData: (values) => dispatch(addAirTransportData(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddAirTransportData);
