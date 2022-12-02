import React, { useEffect } from "react"
import { MDBDataTable } from "mdbreact"
import PropTypes from "prop-types"
import { connect } from "react-redux"
import { withRouter } from "react-router-dom"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import "../../assets/scss/datatables.scss";
import { getPassengerRoadTransportData } from "../../store/roadtransportdata/actions";

const RoadTransportData = (props) => {

    const { passengersRTD, onGetPassengerRTD } = props

    useEffect(() => {
        onGetPassengerRTD()
    }, [onGetPassengerRTD])

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
                field: "tonnesCarriedCount",
                sort: "asc",
                width: 270,
            },
            {
                label: "No of Vehicle in fleet",
                field: "vehicleInFleetCount",
                sort: "asc",
                width: 200,
            },
            {
                label: "Revenue from operation",
                field: "revenueFromOperation",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Employee",
                field: "employeesCount",
                sort: "asc",
                width: 150,
            },
            {
                label: "Annual cost of vehicle maintenance",
                field: "vehicleMaintenanceCost",
                sort: "asc",
                width: 100,
            },
            {
                label: "No. of Accident",
                field: "accidentCount",
                sort: "asc",
                width: 100,
            }
        ],
        rows: [
            {
                "year": "2010",
                "tonnesCarriedCount": "224555",
                "vehicleInFleetCount": "43223",
                "revenueFromOperation": "4342244490",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "332213449",
                "accidentCount": "356",
            },
            {
                "year": "2011",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2012",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2013",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2014",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2015",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2016",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2017",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2018",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2019",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2020",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2021",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
            {
                "year": "2022",
                "tonnesCarriedCount": "37027",
                "vehicleInFleetCount": "35539",
                "revenueFromOperation": "56920",
                "employeesCount": "34630",
                "vehicleMaintenanceCost": "21020",
                "accidentCount": "32000",
            },
        ],
    }

    console.log(passengersRTD);

    return (
        <React.Fragment>
            <div className="page-content">

                <Breadcrumbs title="Road transport Data" breadcrumbItem="Road transport" />

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Road transport data (Passengers)</CardTitle>
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
}

const mapStateToProps = ({roadTransportData}) => ({
    passengersRTD: roadTransportData.passengersRTD
})

const mapDispatchToProps = dispatch => ({
    onGetPassengerRTD: () => dispatch(getPassengerRoadTransportData()),
})

export default connect(
    mapStateToProps,
    mapDispatchToProps
)(withRouter(RoadTransportData))