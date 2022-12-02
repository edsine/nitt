import React from "react";
import { MDBDataTable } from "mdbreact"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import "../../assets/scss/datatables.scss";


const RailwaysPassengers = () => {
    const data = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "Urban Passengers carried",
                field: "urbanPassengersCarriedCount",
                sort: "asc",
                width: 270,
            },
            {
                label: "Regional Passengers carried",
                field: "regionalPassengersCarriedCount",
                sort: "asc",
                width: 200,
            },
            {
                label: "Freight/Tons Carried",
                field: "freightTonsCarried",
                sort: "asc",
                width: 100,
            },
            {
                label: "Freight Trains",
                field: "freightTrains",
                sort: "asc",
                width: 150,
            },
            {
                label: "Passenger Trains",
                field: "PassengerTrains",
                sort: "asc",
                width: 100,
            },
            {
                label: "Freight Revenue Generation",
                field: "freightRevenueGeneration",
                sort: "asc",
                width: 100,
            },
            {
                label: "Passengers Revenue Generation",
                field: "passengerRevenueGeneration",
                sort: "asc",
                width: 100,
            },
            {
                label: "Loco fuel consumption rate (passengers)",
                field: "passengerFuelConsumption",
                sort: "asc",
                width: 100,
            },
            {
                label: "Loco fuel consumption rate (freight)",
                field: "freightFuelConsumption",
                sort: "asc",
                width: 100,
            }
        ],
        rows: [
            {
                "year": "2010",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2011",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2012",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2013",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2014",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2015",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2016",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2017",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2018",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2019",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2020",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2021",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
            {
                "year": "2022",
                "urbanPassengersCarriedCount": "224555",
                "regionalPassengersCarriedCount": "43223",
                "freightTonsCarried": "4342244490",
                "freightTrains": "34630",
                "PassengerTrains": "332213449",
                "freightRevenueGeneration": "356",
                "passengerRevenueGeneration": "432",
                "passengerFuelConsumption": "356",
                "freightFuelConsumption": "432",
            },
        ],
    }

    return (
        <React.Fragment>
            <div className="page-content">

                <Breadcrumbs title="Railways Passengers" breadcrumbItem="Railways Passengers" />

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Railways Passengers</CardTitle>
                                <CardSubtitle className="mb-3">
                                </CardSubtitle>

                                <MDBDataTable responsive striped bordered data={data} />
                            </CardBody>
                        </Card>
                    </Col>
                </Row>
            </div>

        </React.Fragment>
    );
}


export default RailwaysPassengers;