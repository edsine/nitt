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
import {
  editProfile,
  editProfileImage,
  resetProfileFlag,
  changePassword,
} from "../../store/actions";

const UserProfile = (props) => {
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [idx, setIdx] = useState(1);
  const [profileImagePath, setProfileImagePath] = useState(1);
  const {
    resetProfileFlag,
    editProfile,
    editProfileImage,
    changePassword,
    error,
    success,
    profileImageSuccess,
    profileImageError,
    userSuccess,
    userError,
  } = props;

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
    editProfile(values, values.id);
  }

  function handleProfileImageChange(event, values) {
    const image = event.target.profile_image?.files[0];
    const data = new FormData();
    data.append("profile_image", image);
    editProfileImage(data, values.profileImageId);
  }

  function handleValidPasswordSubmit(event, values) {
    changePassword(values, values.chPsIdx);
  }

  return (
    <React.Fragment>
      <div className="page-content">
        {/* Render Breadcrumb */}
        <Breadcrumb title="NITT" breadcrumbItem="Profile" />

        <Row>
          <Col lg="12">
            {error && error ? <Alert color="danger">{error}</Alert> : null}
            {success && success ? (
              <Alert color="success">{success}</Alert>
            ) : null}

            {profileImageError && profileImageError ? (
              <Alert color="danger">{profileImageError}</Alert>
            ) : null}
            {profileImageSuccess && profileImageSuccess ? (
              <Alert color="success">{profileImageSuccess}</Alert>
            ) : null}

            {userError?.changePasswordError &&
            userError?.changePasswordError ? (
              <Alert color="danger">{userError?.changePasswordError}</Alert>
            ) : null}
            {userSuccess?.changePasswordSuccess &&
            userSuccess?.changePasswordSuccess ? (
              <Alert color="success">
                {userSuccess?.changePasswordSuccess}
              </Alert>
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
            <Row>
              <Col>
                <AvForm
                  className="form-horizontal"
                  onValidSubmit={(e, v) => {
                    handleValidSubmit(e, v);
                  }}
                >
                  <div className="form-group">
                    <Row>
                      <Col md="6">
                        <AvField
                          name="name"
                          label="Name"
                          value={name}
                          className="form-control mb-3"
                          placeholder="Enter Name"
                          type="text"
                          required
                        />
                      </Col>
                    </Row>
                    <AvField name="id" value={idx} type="hidden" />
                  </div>
                  <div className="text-left mt-4">
                    <Button type="submit" color="danger">
                      Edit Profile
                    </Button>
                  </div>
                </AvForm>
              </Col>
            </Row>
          </CardBody>
        </Card>

        <h4 className="card-title mb-4">Update Profile Image</h4>

        <Card>
          <CardBody>
            <Row>
              <Col>
                <AvForm
                  className="form-horizontal"
                  onValidSubmit={(e, v) => {
                    handleProfileImageChange(e, v);
                  }}
                >
                  <div className="form-group">
                    <Row>
                      <Col md="6">
                        <div className="input-group">
                          <AvInput
                            type="file"
                            name="profile_image"
                            className="form-control"
                            id="profile-image"
                            required
                            accept="image/png, image/jpeg"
                          />
                          <Label
                            className="input-group-text"
                            for="profile-image"
                          >
                            Upload
                          </Label>
                        </div>
                      </Col>
                    </Row>
                    <AvField name="profileImageId" value={idx} type="hidden" />
                  </div>
                  <div className="text-left mt-4">
                    <Button type="submit" color="danger">
                      Change Profile Image
                    </Button>
                  </div>
                </AvForm>
              </Col>
            </Row>
          </CardBody>
        </Card>

        <h4 className="card-title mb-4">Change Password</h4>
        <Card>
          <CardBody>
            <Row>
              <Col>
                <AvForm
                  className="needs-validation"
                  onValidSubmit={(e, v) => {
                    handleValidPasswordSubmit(e, v);
                  }}
                >
                  <div className="form-group">
                    <Row>
                      <Col md="6">
                        <div className="mb-3">
                          <Label htmlFor="password">Password</Label>
                          <AvField
                            name="password"
                            placeholder=""
                            type="password"
                            errorMessage="Enter a valid password"
                            className="form-control"
                            validate={{ required: { value: true } }}
                            id="password"
                          />
                        </div>
                      </Col>
                      <Col md="6">
                        <div className="mb-3">
                          <Label htmlFor="passwordConfirmation">
                            Confirm Password
                          </Label>
                          <AvField
                            name="password_confirmation"
                            placeholder=""
                            type="password"
                            errorMessage="Please confirm your password."
                            className="form-control"
                            validate={{ required: { value: true } }}
                            id="passwordConfirmation"
                          />
                        </div>
                      </Col>
                    </Row>
                    <AvField name="chPsIdx" value={idx} type="hidden" />
                    <div className="text-left mt-4">
                      <Button type="submit" color="danger">
                        Change Password
                      </Button>
                    </div>
                  </div>
                </AvForm>
              </Col>
            </Row>
          </CardBody>
        </Card>
      </div>
    </React.Fragment>
  );
};

UserProfile.propTypes = {
  editProfile: PropTypes.func,
  editProfileImage: PropTypes.func,
  changePassword: PropTypes.func,
  error: PropTypes.any,
  success: PropTypes.any,
  profileImageError: PropTypes.any,
  profileImageSuccess: PropTypes.any,
  userError: PropTypes.any,
  userSuccess: PropTypes.any,
};

const mapStatetoProps = ({ Profile, users }) => {
  const { error, success, profileImageError, profileImageSuccess } = Profile;
  const userError = users.error;
  const userSuccess = users.success;
  return {
    error,
    success,
    userError,
    userSuccess,
    profileImageSuccess,
    profileImageError,
  };
};

export default withRouter(
  connect(mapStatetoProps, {
    editProfile,
    editProfileImage,
    resetProfileFlag,
    changePassword,
  })(UserProfile)
);
