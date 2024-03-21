import React, { useState, useEffect } from "react";
import Common from "../inc/Common";
import { BACKEND_URL } from "../../constants";
import { Dropdown, Button } from "react-bootstrap";
import {
  Doughnut,
  Pie,
  Line,
  Scatter,
  Bar,
  HorizontalBar,
  Radar,
  Polar,
  Bubble,
} from "react-chartjs-2";
import html2canvas from 'html2canvas';
import jsPDF from 'jspdf';

const IndicatorDetailsMetaChart = (props) => {
  const {
    location: { state },
  } = props;
  const [data, setData] = useState(null);
  const [chartData, setChartData] = useState({});
  const [selectedOption, setSelectedOption] = useState(null);
  const [chartType, setChartType] = useState("bar");

  useEffect(() => {
    fetch(
      `${BACKEND_URL}/indicator-detail-metas?filters[indicator_detail][id][$eq]=${state.id}`
    )
      .then((response) => response.json())
      .then((data) => {
        setData(data.data);
      })
      .catch((err) => {
        console.log(err.message);
      });
  }, []);


  const updateChartData = (dimensions, title) => {
    const labels = [];
    const values = [];
    const colors = [
      "rgba(255, 0, 0, 0.6)", // red
      "rgba(0, 255, 0, 0.6)", // green
      "rgba(0, 0, 255, 0.6)", // blue
      "rgba(255, 255, 0, 0.6)", // yellow
      "rgba(255, 0, 255, 0.6)", // magenta
      "rgba(0, 255, 255, 0.6)", // cyan
      "rgba(128, 128, 128, 0.6)", // gray
      "rgba(255, 255, 255, 0.6)", // white
      "rgba(255, 165, 0, 0.6)", // orange
      "rgba(218, 112, 214, 0.6)", // orchid
      "rgba(138, 43, 226, 0.6)", // blueviolet
      "rgba(0, 191, 255, 0.6)", // deepskyblue
      "rgba(128, 0, 128, 0.6)", // purple
      "rgba(255, 192, 203, 0.6)", // pink
      "rgba(255, 0, 0, 0.6)", // crimson
      "rgba(0, 255, 0, 0.6)", // lime
      "rgba(0, 128, 0, 0.6)", // green-dark
      "rgba(0, 0, 128, 0.6)", // navy
      "rgba(139, 0, 139, 0.6)", // darkmagenta
      "rgba(255, 20, 147, 0.6)", // deeppink
      "rgba(218, 165, 32, 0.6)", // goldenrod
      "rgba(218, 112, 214, 0.6)", // orchid
      "rgba(75, 0, 130, 0.6)", // indigo
      "rgba(255, 69, 0, 0.6)", // orange-red
      "rgba(210, 105, 30, 0.6)", // chocolate
      "rgba(210, 180, 140, 0.6)", // tan
      "rgba(70, 130, 180, 0.6)", // steelblue
      "rgba(0, 128, 128, 0.6)" // teal
    ];
    const randomColors = [];
    data.map(() => {
      randomColors.push(colors[Math.floor(Math.random() * colors.length)]);
    });

    data.map((item, index) => {
      labels.push(item.attributes?.[`${dimensions[1].attributes?.value}`]);
      values.push(item.attributes?.[`${dimensions[0].attributes?.value}`]);
    });
    setChartData({
      labels: labels,
      datasets: [
        {
          label: title,
          data: values,
          backgroundColor: randomColors,
          // borderColor: "rgba(255, 99, 132, 1)",
          borderWidth: 0,
        },
      ],
    });
  };

  const downloadChart = () => {
    html2canvas(document.querySelector("#chart")).then(canvas => {
      const imgData = canvas.toDataURL('image/png');
      const pdf = new jsPDF("landscape");
      pdf.addImage(imgData, 'PNG', 0, 0);
      pdf.save("chart.pdf");
    });
  };

  return (
    <>
      <Common />
      <div id="chart" className="container">
        <div className="row">
          <div className="my-5 col-md-12">
            <div className="card shadow">
              <div className="card-body card-body1">
                <h4>{state.indicatorDetails}</h4>
                <Dropdown>
                  <Dropdown.Toggle variant="success" id="dropdown-basic">
                    {selectedOption}
                  </Dropdown.Toggle>
                  <Dropdown.Menu>
                    {state.feasibleDimensionCombinations?.map(
                      (value, index) => {
                        return (
                          <Dropdown.Item
                            key={index}
                            onClick={() => {
                              setSelectedOption(value.attributes?.title);
                              updateChartData(
                                value.attributes?.dimensions?.data,
                                value.attributes?.title
                              );
                            }}
                          >
                            {value.attributes?.title}
                          </Dropdown.Item>
                        );
                      }
                    )}
                  </Dropdown.Menu>
                </Dropdown>
                <div className="float-end">
                  <Button onClick={downloadChart}>Download Chart</Button>
                </div>
                <div className="text-center">
                  <div>
                    {state.feasibleCharts?.map((value, index) => {
                      console.log(value);
                      return (
                        <Button
                          variant="success"
                          className="m-1"
                          onClick={() =>
                            setChartType(`${value.attributes?.value}`)
                          }
                        >
                          {value.attributes?.name}
                        </Button>
                      );
                    })}
                    {chartType === "bar" && <Bar data={chartData} />}
                    {chartType === "line" && <Line data={chartData} />}
                    {chartType === "pie" && <Pie data={chartData} />}
                    {chartType === "doughnut" && <Doughnut data={chartData} />}
                    {chartType === "scatter" && <Scatter data={chartData} />}
                    {chartType === "horizontalbar" && (<HorizontalBar data={chartData} />)}
                    {chartType === "radar" && <Radar data={chartData} />}
                    {chartType === "polar" && <Polar data={chartData} />}
                    {chartType === "bubble" && <Bubble data={chartData} />}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default IndicatorDetailsMetaChart;
