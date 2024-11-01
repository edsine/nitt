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
  getMaritimeTransports,
  deleteMaritimeTransport,
} from "../../store/actions";
import AddMaritimeTransport from "../../components/MaritimeTransport/addMaritimeTransport";
import EditMaritimeTransport from "../../components/MaritimeTransport/editMaritimeTransport";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const MaritimeTransport = (props) => {
  const {
    maritimeTransports,
    onGetMaritimeTransports,
    deleteMaritimeTransport,
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
    deleteMaritimeTransport(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = maritimeTransports.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetMaritimeTransports();
  }, [
    onGetMaritimeTransports,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataMaritimeTransports = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Containers",
        field: "containers_count",
        sort: "asc",
        width: 270,
      },
      {
        label: "Cargo",
        field: "general_cargo_count",
        sort: "asc",
        width: 200,
      },
      {
        label: "Bulk Cargo",
        field: "bulk_cargo_count",
        sort: "asc",
        width: 100,
      },
      {
        label: "Tankers",
        field: "tankers_count",
        sort: "asc",
        width: 150,
      },
      {
        label: "Imported Containers",
        field: "containers_import_count",
        sort: "asc",
        width: 100,
      },
      {
        label: "Exported Containers",
        field: "containers_export_count",
        sort: "asc",
        width: 100,
      },
      {
        label: "General Cargo Tonnage",
        field: "general_cargo_tonnage",
        sort: "asc",
        width: 100,
      },
      {
        label: "Bulk Cargo Tonnage",
        field: "bulk_cargo_tonnage",
        sort: "asc",
        width: 100,
      },
      {
        label: "Accidents Recorded",
        field: "accidents_recorded",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: maritimeTransports?.map((item, index) => {
      item.action = (
        <TableAction
          id={maritimeTransports[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update maritime transport",
            delete: "delete maritime transport",
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
        <AddMaritimeTransport
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditMaritimeTransport
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Maritime" breadcrumbItem="Maritime Transport" />
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
                  <CardTitle>Maritime Transport</CardTitle>
                  {checkPermisssion("create maritime transport") && (
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
                  data={dataMaritimeTransports}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

MaritimeTransport.propTypes = {
  maritimeTransports: PropTypes.array,
  onGetMaritimeTransport: PropTypes.func,
  deleteMaritimeTransport: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ maritimeTransport }) => ({
  maritimeTransports: Array.isArray(maritimeTransport.maritimeTransports)
    ? maritimeTransport.maritimeTransports
    : null,
  error: maritimeTransport.error,
  success: maritimeTransport.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetMaritimeTransports: () => dispatch(getMaritimeTransports()),
  deleteMaritimeTransport: (id) => dispatch(deleteMaritimeTransport(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(MaritimeTransport));
