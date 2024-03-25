import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editShipContainerTraffic } from "../../store/actions";
import YearOptions from "../yearOptions";

const EditShipContainerTraffic = (props) => {
  const {
    isOpen,
    setIsOpen,
    oldData,
    error,
    success,
    onEditShipContainerTraffic,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditShipContainerTraffic(values, oldData.id);
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
            Edit Ship Container Traffic
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
                <Label htmlFor="ship_traffic">
                  Ship Traffic (No. of Vessels)
                </Label>
                <AvField
                  name="ship_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Ship Traffic (No. of Vessels)."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="ship_traffic"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="container_traffic">
                  Container Traffic (Tonnes)
                </Label>
                <AvField
                  name="container_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Container Traffic (Tonnes)"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="container_traffic"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="cargo_throughput">
                  Cargo Throughput (Tonnes)
                </Label>
                <AvField
                  name="cargo_throughput"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Cargo Throughput (Tonnes)"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="cargo_throughput"
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

EditShipContainerTraffic.propTypes = {
  onEditShipContainerTraffic: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ railwaysPassengers }) => {
  const { error, success } = railwaysPassengers;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditShipContainerTraffic: (values, id) =>
    dispatch(editShipContainerTraffic(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditShipContainerTraffic);
