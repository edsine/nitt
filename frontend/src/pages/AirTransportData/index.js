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
  getAirTransportData,
  deleteAirTransportData,
} from "../../store/airtransportdata/actions";
import AddAirTransportData from "../../components/AirTransportData/addAirTransportData";
import EditAirTransportData from "../../components/AirTransportData/editAirTransportData";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";

const AirTransportData = (props) => {
  const {
    airTransportData,
    onGetAirTransportData,
    deleteAirTransportData,
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
    deleteAirTransportData(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = airTransportData.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetAirTransportData();
  }, [
    onGetAirTransportData,
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
        label: "Domestic Registered Airlines",
        field: "number_of_domestic_registered_airlines",
        sort: "asc",
        width: 270,
      },
      {
        label: "International Registered Airlines",
        field: "number_of_international_registered_airlines",
        sort: "asc",
        width: 200,
      },
      {
        label: "Domestic Deregistered Airlines",
        field: "number_of_domestic_deregistered_airlines",
        sort: "asc",
        width: 100,
      },
      {
        label: "International Deregistered Airlines",
        field: "number_of_international_deregistered_airlines",
        sort: "asc",
        width: 150,
      },
      {
        label: "Near Air Accidents",
        field: "number_of_near_accidents",
        sort: "asc",
        width: 100,
      },
      {
        label: "Air Accidents",
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
    rows: airTransportData?.map((item, index) => {
      item.action = (
        <TableAction
          id={airTransportData[index].id}
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
        <AddAirTransportData
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditAirTransportData
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
                <CardTitle>
                  Air transport data
                  <Button
                    color="success"
                    className="btn btn-success waves-effect waves-light"
                    onClick={() => handleClick()}
                  >
                    Add
                  </Button>{" "}
                </CardTitle>
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

AirTransportData.propTypes = {
  airTransportData: PropTypes.array,
  onGetAirTransportData: PropTypes.func,
  deleteAirTransportData: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ airTransportData }) => ({
  airTransportData: airTransportData.airTransportData,
  error: airTransportData.error,
  success: airTransportData.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetAirTransportData: () => dispatch(getAirTransportData()),
  deleteAirTransportData: (id) => dispatch(deleteAirTransportData(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(AirTransportData));
