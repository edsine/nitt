import React, { useEffect } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editUser, getRoles } from "../../store/actions";

const EditRole = (props) => {
  const {
    isOpen,
    setIsOpen,
    oldData,
    onEditUser,
    rolesArray,
    onGetRoles,
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
    onGetRoles();
  }, [onGetRoles]);

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
            Edit User
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
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="email">Email</Label>
                <AvField
                  name="email"
                  placeholder=""
                  type="email"
                  value={oldData?.email}
                  errorMessage="Enter a vaid email."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="email"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="role">Role</Label>
                <AvField
                  name="role"
                  placeholder=""
                  type="select"
                  errorMessage="Please select a role"
                  className="form-control"
                  value={oldData?.role}
                  validate={{ required: { value: true } }}
                  id="role"
                >
                  <option>Select</option>
                  {rolesArray?.map((role, index) => (
                    <option key={index} value={role.name}>
                      {role.name}
                    </option>
                  ))}
                </AvField>
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

EditRole.propTypes = {
  onEditUser: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
  onGetRoles: PropTypes.func,
  rolesArray: PropTypes.array,
};

const mapStatetoProps = ({ users, roles }) => {
  const { error, success } = users;
  const rolesArray = Array.isArray(roles.roles) ? roles.roles : null;
  return { error, success, rolesArray };
};

const mapDispatchToProps = (dispatch) => ({
  onEditUser: (values, id) => dispatch(editUser(values, id)),
  onGetRoles: () => dispatch(getRoles()),
});

export default connect(mapStatetoProps, mapDispatchToProps)(EditRole);
