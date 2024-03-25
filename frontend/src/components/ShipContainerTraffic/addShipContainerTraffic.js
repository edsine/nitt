import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addShipContainerTraffic } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddShipContainerTraffic = (props) => {
  const { isOpen, setIsOpen, error, success, onAddShipContainerTraffic } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddShipContainerTraffic(values);
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
            Add Ship Container Traffic
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

AddShipContainerTraffic.propTypes = {
  onAddShipContainerTraffic: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ shipContainerTraffic }) => {
  const { error, success } = shipContainerTraffic;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddShipContainerTraffic: (values) => dispatch(addShipContainerTraffic(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddShipContainerTraffic);
