import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addRollingStock } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddRollingStock = (props) => {
  const { isOpen, setIsOpen, error, success, onAddRollingStock } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddRollingStock(values);
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
            Add Rolling Stock
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
                <Label htmlFor="numberOfCoachesRollingStock">
                  No. of Coaches
                </Label>
                <AvField
                  name="number_of_coaches_rolling_stock"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Coaches."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfCoachesRollingStock"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="numberOfWagonRollingStock">
                  Regional Passengers Carried
                </Label>
                <AvField
                  name="number_of_wagon_rolling_stock"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Wagons."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="numberOfWagonRollingStock"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="averageLocoAvailability">Locomotives</Label>
                <AvField
                  name="average_loco_availability"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Locomotives available"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="averageLocoAvailability"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="averageCoachesMaintenanceCost">
                  Coaches Maintenance Cost
                </Label>
                <AvField
                  name="average_coaches_maintenance_cost"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Maintenance cost for Coaches"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="averageCoachesMaintenanceCost"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="averageWagonMaintenanceCost">
                  Wagon Maintenance Cost
                </Label>
                <AvField
                  name="average_wagon_maintenance_cost"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Maintenance cost for Wagons"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="averageWagonMaintenanceCost"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="annualAverageKmTravelCoaches">
                  Annual Average Travel (Coaches(km))
                </Label>
                <AvField
                  name="annual_average_km_travel_coaches"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Average Travel in Km for Coaches"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="annualAverageKmTravelCoaches"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="annualAverageKmTravelWagon">
                  Annual Average Travel (Wagon(km))
                </Label>
                <AvField
                  name="annual_average_km_travel_wagon"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Average Travel in Km for Wagon"
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="annualAverageKmTravelWagon"
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

AddRollingStock.propTypes = {
  onAddRollingStock: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ rollingStock }) => {
  const { error, success } = rollingStock;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddRollingStock: (values) => dispatch(addRollingStock(values)),
});

export default connect(mapStatetoProps, mapDispatchToProps)(AddRollingStock);
