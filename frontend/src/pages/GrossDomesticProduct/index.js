import React, { useEffect, useState } from "react";
import { MDBDataTable } from "mdbreact";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { withRouter } from "react-router-dom";

import {
  Row,
  Col,
  Card,
  CardBody,
  CardTitle,
  Alert,
  CardSubtitle,
  Button,
} from "reactstrap";
//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb";
import "../../assets/scss/datatables.scss";
import {
  getGrossDomesticProduct,
  deleteGrossDomesticProduct,
} from "../../store/actions";
import AddGrossDomesticProduct from "../../components/GrossDomesticProduct/addGrossDomesticProduct";
import BulkUploadGrossDomesticProduct from "../../components/GrossDomesticProduct/bulkUploadGrossDomesticProduct";
import EditGrossDomesticProduct from "../../components/GrossDomesticProduct/editGrossDomesticProduct";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const GrossDomesticProduct = (props) => {
  const {
    grossDomesticProduct,
    onGetGrossDomesticProduct,
    deleteGrossDomesticProduct,
    success,
    error,
  } = props;

  const [isAddModalOpen, setIsAddModalOpen] = useState(false);

  const [isBulkUploadModalOpen, setIsBulkUploadModalOpen] = useState(false);

  const [isEditModalOpen, setIsEditModalOpen] = useState(false);

  const [confirmAlert, setConfirmAlert] = useState(false);

  const [currentId, setCurrentId] = useState(0);

  const [currentEditData, setCurrentEditData] = useState(null);

  const OnDeleteClick = (id) => {
    setConfirmAlert(true);
    setCurrentId(id);
  };

  const handleDelete = () => {
    deleteGrossDomesticProduct(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = grossDomesticProduct.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetGrossDomesticProduct();
  }, [
    onGetGrossDomesticProduct,
    success?.bulkUploadSuccess,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const data = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Transportation and Storage",
        field: "transportation_and_storage",
        sort: "asc",
        width: 270,
      },
      {
        label: "Road Transport",
        field: "road_transport",
        sort: "asc",
        width: 200,
      },
      {
        label: "Rail Transport and Pipelines",
        field: "rail_transport_and_pipelines",
        sort: "asc",
        width: 100,
      },
      {
        label: "Water Transport",
        field: "water_transport",
        sort: "asc",
        width: 150,
      },
      {
        label: "Air Transport",
        field: "air_transport",
        sort: "asc",
        width: 100,
      },
      {
        label: "Transport Services",
        field: "transport_services",
        sort: "asc",
        width: 100,
      },
      {
        label: "Post and Courier Services",
        field: "post_and_courier_services",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: grossDomesticProduct?.map((item, index) => {
      item.action = (
        <TableAction
          id={grossDomesticProduct[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update gross domestic product",
            delete: "delete gross domestic product",
          }}
        />
      );
      return item;
    }),
  };

  const handleClick = () => {
    setIsAddModalOpen(true);
  };

  const handleUploadClick = () => {
    setIsBulkUploadModalOpen(true);
  };

  return (
    <React.Fragment>
      <div className="page-content">
        <AddGrossDomesticProduct
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <BulkUploadGrossDomesticProduct
          isOpen={isBulkUploadModalOpen}
          setIsOpen={setIsBulkUploadModalOpen}
        />
        <EditGrossDomesticProduct
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Gross Domestic Products" breadcrumbItem="GDP" />
        {confirmAlert && (
          <SweetAlert
            title="Are you sure?"
            warning
            showCancel
            confirmButtonText="Yes, delete it!"
            confirmBtnBsStyle="success"
            cancelBtnBsStyle="danger"
            onConfirm={() => {
              handleDelete();
            }}
            onCancel={() => setConfirmAlert(false)}
          >
            You won't be able to revert this!
          </SweetAlert>
        )}
        {error?.getError && error.getError ? (
          <Alert color="danger">{error?.getError}</Alert>
        ) : null}
        {error?.deleteError && error.deleteError ? (
          <Alert color="danger">{error?.deleteError}</Alert>
        ) : null}
        {success?.deleteSuccess && success?.deleteSuccess ? (
          <Alert color="success">{success?.deleteSuccess}</Alert>
        ) : null}

        <Row>
          <Col className="col-12">
            <Card>
              <CardBody>
                <div className="d-flex justify-content-between">
                  <CardTitle>Gross Domestic Product</CardTitle>
                  {checkPermisssion("create gross domestic product") && (
                    <div>
                      <Button
                        color="success"
                        className="btn btn-success waves-effect waves-light float-right"
                        onClick={() => handleClick()}
                      >
                        Add
                      </Button>
                      <Button
                        color="success"
                        className="btn btn-warning waves-effect waves-light float-right"
                        onClick={() => handleUploadClick()}
                      >
                        Upload
                      </Button>
                    </div>
                  )}
                </div>
                <CardSubtitle className="mb-3"></CardSubtitle>

                <MDBDataTable responsive striped bordered data={data} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

GrossDomesticProduct.propTypes = {
  grossDomesticProduct: PropTypes.array,
  onGetGrossDomesticProduct: PropTypes.func,
  deleteGrossDomesticProduct: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ grossDomesticProduct }) => ({
  grossDomesticProduct: Array.isArray(grossDomesticProduct.grossDomesticProduct)
    ? grossDomesticProduct.grossDomesticProduct
    : null,
  error: grossDomesticProduct.error,
  success: grossDomesticProduct.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetGrossDomesticProduct: () => dispatch(getGrossDomesticProduct()),
  deleteGrossDomesticProduct: (id) => dispatch(deleteGrossDomesticProduct(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(GrossDomesticProduct));
