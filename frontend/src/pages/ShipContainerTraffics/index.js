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
  CardSubtitle,
  Button,
  Alert,
} from "reactstrap";

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb";
import "../../assets/scss/datatables.scss";
import {
  getShipContainerTraffics,
  deleteShipContainerTraffic,
} from "../../store/actions";
import AddShipContainerTraffic from "../../components/ShipContainerTraffic/addShipContainerTraffic";
import BulkUploadShipContainerTraffic from "../../components/ShipContainerTraffic/bulkUploadShipContainerTraffic";
import EditShipContainerTraffic from "../../components/ShipContainerTraffic/editShipContainerTraffic";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const ShipContainerTraffics = (props) => {
  const {
    shipContainerTraffics,
    onGetShipContainerTraffics,
    deleteShipContainerTraffic,
    error,
    success,
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
    deleteShipContainerTraffic(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = shipContainerTraffics.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetShipContainerTraffics();
  }, [
    onGetShipContainerTraffics,
    success?.bulkUploadSuccess,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataShipContainerTraffics = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Ship Traffic (No. of Vessels)",
        field: "ship_traffic",
        sort: "asc",
        width: 200,
      },
      {
        label: "Container Traffic (TEU)",
        field: "container_traffic",
        sort: "asc",
        width: 100,
      },
      {
        label: "Cargo Throughput (Tonnes)",
        field: "cargo_throughput",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: shipContainerTraffics?.map((item, index) => {
      item.action = (
        <TableAction
          id={shipContainerTraffics[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update ship container traffic",
            delete: "delete ship container traffic",
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
        <AddShipContainerTraffic
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <BulkUploadShipContainerTraffic
          isOpen={isBulkUploadModalOpen}
          setIsOpen={setIsBulkUploadModalOpen}
        />
        <EditShipContainerTraffic
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Ship & Container" breadcrumbItem="Traffic" />
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
          <Col lg={12}>
            <Card>
              <CardBody>
                <div className="d-flex justify-content-between">
                  <CardTitle>
                    National Ship Traffic, Container Traffic and Cargo
                    Throughput{" "}
                  </CardTitle>
                  {checkPermisssion("create ship container traffic") && (
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
                <MDBDataTable
                  responsive
                  striped
                  bordered
                  data={dataShipContainerTraffics}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

ShipContainerTraffics.propTypes = {
  shipContainerTraffics: PropTypes.array,
  onGetShipContainerTraffic: PropTypes.func,
  deleteShipContainerTraffic: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ shipContainerTraffic }) => {
  return {
    shipContainerTraffics: Array.isArray(
      shipContainerTraffic.shipContainerTraffics
    )
      ? shipContainerTraffic.shipContainerTraffics
      : null,
    error: shipContainerTraffic.error,
    success: shipContainerTraffic.success,
  };
};

const mapDispatchToProps = (dispatch) => ({
  onGetShipContainerTraffics: () => dispatch(getShipContainerTraffics()),
  deleteShipContainerTraffic: (id) => dispatch(deleteShipContainerTraffic(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(ShipContainerTraffics));
