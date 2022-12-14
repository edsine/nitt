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
  getFreightRoadTransportData,
  deleteFreightRoadTransportData,
} from "../../store/actions";
import AddFreightRoadTransportData from "../../components/FreightRoadTransportData/addFreightRoadTransportData";
import EditFreightRoadTransportData from "../../components/FreightRoadTransportData/editFreightRoadTransportData";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const FreightRoadTransportData = (props) => {
  const { freightRTD, onGetFreightRTD, deleteFreightRTD, error, success } =
    props;

  const [isAddModalOpen, setIsAddModalOpen] = useState(false);

  const [isEditModalOpen, setIsEditModalOpen] = useState(false);

  const [confirmAlert, setConfirmAlert] = useState(false);

  const [currentId, setCurrentId] = useState(0);

  const [currentEditData, setCurrentEditData] = useState(null);

  const OnDeleteClick = (id) => {
    setConfirmAlert(true);
    setCurrentId(id);
  };

  const handleDelete = () => {
    deleteFreightRTD(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = freightRTD.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetFreightRTD();
  }, [
    onGetFreightRTD,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataFreight = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "No of Tonnes carried",
        field: "number_of_tonnes_carried",
        sort: "asc",
        width: 270,
      },
      {
        label: "No of Vehicle in fleet",
        field: "number_of_vehicles_in_fleet",
        sort: "asc",
        width: 200,
      },
      {
        label: "Revenue from operation",
        field: "revenue_from_operation",
        sort: "asc",
        width: 100,
      },
      {
        label: "No. of Employee",
        field: "number_of_employees",
        sort: "asc",
        width: 150,
      },
      {
        label: "Annual cost of vehicle maintenance",
        field: "annual_cost_of_vehicle_maintenance",
        sort: "asc",
        width: 100,
      },
      {
        label: "No. of Accident",
        field: "number_of_accidents",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: freightRTD?.map((item, index) => {
      item.action = (
        <TableAction
          id={freightRTD[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update freight road transport data",
            delete: "delete freight road transport data",
          }}
        />
      );
      return item;
    }),
  };

  const handleClick = () => {
    setIsAddModalOpen(true);
  };

  return (
    <React.Fragment>
      <div className="page-content">
        <AddFreightRoadTransportData
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditFreightRoadTransportData
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Road transport Data" breadcrumbItem="Freight" />
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
                  <CardTitle>Road transport data (Freight)</CardTitle>
                  {checkPermisssion("create freight road transport data") && (
                    <Button
                      color="success"
                      className="btn btn-success waves-effect waves-light float-right"
                      onClick={() => handleClick()}
                    >
                      Add
                    </Button>
                  )}
                </div>
                <CardSubtitle className="mb-3"></CardSubtitle>

                <MDBDataTable responsive striped bordered data={dataFreight} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

FreightRoadTransportData.propTypes = {
  freightRTD: PropTypes.array,
  onGetFreightRTD: PropTypes.func,
  deleteFreightRTD: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ roadTransportData }) => ({
  freightRTD: Array.isArray(roadTransportData.freightRTD)
    ? roadTransportData.freightRTD
    : null,
  error: roadTransportData.error,
  success: roadTransportData.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetFreightRTD: () => dispatch(getFreightRoadTransportData()),
  deleteFreightRTD: (id) => dispatch(deleteFreightRoadTransportData(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(FreightRoadTransportData));
