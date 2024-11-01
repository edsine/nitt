import React, { Component } from "react"
import { Row, Col, Card, CardBody } from "reactstrap"
import ReactApexChart from "react-apexcharts"

class SalesAnalytics extends Component {
  constructor(props) {
    super(props)

    this.state = {
      series: [66.60, 33.40],
      options: {
        labels: ["Domestic Passenger Traffic", "International Passenger Traffic"],
        plotOptions: {
          pie: {
            donut: {
              size: '85%'
            }
          }
        },
        legend: {
          show: false,
        },
        colors: ['#3b5de7', '#45cb85'],
      },
    }
  }
  render() {
    return (
      <React.Fragment>
        <Card>
          <CardBody>
            <h4 className="card-title mb-4">Air Transport Traffic Analytics</h4>

            <Row className="align-items-center">
              <Col sm={12}>
                <ReactApexChart
                  options={this.state.options}
                  series={this.state.series}
                  type="donut"
                  height={245}
                  className="apex-charts"
                />
              </Col>
              <Col sm={12}>
                <div>
                  <Row>
                    <div className="col-6">
                      <div className="py-3">
                        <p className="mb-1 text-truncate"><i
                          className="mdi mdi-circle text-primary me-1"></i>{" "}Domestic Passenger Traffic
                            </p>
                        <h5>643221</h5>
                      </div>
                    </div>
                    <div className="col-6">
                      <div className="py-3">
                        <p className="mb-1 text-truncate"><i
                          className="mdi mdi-circle text-success me-1"></i>{" "}International Passenger Traffic</p>
                        <h5>322553</h5>
                      </div>
                    </div>
                  </Row>
                </div>
              </Col>
            </Row>
          </CardBody>
        </Card>
      </React.Fragment>
    )
  }
}

export default SalesAnalytics
