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
  getRailwaysPassengers,
  deleteRailwaysPassenger,
} from "../../store/actions";
import AddRailwaysPassenger from "../../components/RailwaysPassenger/addRailwaysPassenger";
import BulkUploadRailwaysPassenger from "../../components/RailwaysPassenger/bulkUploadRailwaysPassenger";
import EditRailwaysPassenger from "../../components/RailwaysPassenger/editRailwaysPassenger";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const RailwaysPassengers = (props) => {
  const {
    railwaysPassengers,
    onGetRailwaysPassengers,
    deleteRailwaysPassenger,
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
    deleteRailwaysPassenger(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = railwaysPassengers.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetRailwaysPassengers();
  }, [
    onGetRailwaysPassengers,
    success?.bulkUploadSuccess,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataRailwaysPassengers = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      // {
      //   label: "Urban Passengers carried",
      //   field: "number_of_urban_passengers_carried",
      //   sort: "asc",
      //   width: 270,
      // },
      // {
      //   label: "Regional Passengers carried",
      //   field: "number_of_regional_passengers_carried",
      //   sort: "asc",
      //   width: 200,
      // },
      {
        label: "Passengers carried",
        field: "passengers_carried",
        sort: "asc",
        width: 200,
      },
      {
        label: "Freight Carried",
        field: "freight_carried",
        sort: "asc",
        width: 100,
      },
      // {
      //   label: "Freight Trains",
      //   field: "number_of_freight_trains",
      //   sort: "asc",
      //   width: 150,
      // },
      // {
      //   label: "Passenger Trains",
      //   field: "number_of_passenger_trains",
      //   sort: "asc",
      //   width: 100,
      // },
      {
        label: "Passenger Revenue Generation",
        field: "passenger_revenue_generation",
        sort: "asc",
        width: 100,
      },
      {
        label: "Freight Revenue Generation",
        field: "freight_revenue_generation",
        sort: "asc",
        width: 100,
      },
      // {
      //   label: "Passenger Fuel Consumption",
      //   field: "passenger_fuel_consumption_rate",
      //   sort: "asc",
      //   width: 100,
      // },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: railwaysPassengers?.map((item, index) => {
      item.action = (
        <TableAction
          id={railwaysPassengers[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update railway passenger",
            delete: "delete railway passenger",
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

  const handleDownloadSample = () => {
    const fileUrl =
      process.env.PUBLIC_URL + "/excel_samples/rail_passenger_freight.xlsx";

    const link = document.createElement("a");
    link.href = fileUrl;
    link.download = "rail_passenger_freight_sample.xlsx";

    document.body.appendChild(link);

    link.click();

    document.body.removeChild(link);
  };

  return (
    <React.Fragment>
      <div className="page-content">
        <AddRailwaysPassenger
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <BulkUploadRailwaysPassenger
          isOpen={isBulkUploadModalOpen}
          setIsOpen={setIsBulkUploadModalOpen}
        />
        <EditRailwaysPassenger
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Railways" breadcrumbItem="Passenger" />
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
                  <CardTitle>Railways Passengers/Freight</CardTitle>
                  {checkPermisssion("create railway passenger") && (
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
                      <Button
                        color="secondary"
                        className="btn btn-secondary waves-effect waves-light float-right"
                        onClick={() => handleDownloadSample()}
                      >
                        Downlaod Sample
                      </Button>
                    </div>
                  )}
                </div>
                <CardSubtitle className="mb-3"></CardSubtitle>
                <MDBDataTable
                  responsive
                  striped
                  bordered
                  data={dataRailwaysPassengers}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

RailwaysPassengers.propTypes = {
  railwaysPassengers: PropTypes.array,
  onGetRailwaysPassenger: PropTypes.func,
  deleteRailwaysPassenger: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ railwaysPassengers }) => ({
  railwaysPassengers: Array.isArray(railwaysPassengers.railwaysPassengers)
    ? railwaysPassengers.railwaysPassengers
    : null,
  error: railwaysPassengers.error,
  success: railwaysPassengers.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetRailwaysPassengers: () => dispatch(getRailwaysPassengers()),
  deleteRailwaysPassenger: (id) => dispatch(deleteRailwaysPassenger(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(RailwaysPassengers));
