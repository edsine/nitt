import React from "react";
import PropTypes from "prop-types";
import { Route, Redirect, useHistory } from "react-router-dom";
import ErrorBoundary from "../../components/ErrorBoundary";

const Authmiddleware = ({
  component: Component,
  layout: Layout,
  isAuthProtected,
  checkPermissions,
  path,
  ...rest
}) => {
  const history = useHistory();
  return (
    <Route
      // {...rest}

      render={(props) => {
        if (isAuthProtected && !localStorage.getItem("authUser")) {
          return (
            <Redirect
              to={{ pathname: "/login", state: { from: props.location } }}
            />
          );
        }

        if (!checkPermissions) {
          return history.goBack();
        }

        if (path === "/") {
          return <Component {...props} />;
        }

        return (
          <Layout>
            <ErrorBoundary>
              <Component {...props} />
            </ErrorBoundary>
          </Layout>
        );
      }}
    />
  );
};

Authmiddleware.propTypes = {
  isAuthProtected: PropTypes.bool,
  checkPermissions: PropTypes.bool,
  component: PropTypes.any,
  location: PropTypes.object,
  layout: PropTypes.any,
};

export default Authmiddleware;
