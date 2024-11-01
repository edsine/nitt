import React from 'react';
import "../App.css";

function Column({ header, content, background, backgroundImage }) {
  const columnStyle = {
    background: background || 'transparent', // Default to transparent if no background provided
    backgroundImage: backgroundImage ? backgroundImage : 'none', 
    
  };

  return (
    <div className="column" style={columnStyle}>
      {header && (
        <div className="headerDisplay">
          <h2>{header}</h2>
        </div>
      )}
      <p>{content}</p>
    </div>
  );
}

function TwoColumnDiv({ leftColumn, rightColumn }) {
  return (
    <div className="two-column-container">
      <Column 
        header={leftColumn.header} 
        content={leftColumn.content} 
        background={leftColumn.background} 
      />
      <Column 
        header={rightColumn.header} 
        content={rightColumn.content} 
        background={rightColumn.background} 
      />
    </div>
  );
}

export default TwoColumnDiv;
