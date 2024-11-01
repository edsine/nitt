import React, { useState, useEffect } from "react";
import PropTypes from "prop-types";
import {
  Dropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem,
} from "reactstrap";

//i18n
import { withTranslation } from "react-i18next";
// Redux
import { connect } from "react-redux";
import { withRouter, Link } from "react-router-dom";

// users
import avatar from "../../../assets/images/avatar.png";
import { BACKEND_URL } from "../../../helpers/api_helper";

const ProfileMenu = (props) => {
  const { user, success } = props;
  // Declare a new state variable, which we'll call "menu"
  const [menu, setMenu] = useState(false);

  const [username, setusername] = useState("");
  const [profileImagePath, setProfileImagePath] = useState("");

  useEffect(() => {
    if (localStorage.getItem("authUser")) {
      if (process.env.REACT_APP_DEFAULTAUTH === "firebase") {
        setusername(user.displayName);
      } else if (
        process.env.REACT_APP_DEFAULTAUTH === "fake" ||
        process.env.REACT_APP_DEFAULTAUTH === "jwt" ||
        process.env.REACT_APP_DEFAULTAUTH === "backend"
      ) {
        setusername(user.name);
        setProfileImagePath(user.profile_image_path);
      }
    }
  }, [success, user]);

  return (
    <React.Fragment>
      <Dropdown
        isOpen={menu}
        toggle={() => setMenu(!menu)}
        className="d-inline-block"
      >
        <DropdownToggle
          className="btn header-item waves-effect"
          id="page-header-user-dropdown"
          tag="button"
        >
          <img
            className="rounded-circle header-profile-user"
            src={
              user.profile_image_path
                ? `${BACKEND_URL}/storage/profile_images/${user.profile_image_path}`
                : avatar
            }
            alt="Header Avatar"
          />{" "}
          <span className="d-none d-xl-inline-block ms-1">{username}</span>{" "}
          <i className="mdi mdi-chevron-down d-none d-xl-inline-block"></i>{" "}
        </DropdownToggle>
        <DropdownMenu className="dropdown-menu-end">
          <DropdownItem tag="a" href="/profile">
            {" "}
            <i className="bx bx-user font-size-16 align-middle me-1"></i>{" "}
            {props.t("View Profile")}{" "}
          </DropdownItem>
          {/* <DropdownItem tag="a" href="auth-lock-screen">
            <i className="bx bx-lock-open font-size-16 align-middle me-1"></i>{" "}
            {props.t("Lock screen")}
          </DropdownItem> */}
          <div className="dropdown-divider" />
          <Link to="/logout" className="dropdown-item text-danger">
            <i className="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>{" "}
            <span>{props.t("Logout")}</span>
          </Link>
        </DropdownMenu>
      </Dropdown>
    </React.Fragment>
  );
};

ProfileMenu.propTypes = {
  success: PropTypes.any,
  t: PropTypes.any,
  user: PropTypes.object,
};

const mapStatetoProps = ({ Profile, Login }) => {
  const { error, success } = Profile;
  const user = Login.user || JSON.parse(localStorage.getItem("authUser"));
  return { error, success, user };
};

export default withRouter(
  connect(mapStatetoProps, {})(withTranslation()(ProfileMenu))
);
