import React from 'react';
import TwoColumnDiv from '../Components/TwoColumnDiv';
import bg from '../assets/image1.jpg';

export default function Home() {
  const leftColumn = {
    header: 'The National Transport Databank',
    content: [
      'The National Transport Databank is Nigeria and Africa’s first online, real-time, nationwide comprehensive transportation database. It consist of various categories of data such as – nationwide - urban transport networks (Air, Road, Rail, and Water), critical and commercial infrastructure (e.g. Pipelines), individual travel, public ...Read More',
      <br />,
      <br />,
      'Providing specialized transportation data collection, aggregation and dissemination in template, formats, and functions that meet the needs of an evolving Transportation Sector. The Data Bank is a coherent system of data collection and storage that covers every aspect of Transportation Business.',
    ],
    background: 'lightblue',
  };

  const rightColumn = {
    header: 'Right Column',
    content: 'This is the content of the right column.',
    backgroundImage: `url(${bg})`, // Corrected string interpolation
  };
  
  return (
    <div className='container-fluid' style={{ height: '100vh' }}>
      <TwoColumnDiv leftColumn={leftColumn} rightColumn={rightColumn} />
    </div>
  );
}
