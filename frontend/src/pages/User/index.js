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
import { deleteUser, getUsers } from "../../store/actions";
import AddUser from "../../components/User/addUser";
import EditUser from "../../components/User/editUser";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import ChangePassword from "../../components/User/changePassword";
import { checkPermisssion } from "../../helpers/check_permission";

const User = (props) => {
  const { users, onGetUsers, deleteUser, error, success } = props;

  const [isAddModalOpen, setIsAddModalOpen] = useState(false);

  const [isEditModalOpen, setIsEditModalOpen] = useState(false);

  const [isChangePasswordModalOpen, setIsChangePasswordModalOpen] =
    useState(false);

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

  const onChangePasswordClick = (id) => {
    setIsChangePasswordModalOpen(true);
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
        label: "Profile Image",
        field: "profile_image",
        sort: "asc",
        width: 100,
      },
      {
        label: "Name",
        field: "name",
        sort: "asc",
        width: 150,
      },
      {
        label: "Email",
        field: "email",
        sort: "asc",
        width: 150,
      },
      {
        label: "Role",
        field: "role",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 50,
      },
    ],
    rows: users?.map((item, index) => {
      item.profile_image = (
        <img
          height={30}
          width={30}
          src={users[index].profile_image}
          alt=""
          className="avatar-md rounded-circle img-thumbnail"
        />
      );
      item.action = (
        <TableAction
          id={users[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          handleChangePassword={onChangePasswordClick}
          addChangePassword
          permissions={{
            edit: "update user",
            delete: "delete user",
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
        <AddUser isOpen={isAddModalOpen} setIsOpen={setIsAddModalOpen} />
        <EditUser
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <ChangePassword
          oldData={currentEditData}
          isOpen={isChangePasswordModalOpen}
          setIsOpen={setIsChangePasswordModalOpen}
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
                  {checkPermisssion("create user") && (
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
