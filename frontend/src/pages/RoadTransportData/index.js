import React, { useEffect, useState } from "react"
import { MDBDataTable } from "mdbreact"
import PropTypes from "prop-types"
import { connect } from "react-redux"
import { withRouter } from "react-router-dom"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle, Button } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import "../../assets/scss/datatables.scss";
import { getFreightRoadTransportData, getPassengerRoadTransportData } from "../../store/roadtransportdata/actions";
import AddPassengerRoadTransportData from "./addPassengerRoadTransportData"

const RoadTransportData = (props) => {

    const { passengersRTD, onGetPassengerRTD, freightRTD, onGetFreightRTD } = props

    const [isAddModalOpen, setIsAddModalOpen] = useState(false);

    useEffect(() => {
        onGetPassengerRTD()
    }, [onGetPassengerRTD, isAddModalOpen])

    useEffect(() => {
        onGetFreightRTD()
    }, [onGetFreightRTD])

    const dataPassengers = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "No of Passengers carried",
                field: "number_of_passengers_carried",
                sort: "asc",
                width: 270,
            },
            {
                label: "No of Vehicle in fleet",
                field: "number_of_vehicles_in_fleet",
                sort: "asc",
                width: 200,
            },
            {
                label: "Revenue from operation",
                field: "revenue_from_operation",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Employee",
                field: "number_of_employees",
                sort: "asc",
                width: 150,
            },
            {
                label: "Annual cost of vehicle maintenance",
                field: "annual_cost_of_vehicle_maintenance",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Accident",
                field: "number_of_accidents",
                sort: "asc",
                width: 100,
            }
        ],
        rows: passengersRTD
    }

    const dataFreight = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "No of Tonnes carried",
                field: "number_of_tonnes_carried",
                sort: "asc",
                width: 270,
            },
            {
                label: "No of Vehicle in fleet",
                field: "number_of_vehicle_in_the_fleet",
                sort: "asc",
                width: 200,
            },
            {
                label: "Revenue from operation",
                field: "revenue_from_operation",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Employee",
                field: "number_of_employees",
                sort: "asc",
                width: 150,
            },
            {
                label: "Annual cost of vehicle maintenance",
                field: "annual_cost_of_vehicle_maintenance",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Accident",
                field: "number_of_accidents",
                sort: "asc",
                width: 100,
            }
        ],
        rows: freightRTD
    }

    const handleClick = () => {
        setIsAddModalOpen(true);
    }

    return (
        <React.Fragment>
            <div className="page-content">
                <AddPassengerRoadTransportData isOpen={isAddModalOpen} setIsOpen={setIsAddModalOpen} />
                <Breadcrumbs title="Road transport Data" breadcrumbItem="Road transport" />

                <Row>
                    <Col lg={12}>
                        <Card>
                            <CardBody>
                                <CardTitle>Road transport data (Passengers)</CardTitle>
                                <Button
                                    color="success"
                                    className="btn btn-success waves-effect waves-light"
                                    onClick={() => handleClick()}
                                >
                                    Add
                                </Button>{" "}
                                <CardSubtitle className="mb-3">
                                </CardSubtitle>

                                <MDBDataTable responsive striped bordered data={dataPassengers} />
                            </CardBody>
                        </Card>
                    </Col>
                </Row>

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Road transport data (Freight)</CardTitle>
                                <CardSubtitle className="mb-3">
                                </CardSubtitle>

                                <MDBDataTable responsive striped bordered data={dataFreight} />
                            </CardBody>
                        </Card>
                    </Col>
                </Row>
            </div>

        </React.Fragment>
    );
}


RoadTransportData.propTypes = {
    passengersRTD: PropTypes.array,
    onGetPassengerRTD: PropTypes.func,
    freightRTD: PropTypes.array,
    onGetFreightRTD: PropTypes.func,
}

const mapStateToProps = ({ roadTransportData }) => ({
    passengersRTD: roadTransportData.passengersRTD,
    freightRTD: roadTransportData.freightRTD,
})

const mapDispatchToProps = dispatch => ({
    onGetPassengerRTD: () => dispatch(getPassengerRoadTransportData()),
    onGetFreightRTD: () => dispatch(getFreightRoadTransportData()),
})

export default connect(
    mapStateToProps,
    mapDispatchToProps
)(withRouter(RoadTransportData))