import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addMaritimeTransport } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddMaritimeTransport = (props) => {
  const { isOpen, setIsOpen, error, success, onAddMaritimeTransport } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddMaritimeTransport(values);
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
            Add Maritime Transport
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
                <Label htmlFor="containersCount">No. of Containers</Label>
                <AvField
                  name="containers_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Containers."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="containersCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="generalCargoCount">No. of Cargos</Label>
                <AvField
                  name="general_cargo_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Cargos."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="generalCargoCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="bulkCargoCount">No. of Bulk Cargos</Label>
                <AvField
                  name="bulk_cargo_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Bulk Cargos"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="bulkCargoCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="tankersCount">No. of Tankers</Label>
                <AvField
                  name="tankers_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Tankers"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="tankersCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="containersImportCount">
                  Imported Containers
                </Label>
                <AvField
                  name="containers_import_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of imported containers"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="containersImportCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="containersExportCount">
                  Exported Containers
                </Label>
                <AvField
                  name="containers_export_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of exported containers"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="containersExportCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="generalCargoTonnage">
                  General Cargo Tonnage
                </Label>
                <AvField
                  name="general_cargo_tonnage"
                  placeholder=""
                  type="number"
                  errorMessage="Enter the general cargo tonnage value"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="generalCargoTonnage"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="bulkCargoTonnage">Bulk Cargo Tonnage</Label>
                <AvField
                  name="bulk_cargo_tonnage"
                  placeholder=""
                  type="number"
                  errorMessage="Enter the bulk cargo tonnage value"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="bulkCargoTonnage"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="accidentsRecorded">Accidents recorded</Label>
                <AvField
                  name="accidents_recorded"
                  placeholder=""
                  type="number"
                  errorMessage="Enter the accidents recorded count"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="accidentsRecorded"
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

AddMaritimeTransport.propTypes = {
  onAddMaritimeTransport: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ maritimeTransport }) => {
  const { error, success } = maritimeTransport;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddMaritimeTransport: (values) => dispatch(addMaritimeTransport(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddMaritimeTransport);
