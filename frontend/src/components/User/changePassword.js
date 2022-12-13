import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { changePassword } from "../../store/actions";

const ChangePassword = (props) => {
  const { isOpen, setIsOpen, oldData, onChangePassword, error, success } =
    props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onChangePassword(values, oldData.id);
  };

  return (
    <Modal
      isOpen={isOpen}
      toggle={() => {
        toggle();
      }}
    >
      {error?.changePasswordError && error.changePasswordError ? (
        <Alert color="danger">{error?.changePasswordError}</Alert>
      ) : null}
      {success?.changePasswordSuccess && success?.changePasswordSuccess ? (
        <Alert color="success">{success?.changePasswordSuccess}</Alert>
      ) : null}
      <AvForm
        className="needs-validation"
        onValidSubmit={(e, v) => {
          handleValidSubmit(e, v);
        }}
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Change Password
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
                <Label htmlFor="password">Password</Label>
                <AvField
                  name="password"
                  placeholder=""
                  type="password"
                  errorMessage="Enter a valid password"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="password"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="passwordConfirmation">Confirm Password</Label>
                <AvField
                  name="password_confirmation"
                  placeholder=""
                  type="password"
                  errorMessage="Please confirm your password."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="passwordConfirmation"
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

ChangePassword.propTypes = {
  onChangePassword: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ users, roles }) => {
  const { error, success } = users;
  const rolesArray = Array.isArray(roles.roles) ? roles.roles : null;
  return { error, success, rolesArray };
};

const mapDispatchToProps = (dispatch) => ({
  onChangePassword: (values, id) => dispatch(changePassword(values, id)),
});

export default connect(mapStatetoProps, mapDispatchToProps)(ChangePassword);
