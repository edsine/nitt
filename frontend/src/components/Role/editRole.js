import React, { useEffect } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import {
  AvForm,
  AvField,
  AvCheckbox,
  AvCheckboxGroup,
} from "availity-reactstrap-validation";
import { editRole, getPermissions } from "../../store/actions";

const EditRole = (props) => {
  const {
    isOpen,
    setIsOpen,
    oldData,
    onEditUser,
    permissionsArray,
    onGetPermissions,
    error,
    success,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditUser(values, oldData.id);
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
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Edit Role
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
                  value={oldData?.name}
                  errorMessage="Enter a name"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="name"
                />
              </div>
            </Col>
            <Col md="12">
              <Row>
                <AvCheckboxGroup
                  name="permissions[]"
                  inline
                  value={oldData?.permissions}
                >
                  {permissionsArray?.map((permission, index) => (
                    <AvCheckbox
                      key={index}
                      label={permission}
                      value={permission}
                    />
                  ))}
                </AvCheckboxGroup>
              </Row>
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

EditRole.propTypes = {
  onEditUser: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
  onGetPermissions: PropTypes.func,
  rolesArray: PropTypes.array,
};

const mapStatetoProps = ({ roles, permissions }) => {
  const { error, success } = roles;
  const permissionsArray = Array.isArray(permissions.permissions)
    ? permissions.permissions
    : null;
  return { error, success, permissionsArray };
};

const mapDispatchToProps = (dispatch) => ({
  onEditUser: (values, id) => dispatch(editRole(values, id)),
  onGetPermissions: () => dispatch(getPermissions()),
});

export default connect(mapStatetoProps, mapDispatchToProps)(EditRole);
