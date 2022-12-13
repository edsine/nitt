import React, { useEffect } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addRole, getPermissions } from "../../store/actions";

const AddRole = (props) => {
  const {
    isOpen,
    setIsOpen,
    error,
    success,
    onAddRole,
    permissionsArray,
    onGetPermissions,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddRole(values);
  };

  useEffect(() => {
    onGetPermissions();
  }, [onGetPermissions]);

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
            Add Role
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
                <Label htmlFor="name">Name</Label>
                <AvField
                  name="name"
                  placeholder=""
                  type="text"
                  errorMessage="Enter a name"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="name"
                />
              </div>
            </Col>
            <Col md="12">
              {permissionsArray?.map((permission, index) => (
                <div key={index}>
                  <AvField
                    name="permissions[]"
                    placeholder=""
                    type="checkbox"
                    className="form-control"
                    validate={{ required: { value: true } }}
                    id="permissions"
                  ></AvField>
                  <span class="ml-2">
                    {permission.name}
                  </span>
                </div>
              ))}
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

AddRole.propTypes = {
  onAddRole: PropTypes.func,
  onGetPermissions: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ users, roles, permissions }) => {
  const { error, success } = users;
  const permissionsArray = Array.isArray(permissions.permissions)
    ? permissions.permissions
    : null;
  return { error, success, permissionsArray };
};

const mapDispatchToProps = (dispatch) => ({
  onAddRole: (values) => dispatch(addRole(values)),
  onGetPermissions: () => dispatch(getPermissions()),
});

export default connect(mapStatetoProps, mapDispatchToProps)(AddRole);
