import PropTypes from "prop-types";
import React from "react";
import { connect } from "react-redux";
import { withRouter, Link } from "react-router-dom";

//i18n
import { withTranslation } from "react-i18next";
import SidebarContent from "./SidebarContent";

import avatar from "../../assets/images/avatar.png";
import { BACKEND_URL } from "../../helpers/api_helper";

const Sidebar = (props) => {
  const { user } = props;
  return (
    <React.Fragment>
      <div className="vertical-menu">
        <div className="h-100">
          <div className="user-wid text-center py-4">
            <div className="user-img">
              <img
                src={
                  user.profile_image_path
                    ? `${BACKEND_URL}/storage/profile_images/${user.profile_image_path}`
                    : avatar
                }
                alt=""
                className="avatar-md mx-auto rounded-circle"
              />
            </div>

            <div className="mt-3">
              <Link to="#" className="text-dark fw-medium font-size-16">
                {user?.name}
              </Link>
              <p className="text-body mt-1 mb-0 font-size-13">{user?.email}</p>
            </div>
          </div>
          <div data-simplebar className="h-100">
            {props.type !== "condensed" ? (
              <SidebarContent />
            ) : (
              <SidebarContent />
            )}
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

Sidebar.propTypes = {
  type: PropTypes.string,
  user: PropTypes.object,
};

const mapStatetoProps = (state) => {
  return {
    layout: state.Layout,
    user: state.Login.user || JSON.parse(localStorage.getItem("authUser")),
  };
};
export default connect(
  mapStatetoProps,
  {}
)(withRouter(withTranslation()(Sidebar)));
