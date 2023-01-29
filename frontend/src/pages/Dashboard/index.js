import React, { useEffect, useState } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Row, Col, CardBody, Card, Progress } from "reactstrap";

//Import Components
import LineChart from "./line-chart";
import RevenueChart from "./revenue-chart";
import SalesAnalytics from "./sales-analytics";
import ScatterChart from "./scatter-analytics";

import Overview from "./Overview";
import { getDashboardData } from "../../store/actions";
import { Label, AvField, AvForm } from "availity-reactstrap-validation";

const Dashboard = (props) => {
  const { dashboardData, onGetDashboardData } = props;

  const currentYear = new Date().getFullYear();
  const [year, setYear] = useState(currentYear);

  useEffect(() => {
    onGetDashboardData({ year: year });
  }, [onGetDashboardData, year]);

  const handleValidSubmit = (event, values) => {
    setYear(values.year);
  };

  return (
    <React.Fragment>
      <div className="page-content">
        <Row>
          <div className="col-12">
            <div className="page-title-box d-flex align-items-center justify-content-between">
              <h4 className="page-title mb-0 font-size-18">Dashboard</h4>

              <div className="page-title-right">
                <ol className="breadcrumb m-0">
                  <li className="breadcrumb-item active">
                    Welcome to NITT Digitization Dashboard
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </Row>

        <Row>
          <AvForm
            className="needs-validation"
            onValidSubmit={(e, v) => {
              handleValidSubmit(e, v);
            }}
          >
            <Row>
              <Col md={3}>
                <label htmlFor="year">Year (From 2014)</label>
                <div className="d-flex justify-content-start align-items-baseline">
                  <div className="mb-3">
                    <AvField
                      name="year"
                      placeholder=""
                      type="number"
                      value={year}
                      min={2014}
                      errorMessage="Select a Year (2014 and above)"
                      className="form-control"
                      validate={{ required: { value: true } }}
                      id="year"
                    />
                  </div>
                  <button
                    type="submit"
                    className="btn btn-success waves-effect waves-light mx-3"
                  >
                    Filter
                  </button>
                </div>
              </Col>
            </Row>
          </AvForm>
          <Col lg={3}>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-tag-plus-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">
                      Road Passenger Carried
                    </div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.roadPassengerCarried}</h4>
                <div className="row">
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="primary"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </div>
              </CardBody>
            </Card>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">
                      Air Passengers Carried (Domestic)
                    </div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.airPassengerCarried}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="success"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
          </Col>
          <Col lg={3}>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">
                      Tonnes Carried (Freight)
                    </div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.freightTonnesCarried}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="primary"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">
                      Air Passengers Carried (International)
                    </div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.airPassengerCarriedInt}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="success"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
          </Col>
          <Col lg={3}>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">New Cars Imported</div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.newBusesImported}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="primary"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">Used Cars Imported</div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.usedCarsImported}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="success"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
          </Col>
          <Col lg={3}>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-tag-plus-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">New Buses Imported</div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.newBusesImported}</h4>
                <div className="row">
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="primary"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </div>
              </CardBody>
            </Card>
            <Card>
              <CardBody>
                <div className="d-flex align-items-start">
                  <div className="avatar-sm font-size-20 me-3">
                    <span className="avatar-title bg-soft-primary text-primary rounded">
                      <i className="mdi mdi-account-multiple-outline"></i>
                    </span>
                  </div>
                  <div className="flex-1">
                    <div className="font-size-16 mt-2">Used Buses Imported</div>
                  </div>
                </div>
                <h4 className="mt-4">{dashboardData.usedBusesImported}</h4>
                <Row>
                  <div className="col-5 align-self-center">
                    <Progress
                      value="62"
                      color="success"
                      className="bg-transparent progress-sm"
                      size="sm"
                    />
                  </div>
                </Row>
              </CardBody>
            </Card>
          </Col>
          {/* <Col lg={6}>
            <LineChart />
          </Col>
          <Col lg={6}>
            <RevenueChart />
          </Col> */}
        </Row>
        {/* <Row>
          <Col lg={5}>
            <SalesAnalytics />
          </Col>
          <Col lg={4}>
            <ScatterChart />
          </Col>

          <Overview />
        </Row> */}
      </div>
    </React.Fragment>
  );
};

Dashboard.propTypes = {
  onGetDashboardData: PropTypes.func,
  dashboardData: PropTypes.any,
};

const mapStateToProps = ({ dashboardData }) => ({
  dashboardData: dashboardData.data,
});

const mapDispatchToProps = (dispatch) => ({
  onGetDashboardData: (values) => dispatch(getDashboardData(values)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Dashboard);
