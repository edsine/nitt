import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editVehicleImportation } from "../../store/actions";

const EditVehicleImportation = (props) => {
  const { isOpen, setIsOpen, oldData, onEditVehicleImportation, error, success } =
    props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditVehicleImportation(values, oldData.id);
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
            Edit Vehicle Importation
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

EditVehicleImportation.propTypes = {
  onEditVehicleImportation: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ vehicleImportation }) => {
  const { error, success } = vehicleImportation;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditVehicleImportation: (values, id) =>
    dispatch(editVehicleImportation(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditVehicleImportation);
