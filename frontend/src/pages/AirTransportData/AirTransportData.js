import React from "react"
import { MDBDataTable } from "mdbreact"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import  "../../assets/scss/datatables.scss";

const AirTransportData = () => {

    const data = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "Domestic Registered Airlines",
                field: "domesticRegisteredAirlines",
                sort: "asc",
                width: 270,
            },
            {
                label: "International Registered Airlines",
                field: "internationalRegisteredAirlines",
                sort: "asc",
                width: 200,
            },
            {
                label: "Domestic Deregistered Airlines",
                field: "domesticDeregisteredAirlines",
                sort: "asc",
                width: 100,
            },
            {
                label: "International Deregistered Airlines",
                field: "internationalDeregisteredAirlines",
                sort: "asc",
                width: 150,
            },
            {
                label: "Near Air Accidents",
                field: "nearAirAccidentsCount",
                sort: "asc",
                width: 100,
            },
            {
                label: "Air Accidents",
                field: "accidentsCount",
                sort: "asc",
                width: 100,
            }
        ],
        rows: [
            {
                "year": "2010",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2011",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2012",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2013",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2014",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2015",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2016",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2017",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2018",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2019",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2020",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2021",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
            {
                "year": "2022",
                "domesticRegisteredAirlines": "224555",
                "internationalRegisteredAirlines": "43223",
                "domesticDeregisteredAirlines": "4342244490",
                "internationalDeregisteredAirlines": "34630",
                "nearAirAccidentsCount": "332213449",
                "accidentsCount": "356",
            },
        ],
    }

    const trafficData = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "Domestic Passenger Traffic",
                field: "domesticPassengerTraffic",
                sort: "asc",
                width: 270,
            },
            {
                label: "International Passenger Traffic",
                field: "internationalPassengerTraffic",
                sort: "asc",
                width: 200,
            },
            {
                label: "Domestic Freight Traffic/Ton",
                field: "domesticFreightTraffic",
                sort: "asc",
                width: 100,
            },
            {
                label: "International Freight Traffic/Ton",
                field: "internationalFreightTraffic",
                sort: "asc",
                width: 150,
            },
        ],
        rows: [
            {
                "year": "2010",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2011",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2012",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2013",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2014",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2015",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2016",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2017",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2018",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2019",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2020",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2021",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
            {
                "year": "2022",
                "domesticPassengerTraffic": "224555",
                "internationalPassengerTraffic": "43223",
                "domesticFreightTraffic": "43422",
                "internationalFreightTraffic": "34630",
            },
        ],
    }

    return (
        <React.Fragment>
            <div className="page-content">

                <Breadcrumbs title="Road transport Data" breadcrumbItem="Road transport" />

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Air transport data</CardTitle>
                                <CardSubtitle className="mb-3">
                                </CardSubtitle>

                                <MDBDataTable responsive striped bordered data={data} />
                            </CardBody>
                        </Card>
                    </Col>
                </Row>

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Air Passenger Traffic</CardTitle>
                                <CardSubtitle className="mb-3">
                                </CardSubtitle>

                                <MDBDataTable responsive striped bordered data={trafficData} />
                            </CardBody>
                        </Card>
                    </Col>
                </Row>
            </div>

        </React.Fragment>
    );
}

export default AirTransportData;