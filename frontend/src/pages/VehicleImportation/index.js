import React, { useState, useEffect } from "react";
import { MDBDataTable } from "mdbreact";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { withRouter } from "react-router-dom";

import { Row, Col, Card, CardBody, CardTitle, Button, Alert } from "reactstrap";

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb";
import "../../assets/scss/datatables.scss";
import {
  deleteVehicleImportation,
  getVehicleImportations,
} from "../../store/actions";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import AddVehicleImportation from "../../components/VehicleImportation/addVehicleImportation";
import EditVehicleImportation from "../../components/VehicleImportation/editVehicleImportation";
import { checkPermisssion } from "../../helpers/check_permission";

const VehicleImportation = (props) => {
  const {
    vehicleImportations,
    onGetVehicleImportations,
    deleteVehicleImportation,
    error,
    success,
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
    deleteVehicleImportation(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = vehicleImportations.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetVehicleImportations();
  }, [
    onGetVehicleImportations,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);
  const data = {
    columns: [
      {
        label: "Vehicle Category",
        field: "vehicle_category_name",
        sort: "asc",
        width: 150,
      },
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "New Vehicles",
        field: "new_vehicle_count",
        sort: "asc",
        width: 150,
      },
      {
        label: "Used Vehicles",
        field: "used_vehicle_count",
        sort: "asc",
        width: 150,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: vehicleImportations?.map((item, index) => {
      item.action = (
        <TableAction
          id={vehicleImportations[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update vehicle importation",
            delete: "delete vehicle importation",
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
        <AddVehicleImportation
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditVehicleImportation
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Vehicle Importation" breadcrumbItem="Vehicles" />
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
                <CardTitle></CardTitle>
                <div className="d-flex justify-content-between">
                  <CardTitle>
                    Analysis of Vehicle Importation to Nigeria{" "}
                  </CardTitle>
                  {checkPermisssion("create vehicle importation") && (
                    <Button
                      color="success"
                      className="btn btn-success waves-effect waves-light float-right"
                      onClick={() => handleClick()}
                    >
                      Add
                    </Button>
                  )}
                </div>

                <MDBDataTable responsive striped bordered data={data} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

VehicleImportation.propTypes = {
  vehicleImportations: PropTypes.array,
  onGetVehicleImportations: PropTypes.func,
  deleteVehicleImportation: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ vehicleImportation }) => ({
  vehicleImportations: Array.isArray(vehicleImportation.vehicleImportations)
    ? vehicleImportation.vehicleImportations
    : null,
  error: vehicleImportation.error,
  success: vehicleImportation.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetVehicleImportations: () => dispatch(getVehicleImportations()),
  deleteVehicleImportation: (id) => dispatch(deleteVehicleImportation(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(VehicleImportation));
