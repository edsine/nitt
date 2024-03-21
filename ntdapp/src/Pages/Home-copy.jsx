import React from "react";
import TwoColumnDiv from "../Components/TwoColumnDiv";
import bg from "../assets/image1.jpg";
import dgVideo from "../assets/dgGlobe.mp4";
import { RailImg } from "../Components/Images";

// conatainers
import Container from "react-bootstrap/Container";
import ProgressBar from "react-bootstrap/ProgressBar";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
// image form react bootstrap
import Image from "react-bootstrap/Image";

export default function HomeCopy() {
  // data for services offered
  const serviceData = [
    {
      id: 1,
      image: require("../assets/cityScape.jpg"),
      title:
        "Sustainable Transport Policy initiation, formulation, execution, monitoring and evaluation.",
    },
    {
      id: 2,
      image: require("../assets/naija.jpg"),
      title:
        "Supply and demand analyses of individual transport infrastructure and facilities for all modes of transport.",
    },
    {
      id: 3,
      image: require("../assets/sharing2.jpg"),
      title:
        "Improve data sharing and collaboration amongst the transport stakeholders. ",
    },
    {
      id: 4,
      image: require("../assets/impact.jpg"),
      title:
        "Collaborates with the Federal Ministry of Finance, Budget and National Planning on developing   Transportation Plans for Nigeria",
    },
    {
      id: 5,
      // image: require("../assets/images/img6.jpg"),
      title:
        "Increase understanding in transport flow activity and predictions leading to better optimisations, which in turn will improve transport system effectiveness",
    },
    {
      id: 6,
      // image: require("../assets/images/img7.jpg"),
      title:
        "The development of an active and trusted digital transport ecosystem for all stakeholders",
    },
  ];

  // data for progress bar
  const bar1 = 80;
  const bar2 = 75;
  const bar3 = 95;

  return (
    <>
      {/* Hero section */}
      <section>
        <Container fluid>
          <div className="hero">
            <div className="back-video">
              <div className="color-overlay"></div>
              <video autoPlay loop muted playsInline>
                <source src={dgVideo} type="video/mp4" />
              </video>
            </div>
            <div id="text">
              {/* <h1>The National Transport Databank</h1> */}
              <h1>
                Unlocking the Power of Big Data for Transportation Excellence
              </h1>
              <a href="#">Explore</a>
            </div>
          </div>
        </Container>
      </section>

      {/* About section */}
      <section id="About" className="block about-block mb-5">
        <Container fluid>
          <div className="title-holder m-5">
            <h2>The National Transport Databank</h2>
            <div className="subtitle">Learn more about us</div>
          </div>
          <Row>
            <Col sm={6}>
              <RailImg />
            </Col>
            <Col sm={6}>
              <p>
                Welcome to the National Transport Databank, where innovation
                meets efficiency. As Nigeria and Africa's first online,
                real-time, nationwide comprehensive transportation database, by
                harnessing the potential of Big Data, we are empowered to make
                informed and impactful decisions that revolutionize
                transportation systems nationwide.
              </p>
              <p>
                Providing specialized transportation data collection,
                aggregation and dissemination in template, formats, and
                functions that meet the needs of an evolving Transportation
                Sector. The Data Bank is a coherent system of data collection
                and storage that covers every aspect of Transportation Business.
              </p>
              <div className="progress-block">
                <h4>Lorem ipsum dolor sit amet consectetur</h4>
                <ProgressBar now={bar1} label={`${bar1}%`} />
              </div>
              <div className="progress-block">
                <h4>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </h4>
                <ProgressBar now={bar2} label={`${bar2}%`} />
              </div>
              <div className="progress-block">
                <h4>Lorem, ipsum dolor.</h4>
                <ProgressBar now={bar3} label={`${bar3}%`} />
              </div>
            </Col>
          </Row>
        </Container>
      </section>

      <hr />

      {/* services section */}
      <section id="services" className="block service-block">
        <Container fluid>
          <div className="title-holder mb-4">
            <h2>What We Do</h2>
            <div className="subtitle">
              The National Transport Data Bank is a comprehensive data
              collection and storage system that covers all aspects of the
              transportation industry. Providing the right data is critical and
              as a result, the National Transport Databank will improve the
              current transport data technology by handling the following
              responsibilities:
            </div>
          </div>
          <Row className="servicesProvided">
            {serviceData.map((service) => {
              return (
                <Col sm={4} key={service.id}>
                  <div className="services-wrapper">
                    <Image src={service.image} thumbnail />
                    <div className="label text-center">
                      <h3>{service.title}</h3>
                    </div>
                  </div>
                </Col>
              );
            })}
          </Row>
        </Container>
      </section>
    </>
  );
}
