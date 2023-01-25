import React, { useEffect, useState } from "react";
import { MDBDataTable } from "mdbreact";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { withRouter } from "react-router-dom";

//

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
  getMaritimeAcademies,
  deleteMaritimeAcademy,
} from "../../store/actions";
import AddMaritimeAcademy from "../../components/MaritimeAcademy/addMaritimeAcademy";
import EditMaritimeAcademy from "../../components/MaritimeAcademy/editMaritimeAcademy";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const MaritimeAcademy = (props) => {
  const {
    maritimeAcademies,
    onGetMaritimeAcademies,
    deleteMaritimeAcademy,
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
    deleteMaritimeAcademy(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = maritimeAcademies.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetMaritimeAcademies();
  }, [
    onGetMaritimeAcademies,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataMaritimeAcademies = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Number of Staff",
        field: "number_of_staff",
        sort: "asc",
        width: 270,
      },
      {
        label: "Number of Admitted Students",
        field: "number_of_admitted_students",
        sort: "asc",
        width: 200,
      },
      {
        label: "Number of Graduands",
        field: "number_of_graduands",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: maritimeAcademies?.map((item, index) => {
      item.action = (
        <TableAction
          id={maritimeAcademies[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update maritime academy",
            delete: "delete maritime academy",
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
        <AddMaritimeAcademy
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditMaritimeAcademy
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Maritime" breadcrumbItem="Academy" />
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
                  <CardTitle>Maritime Academy</CardTitle>
                  {checkPermisssion("create maritime academy") && (
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
                  data={dataMaritimeAcademies}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

MaritimeAcademy.propTypes = {
  maritimeAcademies: PropTypes.array,
  onGetMaritimeAcademies: PropTypes.func,
  deleteMaritimeAcademy: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ maritimeAcademy }) => ({
  maritimeAcademies: Array.isArray(maritimeAcademy.maritimeAcademies)
    ? maritimeAcademy.maritimeAcademies
    : null,
  error: maritimeAcademy.error,
  success: maritimeAcademy.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetMaritimeAcademies: () => dispatch(getMaritimeAcademies()),
  deleteMaritimeAcademy: (id) => dispatch(deleteMaritimeAcademy(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(MaritimeAcademy));
