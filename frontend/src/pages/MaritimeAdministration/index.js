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
  getMaritimeAdministrations,
  deleteMaritimeAdministration,
} from "../../store/actions";
import AddMaritimeAdministration from "../../components/MaritimeAdministration/addMaritimeAdministration";
import EditMaritimeAdministration from "../../components/MaritimeAdministration/editMaritimeAdministration";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const MaritimeAdministration = (props) => {
  const {
    maritimeAdministrations,
    onGetMaritimeAdministrations,
    deleteMaritimeAdministration,
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
    deleteMaritimeAdministration(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = maritimeAdministrations.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetMaritimeAdministrations();
  }, [
    onGetMaritimeAdministrations,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataMaritimeAdministrations = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Nigerian Sea Fearers Count",
        field: "nigerian_sea_fearers_count",
        sort: "asc",
        width: 270,
      },
      {
        label: "Foreign Sea Fearers Count",
        field: "foreign_sea_fearers_count",
        sort: "asc",
        width: 200,
      },
      {
        label: "Vessels Registered",
        field: "number_of_vessels_registered",
        sort: "asc",
        width: 100,
      },
      {
        label: "Ships Cabotage",
        field: "number_of_ships_cabotage",
        sort: "asc",
        width: 150,
      },
      {
        label: "Accidents",
        field: "number_of_accidents",
        sort: "asc",
        width: 100,
      },
      {
        label: "Piracy Attacks",
        field: "number_of_piracy_attacks",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: maritimeAdministrations?.map((item, index) => {
      item.action = (
        <TableAction
          id={maritimeAdministrations[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update maritime administration",
            delete: "delete maritime administration",
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
        <AddMaritimeAdministration
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditMaritimeAdministration
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs
          title="Maritime"
          breadcrumbItem="Maritime Administration"
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
                  <CardTitle>Maritime Administration</CardTitle>
                  {checkPermisssion("create maritime administration") && (
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
                  data={dataMaritimeAdministrations}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

MaritimeAdministration.propTypes = {
  maritimeAdministrations: PropTypes.array,
  onGetMaritimeAdministration: PropTypes.func,
  deleteMaritimeAdministration: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ maritimeAdministration }) => ({
  maritimeAdministrations: Array.isArray(
    maritimeAdministration.maritimeAdministrations
  )
    ? maritimeAdministration.maritimeAdministrations
    : null,
  error: maritimeAdministration.error,
  success: maritimeAdministration.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetMaritimeAdministrations: () => dispatch(getMaritimeAdministrations()),
  deleteMaritimeAdministration: (id) =>
    dispatch(deleteMaritimeAdministration(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(MaritimeAdministration));
