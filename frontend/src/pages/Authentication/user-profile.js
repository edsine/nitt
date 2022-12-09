import PropTypes from "prop-types";
import React, { useState, useEffect } from "react";
import { Row, Col, Card, Alert, CardBody, Button, Label } from "reactstrap";

// availity-reactstrap-validation
import { AvForm, AvField, AvInput } from "availity-reactstrap-validation";

// Redux
import { connect } from "react-redux";
import { withRouter } from "react-router-dom";

//Import Breadcrumb
import Breadcrumb from "../../components/Common/Breadcrumb";

import avatar from "../../assets/images/users/avatar-2.jpg";
// actions
import { editProfile, resetProfileFlag } from "../../store/actions";

const UserProfile = (props) => {
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [idx, setIdx] = useState(1);
  const [profileImagePath, setProfileImagePath] = useState(1);
  const { resetProfileFlag, editProfile } = props;

  useEffect(() => {
    if (localStorage.getItem("authUser")) {
      const obj = JSON.parse(localStorage.getItem("authUser"));
      if (process.env.REACT_APP_DEFAULTAUTH === "firebase") {
        setName(obj.displayName);
        setEmail(obj.email);
        setIdx(obj.uid);
      } else if (
        process.env.REACT_APP_DEFAULTAUTH === "fake" ||
        process.env.REACT_APP_DEFAULTAUTH === "jwt" ||
        process.env.REACT_APP_DEFAULTAUTH === "backend"
      ) {
        setName(obj.name);
        setEmail(obj.email);
        setIdx(obj.id);
        setProfileImagePath(obj.profile_image_path);
      }
      setTimeout(() => {
        resetProfileFlag();
      }, 3000);
    }
  }, [props.success, resetProfileFlag]);

  function handleValidSubmit(event, values) {
    const image = event.target.profile_image?.files[0];

    const data = new FormData();
    data.append("profile_image", image);
    data.append("name", values.username);
    editProfile(data, values.idx);
  }

  return (
    <React.Fragment>
      <div className="page-content">
        {/* Render Breadcrumb */}
        <Breadcrumb title="NITT" breadcrumbItem="Profile" />

        <Row>
          <Col lg="12">
            {props.error && props.error ? (
              <Alert color="danger">{props.error}</Alert>
            ) : null}
            {props.success && props.success ? (
              <Alert color="success">{props.success}</Alert>
            ) : null}

            <Card>
              <CardBody>
                <div className="d-flex">
                  <div className="ms-3">
                    <img
                      src={profileImagePath || avatar}
                      alt=""
                      className="avatar-md rounded-circle img-thumbnail"
                    />
                  </div>
                  <div className="flex-1 align-self-center">
                    <div className="text-muted">
                      <h5>{name}</h5>
                      <p className="mb-1">{email}</p>
                      {/* <p className="mb-0">Id no: #{idx}</p> */}
                    </div>
                  </div>
                </div>
              </CardBody>
            </Card>
          </Col>
        </Row>

        <h4 className="card-title mb-4">Update Profile</h4>

        <Card>
          <CardBody>
            <AvForm
              className="form-horizontal"
              onValidSubmit={(e, v) => {
                handleValidSubmit(e, v);
              }}
            >
              <div className="form-group">
                <Row>
                  <Col md="12">
                    <AvField
                      name="username"
                      label="Name"
                      value={name}
                      className="form-control mb-3"
                      placeholder="Enter Name"
                      type="text"
                      required
                    />
                  </Col>
                  <Col md="6">
                    <div className="input-group">
                      <AvInput
                        type="file"
                        name="profile_image"
                        className="form-control"
                        id="profile-image"
                        accept="image/png, image/jpeg"
                      />
                      <Label className="input-group-text" for="profile-image">
                        Upload
                      </Label>
                    </div>
                  </Col>
                </Row>
                <AvField name="idx" value={idx} type="hidden" />
              </div>
              <div className="text-center mt-4">
                <Button type="submit" color="danger">
                  Edit Profile
                </Button>
              </div>
            </AvForm>
          </CardBody>
        </Card>
      </div>
    </React.Fragment>
  );
};

UserProfile.propTypes = {
  editProfile: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
};

const mapStatetoProps = ({ Profile }) => {
  const { error, success } = Profile;
  return { error, success };
};

export default withRouter(
  connect(mapStatetoProps, { editProfile, resetProfileFlag })(UserProfile)
);
