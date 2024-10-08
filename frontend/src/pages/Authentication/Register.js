import PropTypes from "prop-types";
import React, { useEffect } from "react";
import { Row, Col, Card, Alert, Container } from "reactstrap";

// availity-reactstrap-validation
import { AvForm, AvField } from "availity-reactstrap-validation";

// action
import { registerUser, apiError } from "../../store/actions";

// Redux
import { connect } from "react-redux";
import { withRouter, Link } from "react-router-dom";

// import images
import logo from "../../assets/images/nitt-logo.png";

const Register = (props) => {
  const { registerUser, registrationError, history } = props;
  // handleValidSubmit
  const handleValidSubmit = (event, values) => {
    registerUser(values, history);
  };

  useEffect(() => {
    apiError("");
    document.body.className = "authentication-bg";
    // remove classname when component will unmount
    return function cleanup() {
      document.body.className = "";
    };
  });

  return (
    <React.Fragment>
      <div className="home-btn d-none d-sm-block">
        <Link to="/" className="text-dark">
          <i className="fas fa-home h2"></i>
        </Link>
      </div>
      <div className="account-pages my-5 pt-sm-5">
        <Container>
          <Row className="justify-content-center">
            <Col md={8} lg={6} xl={5}>
              <Card className="overflow-hidden">
                <div className="bg-login text-center">
                  <div className="bg-login-overlay"></div>
                  <div className="position-relative">
                    <h5 className="text-white font-size-20">Register</h5>
                    <p className="text-white-50 mb-0">
                      Get your NITT Dashboard account now
                    </p>
                    <Link to="/" className="logo logo-admin mt-4">
                      <img src={logo} alt="" height="30" />
                    </Link>
                  </div>
                </div>
                <div className="card-body pt-5">
                  <div className="p-2">
                    <AvForm
                      className="form-horizontal"
                      onValidSubmit={(e, v) => {
                        handleValidSubmit(e, v);
                      }}
                    >
                      {registrationError && registrationError ? (
                        <Alert color="danger">{registrationError}</Alert>
                      ) : null}

                      <div className="mb-3">
                        <AvField
                          id="name"
                          name="name"
                          label="Name"
                          className="form-control"
                          placeholder="Enter name"
                          type="text"
                          required
                        />
                      </div>

                      <div className="mb-3">
                        <AvField
                          id="email"
                          name="email"
                          label="Email"
                          className="form-control"
                          placeholder="Enter email"
                          type="email"
                          required
                        />
                      </div>
                      <div className="mb-3">
                        <AvField
                          name="password"
                          label="Password"
                          type="password"
                          required
                          errorMessage="Enter password with a minimum length of 8"
                          placeholder="Enter Password"
                        />
                      </div>
                      <div className="mb-3">
                        <AvField
                          name="password_confirmation"
                          label="Confirm Password"
                          type="password"
                          errorMessage="Password confirmation does not match"
                          placeholder="Confirm Password"
                          validate={{
                            required: { value: true },
                            match: { value: "password" },
                          }}
                        />
                      </div>

                      <div className="mt-4">
                        <button
                          className="btn btn-success w-100 waves-effect waves-light"
                          type="submit"
                        >
                          Register
                        </button>
                      </div>

                      <div className="mt-4 text-center">
                        <p className="mb-0">
                          By registering you agree to the NITT{" "}
                          <Link to="#" className="text-primary">
                            Terms of Use
                          </Link>
                        </p>
                      </div>
                    </AvForm>
                  </div>
                </div>
              </Card>
              <div className="mt-5 text-center">
                <p>
                  Already have an account ?{" "}
                  <a href="/login" className="fw-medium text-primary">
                    Login
                  </a>{" "}
                </p>
                <p>© {new Date().getFullYear()} NITT.</p>
              </div>
            </Col>
          </Row>
        </Container>
      </div>
    </React.Fragment>
  );
};

Register.propTypes = {
  registerUser: PropTypes.func,
  registrationError: PropTypes.any,
  user: PropTypes.any,
  history: PropTypes.object,
};

const mapStatetoProps = (state) => {
  const { registrationError, loading } = state.Account;
  return { registrationError, loading };
};

export default withRouter(
  connect(mapStatetoProps, {
    registerUser,
    apiError,
  })(Register)
);
