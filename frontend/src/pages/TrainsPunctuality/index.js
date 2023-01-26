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
  getTrainsPunctualities,
  deleteTrainsPunctuality,
} from "../../store/actions";
import AddTrainsPunctuality from "../../components/TrainsPunctuality/addTrainsPunctuality";
import EditTrainsPunctuality from "../../components/TrainsPunctuality/editTrainsPunctuality";
import TableAction from "../../components/Common/TableAction";
import SweetAlert from "react-bootstrap-sweetalert";
import { checkPermisssion } from "../../helpers/check_permission";

const TrainsPunctuality = (props) => {
  const {
    trainsPunctualities,
    onGetTrainsPunctualities,
    deleteTrainsPunctuality,
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
    deleteTrainsPunctuality(currentId);
    setConfirmAlert(false);
  };

  const onEditClick = (id) => {
    setIsEditModalOpen(true);
    setCurrentId(id);
    const editData = trainsPunctualities.find((item, index) => {
      return item.id === id;
    });
    setCurrentEditData(editData);
  };

  useEffect(() => {
    onGetTrainsPunctualities();
  }, [
    onGetTrainsPunctualities,
    success?.addSuccess,
    success?.editSuccess,
    success?.deleteSuccess,
  ]);

  const dataTrainsPunctualities = {
    columns: [
      {
        label: "Year",
        field: "year",
        sort: "asc",
        width: 150,
      },
      {
        label: "Number of Train Delay",
        field: "number_of_train_delay",
        sort: "asc",
        width: 270,
      },
      {
        label: "Number of Late Arrivals",
        field: "number_of_late_arrival",
        sort: "asc",
        width: 200,
      },
      {
        label: "Number of Prompty Arrivals",
        field: "number_of_prompt_arrival",
        sort: "asc",
        width: 100,
      },
      {
        label: "Action",
        field: "action",
        width: 200,
      },
    ],
    rows: trainsPunctualities?.map((item, index) => {
      item.action = (
        <TableAction
          id={trainsPunctualities[index].id}
          handleEdit={onEditClick}
          handleDelete={OnDeleteClick}
          permissions={{
            edit: "update train punctuality",
            delete: "delete train punctuality",
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
        <AddTrainsPunctuality
          isOpen={isAddModalOpen}
          setIsOpen={setIsAddModalOpen}
        />
        <EditTrainsPunctuality
          oldData={currentEditData}
          isOpen={isEditModalOpen}
          setIsOpen={setIsEditModalOpen}
        />
        <Breadcrumbs title="Trains" breadcrumbItem="Trains Punctuality" />
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
                  <CardTitle>Trains Punctuality</CardTitle>
                  {checkPermisssion("create train punctuality") && (
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
                  data={dataTrainsPunctualities}
                />
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    </React.Fragment>
  );
};

TrainsPunctuality.propTypes = {
  trainsPunctualities: PropTypes.array,
  onGetTrainsPunctualities: PropTypes.func,
  deleteTrainsPunctuality: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStateToProps = ({ trainsPunctuality }) => ({
  trainsPunctualities: Array.isArray(trainsPunctuality.trainsPunctualities)
    ? trainsPunctuality.trainsPunctualities
    : null,
  error: trainsPunctuality.error,
  success: trainsPunctuality.success,
});

const mapDispatchToProps = (dispatch) => ({
  onGetTrainsPunctualities: () => dispatch(getTrainsPunctualities()),
  deleteTrainsPunctuality: (id) => dispatch(deleteTrainsPunctuality(id)),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(withRouter(TrainsPunctuality));
