import React from "react";
import TwoColumnDiv from "../Components/TwoColumnDiv";
import bg from "../assets/image1.jpg";
import { Container } from "react-bootstrap";

export default function HomeCopy() {
  const leftColumn = {
    header: "The National Transport Databank",
    content: [
      "The National Transport Databank is Nigeria and Africa’s first online, real-time, nationwide comprehensive transportation database. It consist of various categories of data such as – nationwide - urban transport networks (Air, Road, Rail, and Water), critical and commercial infrastructure (e.g. Pipelines), individual travel, public ...Read More",
      <br />,
      <br />,
      "Providing specialized transportation data collection, aggregation and dissemination in template, formats, and functions that meet the needs of an evolving Transportation Sector. The Data Bank is a coherent system of data collection and storage that covers every aspect of Transportation Business.",
    ],
    background: "lightblue",
  };

  const rightColumn = {
    header: "Right Column",
    content: "This is the content of the right column.",
    backgroundImage: `url(${bg})`, // Corrected string interpolation
  };

  return (
    <section>
      <Container fluid>
        <div className="video-container">
          <iframe
            src="https://www.youtube.com/embed/jnLSYfObARA?si=e5a_DPmRClbYqBll"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen
          ></iframe>
          {/* <video autoPlay loop muted playsInline className="back-video"></video> */}
        </div>
        <div id="text">
          <h1>Use a youtube video as a full screen background with CSS</h1>
        </div>
      </Container>
    </section>
  );
}
