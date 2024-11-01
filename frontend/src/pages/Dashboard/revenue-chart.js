import React from "react"
import ReactApexChart from "react-apexcharts"
import {
    Card,
    CardBody,
  } from "reactstrap"
  import { connect } from "react-redux"
const RevenueChart = (props) => {


    const series = [{
        name: 'Passengers',

        data: [11, 17, 15, 15, 21, 14, 15, 21, 14]
    }, {
        name: 'Freight',
        data: [13, 23, 20, 8, 13, 27, 15, 21, 14]
    }]

    const options = {
        chart: {
            stacked: !0,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !0
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: '20%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: !1
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        },
        colors: ['#eef3f7', '#ced6f9'],
        fill: {
            opacity: 1
        }
    }

    const width = props.layoutWidth === "boxed" ? 260 : 296.828;
    
    return (
        <React.Fragment>
            <Card>
                <CardBody>
                    <h4 className="card-title mb-4">Revenue from Operation (1 Unit = 1 million)</h4>
                    <div id="revenuechart">
                    <ReactApexChart
                        options={options}
                        series={series}
                        width= {width}
                        height={260}
                        type="bar"
                        className="apex-charts"
                    />
                    </div>
                </CardBody>
            </Card>
        </React.Fragment>
    )
}


const mapStateToProps = state => {
    return { ...state.Layout }
}


export default connect(mapStateToProps, null)(RevenueChart)