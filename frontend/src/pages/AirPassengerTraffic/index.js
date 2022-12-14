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
  getAirPassengerTraffic,
  deleteAirPassengerTraffic,
} from "../../store/actions";
import AddAirPassengerTraffic from "../../components/AirPassengerTraffic/addAirPassengerTraffic";
import EditAirPassengerTraffic from "../../components/AirPassengerTraffic/editAirPassengerTraffic";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const AirPassengerTraffic = (props) => {
  const {
    airPassengerTraffic,
    onGetAirPassengerTraffic,
    deleteAirPassengerTraffic,
    success,
    error,
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
    deleteAirPassengerTraffic(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = airPassengerTraffic.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetAirPassengerTraffic();
  }, [
    onGetAirPassengerTraffic,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);
  const trafficData = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Domestic Passenger Traffic",
        field: "domestic_passengers_traffic",
        sort: "asc",
        width: 270,
      },
      {
        label: "International Passenger Traffic",
        field: "international_passengers_traffic",
        sort: "asc",
        width: 200,
      },
      {
        label: "Domestic Freight Traffic/Ton",
        field: "domestic_freight_traffic",
        sort: "asc",
        width: 100,
      },
      {
        label: "International Freight Traffic/Ton",
        field: "international_freight_traffic",
        sort: "asc",
        width: 150,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: airPassengerTraffic?.map((item, index) => {
      item.action = (
        <TableAction
          id={airPassengerTraffic[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update air passengers traffic",
            delete: "delete air passengers traffic",
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
        <AddAirPassengerTraffic
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditAirPassengerTraffic
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs
          title="Air transport Data"
          breadcrumbItem="Transport data"
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
                  <CardTitle>Air Passenger Traffic</CardTitle>
                  {checkPermisssion("create air passengers traffic") && (
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

                <MDBDataTable responsive striped bordered data={trafficData} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

AirPassengerTraffic.propTypes = {
  airPassengerTraffic: PropTypes.array,
  onGetAirPassengerTraffic: PropTypes.func,
  deleteAirPassengerTraffic: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ airPassengerTraffic }) => ({
  airPassengerTraffic: Array.isArray(airPassengerTraffic.airPassengerTraffic)
    ? airPassengerTraffic.airPassengerTraffic
    : null,
  error: airPassengerTraffic.error,
  success: airPassengerTraffic.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetAirPassengerTraffic: () => dispatch(getAirPassengerTraffic()),
  deleteAirPassengerTraffic: (id) => dispatch(deleteAirPassengerTraffic(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(AirPassengerTraffic));
