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
import { deleteUser, getUsers } from "../../store/user/actions";
import AddUser from "../../components/User/addUser";
import EditUser from "../../components/User/editUser";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";

const User = (props) => {
  const { users, onGetUsers, deleteUser, error, success } = props;

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
    deleteUser(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = users.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetUsers();
  }, [
    onGetUsers,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataUsers = {
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
    ],
    rows: users?.map((item, index) => {
      item.action = (
        <TableAction
          id={users[index].id}
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
        <AddUser isOpen={isAddModalOpen} setIsOpen={setIsAddModalOpen} />
        <EditUser
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="All Users" breadcrumbItem="Users" />
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
                  <CardTitle>Users </CardTitle>
                  <Button
                    color="success"
                    className="btn btn-success waves-effect waves-light float-right"
                    onClick={() => handleClick()}
                  >
                    Add
                  </Button>{" "}
                </div>
                <CardSubtitle className="mb-3"></CardSubtitle>
                <MDBDataTable responsive striped bordered data={dataUsers} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

User.propTypes = {
  users: PropTypes.array,
  onGetUsers: PropTypes.func,
  deleteUser: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ users }) => ({
  users: Array.isArray(users.users) ? users.users : null,
  error: users.error,
  success: users.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetUsers: () => dispatch(getUsers()),
  deleteUser: (id) => dispatch(deleteUser(id)),
});

export default connect(mapStateToProps, mapDispatchToProps)(withRouter(User));
