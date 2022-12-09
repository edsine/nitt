import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addUser } from "../../store/actions";

const AddUser = (props) => {
  const { isOpen, setIsOpen, error, success, onAddUser } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddUser(values);
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
            Add User
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
                <Label htmlFor="domesticPassengersTraffic">
                  Domestic Passenger Traffic
                </Label>
                <AvField
                  name="domestic_passengers_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Domestic Passenger Traffic."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="domesticPassengersTraffic"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="internationalPassengersTraffic">
                  International Passenger Traffic
                </Label>
                <AvField
                  name="international_passengers_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of International Passenger Traffic."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="internationalPassengersTraffic"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="domesticFreightTraffic">
                  Domestic Freight Traffic
                </Label>
                <AvField
                  name="domestic_freight_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Domestic Freight Traffic."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="domesticFreightTraffic"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="internationalFreightTraffic">
                  International Freight Traffic
                </Label>
                <AvField
                  name="international_freight_traffic"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of International Freight Traffic."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="internationalFreightTraffic"
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

AddUser.propTypes = {
  onAddUser: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ users }) => {
  const { error, success } = users;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddUser: (values) => dispatch(addUser(values)),
});

export default connect(mapStatetoProps, mapDispatchToProps)(AddUser);
