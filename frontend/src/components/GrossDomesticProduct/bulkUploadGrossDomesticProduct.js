import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Modal, Row, Col, Alert } from "reactstrap";
import { AvForm, AvInput } from "availity-reactstrap-validation";
import { bulkUploadGrossDomesticProduct } from "../../store/actions";

const BulkUploadGrossDomesticProduct = (props) => {
  const {
    isOpen,
    setIsOpen,
    error,
    success,
    onBulkUploadGrossDomesticProduct,
  } = props;

  const removeBodyCss = () => {
    document.body.classList.add("no_padding");
  };
  const toggle = () => {
    setIsOpen(!isOpen);
    removeBodyCss();
  };

  const handleValidSubmit = (event, values) => {
    const file = event.target.file?.files[0];
    const data = new FormData();
    data.append("file", file);
    onBulkUploadGrossDomesticProduct(data);
  };

  return (
    <Modal
      isOpen={isOpen}
      toggle={() => {
        toggle();
      }}
    >
      {error?.bulkUploadError && error.bulkUploadError ? (
        <Alert color="danger">{error?.bulkUploadError}</Alert>
      ) : null}
      {success?.bulkUploadSuccess && success?.bulkUploadSuccess ? (
        <Alert color="success">{success?.bulkUploadSuccess}</Alert>
      ) : null}
      <AvForm
        className="needs-validation"
        onValidSubmit={(e, v) => {
          handleValidSubmit(e, v);
        }}
      >
        <div className="modal-header">
          <h5 className="modal-title mt-0" id="myModalLabel">
            Bulk Upload for Gross Domestic Product
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
            <Col>
              <div className="form-group">
                <Row>
                  <Col md="6">
                    <div className="input-group">
                      <AvInput
                        type="file"
                        name="file"
                        className="form-control"
                        id="file"
                        required
                        accept="xlsx"
                      />
                    </div>
                  </Col>
                </Row>
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

BulkUploadGrossDomesticProduct.propTypes = {
  onBulkUploadGrossDomesticProduct: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ grossDomesticProduct }) => {
  const { error, success } = grossDomesticProduct;
  console.log(grossDomesticProduct);
  return { error, success };
};

const mapDispatchToProps = (dispatch) => ({
  onBulkUploadGrossDomesticProduct: (data) =>
    dispatch(bulkUploadGrossDomesticProduct(data)),
});

export default connect(
  mapStatetoProps,
  mapDispatchToProps
)(BulkUploadGrossDomesticProduct);
