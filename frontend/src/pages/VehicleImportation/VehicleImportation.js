import React from "react"
import { MDBDataTable } from "mdbreact"

import { Row, Col, Card, CardBody, CardTitle, CardSubtitle } from "reactstrap"

//Import Breadcrumb
import Breadcrumbs from "../../components/Common/Breadcrumb"
import  "../../assets/scss/datatables.scss";

const VehicleImportation = () => {

    const data = {
        columns: [
            {
                label: "Vehicle Category",
                field: "vehicleCategory",
                sort: "asc",
                width: 150,
            },
            {
                label: "2014",
                field: "2014New",
                sort: "asc",
                width: 270,
            },
            {
                label: "2015",
                field: "2015New",
                sort: "asc",
                width: 200,
            },
            {
                label: "2016",
                field: "2016New",
                sort: "asc",
                width: 100,
            },
            {
                label: "2017",
                field: "2017New",
                sort: "asc",
                width: 150,
            },
            {
                label: "2018",
                field: "2018New",
                sort: "asc",
                width: 100,
            },
            {
                label: "2019",
                field: "2019New",
                sort: "asc",
                width: 100,
            },
            {
                label: "2020",
                field: "2020New",
                sort: "asc",
                width: 100,
            },
            {
                label: "2021",
                field: "2021New",
                sort: "asc",
                width: 100,
            },
            {
                label: "2022",
                field: "2022New",
                sort: "asc",
                width: 100,
            },
        ],
        rows: [
            {
                vehicleCategory: "Cars/SUVs",
                "2014New": "37027",
                "2015New": "35539",
                "2016New": "56920",
                "2017New": "34630",
                "2018New": "21020",
                "2019New": "32000",
                "2020New": "26490",
                "2021New": "35632",
                "2022New": "34522",
            },
            {
                vehicleCategory: "Buses",
                "2014New": "1217",
                "2015New": "2800",
                "2016New": "1448",
                "2017New": "251",
                "2018New": "368",
                "2019New": "3600",
                "2020New": "2750",
                "2021New": "1032",
                "2022New": "3433",
            },
            {
                vehicleCategory: "Trucks",
                "2014New": "4089",
                "2015New": "7799",
                "2016New": "4167",
                "2017New": "3881",
                "2018New": "511",
                "2019New": "6350",
                "2020New": "4200",
                "2021New": "3600",
                "2022New": "5422",
            },
        ],
    }

    return (
        <React.Fragment>
            <div className="page-content">

                <Breadcrumbs title="Vehicle Importation Data" breadcrumbItem="Vehicle Importation" />

                <Row>
                    <Col className="col-12">
                        <Card>
                            <CardBody>
                                <CardTitle>Analysis of Vehicle Importation to Nigeria</CardTitle>
                                <CardSubtitle className="mb-3">
                                    Showing breakdown Vehicle Imports into Nigeria (2014-2022)
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

export default VehicleImportation;