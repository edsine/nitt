import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editTrainsPunctuality } from "../../store/actions";

const EditTrainsPunctuality = (props) => {
  const {
    isOpen,
    setIsOpen,
    oldData,
    error,
    success,
    onEditTrainsPunctuality,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditTrainsPunctuality(values, oldData.id);
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
            Edit Trains Punctuality
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
                  type="number"
                  errorMessage="Select a Year"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="year"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfTrainDelay">Train Delays</Label>
                <AvField
                  name="number_of_train_delay"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Train Delays."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfTrainDelay"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfLateArrival">Late Arrivals</Label>
                <AvField
                  name="number_of_late_arrival"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Late Arrivals"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfLateArrival"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfPromptArrival">Prompt Arrivals</Label>
                <AvField
                  name="number_of_prompt_arrival"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Prompt Arrivals"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfPromptArrival"
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

EditTrainsPunctuality.propTypes = {
  onEditTrainsPunctuality: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ trainsPunctuality }) => {
  const { error, success } = trainsPunctuality;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditTrainsPunctuality: (values, id) =>
    dispatch(editTrainsPunctuality(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditTrainsPunctuality);