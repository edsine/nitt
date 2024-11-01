import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Label, Alert } from "reactstrap";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { addGrossDomesticProduct } from "../../store/actions";
import YearOptions from "../yearOptions";

const AddGrossDomesticProduct = (props) => {
  const { isOpen, setIsOpen, error, success, onAddGrossDomesticProduct } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    onAddGrossDomesticProduct(values);
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
            Add Gross Domestic Product
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
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="transportation_and_storage">
                  Transportation and Storage
                </Label>
                <AvField
                  name="transportation_and_storage"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number for Tansportation and Storage."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="transportation_and_storage"
                />
              </div>
            </Col>
            <Col md="6">
              <div className="mb-3">
                <Label htmlFor="road_transport">Road Transport</Label>
                <AvField
                  name="road_transport"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number for Road Transport."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="road_transport"
                />
              </div>
            </Col>
          </Row>
          <Row>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="rail_transport_and_pipelines">
                  Rail Transport and Pipelines
                </Label>
                <AvField
                  name="rail_transport_and_pipelines"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number for Rail Transport and Pipelines."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="rail_transport_and_pipelines"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="water_transport">Water Transport</Label>
                <AvField
                  name="water_transport"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Water Transport."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="water_transport"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="air_transport">Air Transport</Label>
                <AvField
                  name="air_transport"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Air Transport."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="air_transport"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="transport_services">Transport Services</Label>
                <AvField
                  name="transport_services"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Transport Services."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="transport_services"
                />
              </div>
            </Col>
            <Col md="4">
              <div className="mb-3">
                <Label htmlFor="post_and_courier_services">Post and Courier Services</Label>
                <AvField
                  name="post_and_courier_services"
                  placeholder=""
                  type="number"
                  errorMessage="Enter Number of Post and Courier Services."
                  className="form-control"
                  validate={{ required: { value: true } }}
                  id="post_and_courier_services"
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

AddGrossDomesticProduct.propTypes = {
  onAddGrossDomesticProduct: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ grossDomesticProduct }) => {
  const { error, success } = grossDomesticProduct;
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onAddGrossDomesticProduct: (values) =>
    dispatch(addGrossDomesticProduct(values)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(AddGrossDomesticProduct);
