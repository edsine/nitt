import PropTypes from "prop-types";
import React, { useEffect, useRef, useCallback } from "react";

// //Import Scrollbar
import SimpleBar from "simplebar-react";

// MetisMenu
import MetisMenu from "metismenujs";
import { withRouter } from "react-router-dom";
import { Link } from "react-router-dom";

//i18n
import { withTranslation } from "react-i18next";
import { checkPermisssion } from "../../helpers/check_permission";

const SidebarContent = (props) => {
  const ref = useRef();
  const activateParentDropdown = useCallback((item) => {
    item.classList.add("active");
    const parent = item.parentElement;
    const parent2El = parent.childNodes[1];
    if (parent2El && parent2El.id !== "side-menu") {
      parent2El.classList.add("mm-show");
    }
    if (parent) {
      parent.classList.add("mm-active");
      const parent2 = parent.parentElement;
      if (parent2) {
        parent2.classList.add("mm-show"); // ul tag
        const parent3 = parent2.parentElement; // li tag
        if (parent3) {
          parent3.classList.add("mm-active"); // li
          parent3.childNodes[0].classList.add("mm-active"); //a
          const parent4 = parent3.parentElement; // ul
          if (parent4) {
            parent4.classList.add("mm-show"); // ul
            const parent5 = parent4.parentElement;
            if (parent5) {
              parent5.classList.add("mm-show"); // li
              parent5.childNodes[0].classList.add("mm-active"); // a tag
            }
          }
        }
      }
      scrollElement(item);
      return false;
    }
    scrollElement(item);
    return false;
  }, []);
  // Use ComponentDidMount and ComponentDidUpdate method symultaniously
  useEffect(() => {
    const pathName = props.location.pathname;
    const initMenu = () => {
      new MetisMenu("#side-menu");
      let matchingMenuItem = null;
      const ul = document.getElementById("side-menu");
      const items = ul.getElementsByTagName("a");
      for (let i = 0; i < items.length; ++i) {
        if (pathName === items[i].pathname) {
          matchingMenuItem = items[i];
          break;
        }
      }
      if (matchingMenuItem) {
        activateParentDropdown(matchingMenuItem);
      }
    };
    initMenu();
  }, [props.location.pathname, activateParentDropdown]);
  useEffect(() => {
    ref.current.recalculate();
  }, []);
  const scrollElement = (item) => {
    if (item) {
      const currentPosition = item.offsetTop;
      if (currentPosition > window.innerHeight) {
        ref.current.getScrollElement().scrollTop = currentPosition - 300;
      }
    }
  };

  return (
    <React.Fragment>
      <SimpleBar ref={ref} className="vertical-simplebar">
        <div id="sidebar-menu">
          <ul className="metismenu list-unstyled" id="side-menu">
            <li className="menu-title">{props.t("Menu")} </li>

            <li>
              <Link to="/dashboard" className="waves-effect">
                <i className="mdi mdi-airplay"></i>
                <span className="badge rounded-pill bg-info float-end"></span>
                <span>{props.t("Dashboard")}</span>
              </Link>
            </li>

            {checkPermisssion("read vehicle importation") && (
              <li>
                <Link to="/vehicle-importation" className="waves-effect">
                  <i className="mdi mdi-car"></i>
                  <span className="badge rounded-pill bg-info float-end"></span>
                  <span>{props.t("Vehicle Importation")}</span>
                </Link>
              </li>
            )}

            {(checkPermisssion("read passenger road transport data") ||
              checkPermisssion("read freight road transport data")) && (
              <li>
                <Link to="/#" className="waves-effect">
                  <i className="mdi mdi-road"></i>
                  <span className="badge rounded-pill bg-info float-end"></span>
                  <span>{props.t("Road transport data")}</span>
                </Link>
                <ul className="sub-menu">
                  {checkPermisssion("read passenger road transport data") && (
                    <li>
                      <Link to="/passenger-road-transport-data">
                        {props.t("Passenger")}
                      </Link>
                    </li>
                  )}

                  {checkPermisssion("read freight road transport data") && (
                    <li>
                      <Link to="/freight-road-transport-data">
                        {props.t("Freight")}
                      </Link>
                    </li>
                  )}
                </ul>
              </li>
            )}

            {(checkPermisssion("read air transport data") ||
              checkPermisssion("read air passengers traffic")) && (
              <li>
                <Link to="/#" className="waves-effect">
                  <i className="mdi mdi-airplane-landing"></i>
                  <span className="badge rounded-pill bg-info float-end"></span>
                  <span>{props.t("Air transport data")}</span>
                </Link>
                <ul className="sub-menu">
                  {checkPermisssion("read air transport data") && (
                    <li>
                      <Link to="/air-transport-data">
                        {props.t("Transport data")}
                      </Link>
                    </li>
                  )}

                  {checkPermisssion("read air passengers traffic") && (
                    <li>
                      <Link to="/air-passenger-traffic">
                        {props.t("Traffic")}
                      </Link>
                    </li>
                  )}
                </ul>
              </li>
            )}

            {checkPermisssion("read railway passenger") && (
              <li>
                <Link to="/railways-passengers" className="waves-effect">
                  <i className="mdi mdi-train"></i>
                  <span>{props.t("Railways Passengers/Freight")}</span>
                </Link>
              </li>
            )}

            {checkPermisssion("read railway rolling stock") && (
              <li>
                <Link to="/rolling-stock" className="waves-effect">
                  <i className="mdi mdi-train-variant"></i>
                  <span>{props.t("Rolling Stock")}</span>
                </Link>
              </li>
            )}

            {(checkPermisssion("read maritime academy") ||
              checkPermisssion("read maritime transport")) && (
              <li>
                <Link to="/#" className="waves-effect">
                  <i className="mdi mdi-school"></i>
                  <span className="badge rounded-pill bg-info float-end"></span>
                  <span>{props.t("Maritime")}</span>
                </Link>
                <ul className="sub-menu">
                  {checkPermisssion("read maritime academy") && (
                    <li>
                      <Link to="/maritime-academy" className="waves-effect">
                        <i className="mdi mdi-school"></i>
                        <span>{props.t("Maritime Academy")}</span>
                      </Link>
                    </li>
                  )}

                  {checkPermisssion("read maritime administration") && (
                    <li>
                      <Link
                        to="/maritime-administration"
                        className="waves-effect"
                      >
                        <i className="mdi mdi-school"></i>
                        <span>{props.t("Maritime Administration")}</span>
                      </Link>
                    </li>
                  )}

                  {checkPermisssion("read maritime transport") && (
                    <li>
                      <Link to="/maritime-transport" className="waves-effect">
                        <i className="mdi mdi-car"></i>
                        <span>{props.t("Maritime Transport")}</span>
                      </Link>
                    </li>
                  )}
                </ul>
              </li>
            )}

            {checkPermisssion("read train punctuality") && (
              <li>
                <Link to="/trains-punctuality" className="waves-effect">
                  <i className="mdi mdi-train"></i>
                  <span>{props.t("Trains Punctuality")}</span>
                </Link>
              </li>
            )}

            {checkPermisssion("read gross domestic product") && (
              <li>
                <Link to="/gross-domestic-product" className="waves-effect">
                  <i className="mdi mdi-train"></i>
                  <span>{props.t("Gross Domestic Product")}</span>
                </Link>
              </li>
            )}

            {checkPermisssion("read ship container traffic") && (
              <li>
                <Link to="/ship-container-traffics" className="waves-effect">
                  <i className="mdi mdi-train"></i>
                  <span>{props.t("Ship Container Traffic")}</span>
                </Link>
              </li>
            )}

            {checkPermisssion("read role") && (
              <li>
                <Link to="/roles" className="waves-effect">
                  <i className="mdi mdi-account-badge"></i>
                  <span>{props.t("Roles")}</span>
                </Link>
              </li>
            )}

            {checkPermisssion("read user") && (
              <li>
                <Link to="/users" className="waves-effect">
                  <i className="mdi mdi-account"></i>
                  <span>{props.t("Users")}</span>
                </Link>
              </li>
            )}
          </ul>
        </div>
      </SimpleBar>
    </React.Fragment>
  );
};

SidebarContent.propTypes = {
  location: PropTypes.object,
  t: PropTypes.any,
};

export default withRouter(withTranslation()(SidebarContent));
