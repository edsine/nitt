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
import { getRollingStocks, deleteRollingStock } from "../../store/actions";
import AddRollingStock from "../../components/RollingStock/addRollingStock";
import EditRollingStock from "../../components/RollingStock/editRollingStock";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const RollingStocks = (props) => {
  const {
    rollingStocks,
    onGetRollingStocks,
    deleteRollingStock,
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
    deleteRollingStock(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = rollingStocks.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetRollingStocks();
  }, [
    onGetRollingStocks,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataRollingStocks = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Coaches",
        field: "number_of_coaches_rolling_stock",
        sort: "asc",
        width: 270,
      },
      {
        label: "Wagon",
        field: "number_of_wagon_rolling_stock",
        sort: "asc",
        width: 200,
      },
      {
        label: "Loco",
        field: "average_loco_availability",
        sort: "asc",
        width: 100,
      },
      {
        label: "Coaches Maintenance Cost",
        field: "average_coaches_maintenance_cost",
        sort: "asc",
        width: 150,
      },
      {
        label: "Wagon Maintenance Cost",
        field: "average_wagon_maintenance_cost",
        sort: "asc",
        width: 100,
      },
      {
        label: "Annual Average Travel (Coaches(km))",
        field: "annual_average_km_travel_coaches",
        sort: "asc",
        width: 100,
      },
      {
        label: "Annual Average Travel (Wagon(km))",
        field: "annual_average_km_travel_wagon",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: rollingStocks?.map((item, index) => {
      item.action = (
        <TableAction
          id={rollingStocks[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update railway rolling stock",
            delete: "delete railway rolling stock",
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
        <AddRollingStock
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditRollingStock
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Rolling Stock" breadcrumbItem="Wagon and Coaches" />
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
                  <CardTitle>Rolling Stock</CardTitle>
                  {checkPermisssion("create railway rolling stock") && (
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
                <MDBDataTable
                  responsive
                  striped
                  bordered
                  data={dataRollingStocks}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

RollingStocks.propTypes = {
  rollingStocks: PropTypes.array,
  onGetRollingStock: PropTypes.func,
  deleteRollingStock: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ rollingStock }) => ({
  rollingStocks: Array.isArray(rollingStock.rollingStocks)
    ? rollingStock.rollingStocks
    : null,
  error: rollingStock.error,
  success: rollingStock.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetRollingStocks: () => dispatch(getRollingStocks()),
  deleteRollingStock: (id) => dispatch(deleteRollingStock(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(RollingStocks));
