import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addVehicleImportation } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddVehicleImportation = (props) => {
  const { isOpen, setIsOpen, error, success, onAddVehicleImportation } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddVehicleImportation(values);
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
            Add Vehicle Importation
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
                  type="select"
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                >
                  <option>Select</option>
                  <YearOptions></YearOptions>
                </AvField>
                {/* <AvField
                  name="year"
                  placeholder=""
                  type="number"
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                /> */}
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="vehicleCategory">Vehicle Category</Label>
                <AvField
                  name="vehicle_category"
                  placeholder=""
                  type="select"
                  errorMessage="Select Vehicle Category"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="vehicleCategory"
                >
                  <option>Select</option>
                  <option value={1}>Cars/SUVs</option>
                  <option value={2}>Buses</option>
                  <option value={3}>Trucks</option>
                </AvField>
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="newVehicleCount">New Vehicle Count</Label>
                <AvField
                  name="new_vehicle_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter New Vehicle Count."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="newVehicleCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="usedVehicleCount">Old Vehicle Count</Label>
                <AvField
                  name="used_vehicle_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Old Vehicle Count."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="usedVehicleCount"
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

AddVehicleImportation.propTypes = {
  onAddVehicleImportation: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ vehicleImportation }) => {
  const { error, success } = vehicleImportation;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddVehicleImportation: (values) => dispatch(addVehicleImportation(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddVehicleImportation);
