import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { editMaritimeAcademy } from "../../store/actions";
import YearOptions from "../yearOptions";

const EditMaritimeAcademy = (props) => {
  const { isOpen, setIsOpen, oldData, error, success, onEditMaritimeAcademy } =
    props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onEditMaritimeAcademy(values, oldData.id);
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
            Edit Maritime Academy
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
                <Label htmlFor="numberOfStaff">Staff</Label>
                <AvField
                  name="number_of_staff"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Staff."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfStaff"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfAdmittedStudents">
                  Admitted Students
                </Label>
                <AvField
                  name="number_of_admitted_students"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Admitted Students"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfAdmittedStudents"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfGraduands">Graduands</Label>
                <AvField
                  name="number_of_graduands"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Graduands"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfGraduands"
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

EditMaritimeAcademy.propTypes = {
  onEditMaritimeAcademy: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ maritimeAcademy }) => {
  const { error, success } = maritimeAcademy;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onEditMaritimeAcademy: (values, id) =>
    dispatch(editMaritimeAcademy(values, id)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(EditMaritimeAcademy);
