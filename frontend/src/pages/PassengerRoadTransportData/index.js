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
  getPassengerRoadTransportData,
  deletePassengerRoadTransportData,
} from "../../store/roadtransportdata/actions";
import AddPassengerRoadTransportData from "../../components/PassengerRoadTransportData/addPassengerRoadTransportData";
import EditPassengerRoadTransportData from "../../components/PassengerRoadTransportData/editPassengerRoadTransportData";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";

const PassengerRoadTransportData = (props) => {
  const {
    passengersRTD,
    onGetPassengerRTD,
    deletePassengerRTD,
  } = props;

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
    deletePassengerRTD(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = passengersRTD.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetPassengerRTD();
  }, [
    onGetPassengerRTD,
    props.success?.addSuccess,
    props.success?.editSuccess,
    props.success?.deleteSuccess,
  ]);

  const dataPassengers = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "No of Passengers carried",
        field: "number_of_passengers_carried",
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
    rows: passengersRTD?.map((item, index) => {
      item.action = (
        <TableAction
          id={passengersRTD[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
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
        <AddPassengerRoadTransportData
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditPassengerRoadTransportData
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs
          title="Road transport Data"
          breadcrumbItem="Passenger"
        />
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
        {props.error?.deleteError && props.error.deleteError ? (
          <Alert color="danger">{props.error?.deleteError}</Alert>
        ) : null}
        {props.success?.deleteSuccess && props.success?.deleteSuccess ? (
          <Alert color="success">{props.success?.deleteSuccess}</Alert>
        ) : null}
        <Row>
          <Col lg={12}>
            <Card>
              <CardBody>
                <CardTitle>
                  Road transport data (Passengers){" "}
                  <Button
                    color="success"
                    className="btn btn-success waves-effect waves-light"
                    onClick={() => handleClick()}
                  >
                    Add
                  </Button>{" "}
                </CardTitle>
                <CardSubtitle className="mb-3"></CardSubtitle>
                <MDBDataTable
                  responsive
                  striped
                  bordered
                  data={dataPassengers}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

PassengerRoadTransportData.propTypes = {
  passengersRTD: PropTypes.array,
  onGetPassengerRTD: PropTypes.func,
  deletePassengerRTD: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ roadTransportData }) => ({
  passengersRTD: roadTransportData.passengersRTD,
  error: roadTransportData.error,
  success: roadTransportData.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetPassengerRTD: () => dispatch(getPassengerRoadTransportData()),
  deletePassengerRTD: (id) => dispatch(deletePassengerRoadTransportData(id))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(PassengerRoadTransportData));
