import React from "react";
import { MDBDataTable } from "mdbreact"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import "../../assets/scss/datatables.scss";


const RollingStock = () => {
    const data = {
        columns: [
            {
                label: "Year",
                field: "year",
                sort: "asc",
                width: 150,
            },
            {
                label: "No. of Rolling Stock (Coaches)",
                field: "couchesRollingStockCount",
                sort: "asc",
                width: 270,
            },
            {
                label: "No. of Rolling Stock (Wagon)",
                field: "wagonRollingStockCount",
                sort: "asc",
                width: 200,
            },
            {
                label: "Average Loco Availability",
                field: "avgLoco",
                sort: "asc",
                width: 100,
            },
            {
                label: "Annual Maintenance Cost (Coaches)",
                field: "coachesAvgMaintenanceCost",
                sort: "asc",
                width: 150,
            },
            {
                label: "Annual Maintenance Cost (Wagon)",
                field: "wagonAvgMaintenanceCost",
                sort: "asc",
                width: 100,
            },
            {
                label: "Annual Average KM Travel (Coaches)",
                field: "coachesAvgKMTravel",
                sort: "asc",
                width: 100,
            },
            {
                label: "Annual Average KM Travel (Wagon)",
                field: "wagonAvgKMTravel",
                sort: "asc",
                width: 100,
            },
        ],
        rows: [
            {
                "year": "2010",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2011",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2012",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2013",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2014",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2015",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2016",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2017",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2018",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2019",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2020",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2021",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
            {
                "year": "2022",
                "couchesRollingStockCount": "223",
                "wagonRollingStockCount": "321",
                "avgLoco": "621",
                "coachesAvgMaintenanceCost": "433",
                "wagonAvgMaintenanceCost": "123",
                "coachesAvgKMTravel": "343252564",
                "wagonAvgKMTravel": "432453455"
            },
        ],
    }

    return (
        <React.Fragment>
            <div className="page-content">

                <Breadcrumbs title="Rolling Stock" breadcrumbItem="Rolling Stock" />

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Rolling Stock</CardTitle>
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


export default RollingStock;