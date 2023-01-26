import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addMaritimeAdministration } from "../../store/actions";

const AddMaritimeAdministration = (props) => {
  const { isOpen, setIsOpen, error, success, onAddMaritimeAdministration } =
    props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddMaritimeAdministration(values);
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
            Add Maritime Administration
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
                <Label htmlFor="nigerianSeaFearersCount">
                  No. of Nigerian Sea Fearers
                </Label>
                <AvField
                  name="nigerian_sea_fearers_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of Nigerian sea Fearers."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="nigerianSeaFearersCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="foreignSeaFearersCount">
                  No. of Foreign Sea Fearers
                </Label>
                <AvField
                  name="foreign_sea_fearers_count"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of foreign sea fearers."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="foreignSeaFearersCount"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfVesselsRegistered">
                  No. of Vessels Registered
                </Label>
                <AvField
                  name="number_of_vessels_registered"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of vessels registered"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfVesselsRegistered"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfShipsCabotage">
                  No. of Ships Cabotage
                </Label>
                <AvField
                  name="number_of_ships_cabotage"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of ships cabotage"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfShipsCabotage"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfAccidents">Accidents Count</Label>
                <AvField
                  name="number_of_accidents"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of accidents"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfAccidents"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfPiracyAttacks">
                  Piracy Attacks
                </Label>
                <AvField
                  name="number_of_piracy_attacks"
                  placeholder=""
                  type="number"
                  errorMessage="Enter number of piracy attacks"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfPiracyAttacks"
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

AddMaritimeAdministration.propTypes = {
  onAddMaritimeAdministration: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ maritimeAdministration }) => {
  const { error, success } = maritimeAdministration;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddMaritimeAdministration: (values) =>
    dispatch(addMaritimeAdministration(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddMaritimeAdministration);
