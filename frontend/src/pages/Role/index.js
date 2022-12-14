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
import { deleteRole, getRoles } from "../../store/actions";
import AddRole from "../../components/Role/addRole";
import EditRole from "../../components/Role/editRole";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const Role = (props) => {
  const { roles, onGetRoles, deleteRole, error, success } = props;

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
    deleteRole(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = roles.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetRoles();
  }, [
    onGetRoles,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataRoles = {
    columns: [
      {
        label: "Name",
        field: "name",
        sort: "asc",
        width: 150,
      },
      {
        label: "Action",
        field: "action",
        width: 50,
      },
    ],
    rows: roles?.map((item, index) => {
      item.action = (
        <TableAction
          id={roles[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update role",
            delete: "delete role",
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
        <AddRole isOpen={isAddModalOpen} setIsOpen={setIsAddModalOpen} />
        <EditRole
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="All Roles" breadcrumbItem="Roles" />
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
                  <CardTitle>Roles </CardTitle>
                  {checkPermisssion("create role") && (
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
                <MDBDataTable responsive striped bordered data={dataRoles} />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

Role.propTypes = {
  users: PropTypes.array,
  onGetRoles: PropTypes.func,
  deleteRole: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ roles }) => ({
  roles: Array.isArray(roles.roles) ? roles.roles : null,
  error: roles.error,
  success: roles.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetRoles: () => dispatch(getRoles()),
  deleteRole: (id) => dispatch(deleteRole(id)),
});

export default connect(mapStateToProps, mapDispatchToProps)(withRouter(Role));
