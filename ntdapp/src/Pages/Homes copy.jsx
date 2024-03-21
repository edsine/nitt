import React, { useState, useEffect } from 'react';
import dataset from '../Components/JsonData/DataSets.json';
import cardImages from '../Components/JsonData/cardimage.json';
import { Link } from 'react-router-dom';

function Card({ name, image }) {
  return (
    <div className="col-md-3 mb-4">
      <div className="card">
        <img src={image} alt={name} className="card-img-top" style={{ height: '200px', objectFit: 'cover' }} />
        <div className="card-body">
          <h5 className="card-title">{name}</h5>
          <Link to={`/datasets/${name}`} className="btn btn-primary"> {/* Changed datasetdetails to datasets */}
            Read More
          </Link>
        </div>
      </div>
    </div>
  );
}

function Home() {
  const [cards, setCards] = useState([]);

  useEffect(() => {
    const cardData = dataset.datasets.map((data) => ({
      name: data.name,
      image: cardImages[data.name], // Assuming cardImages contains image URLs corresponding to dataset names
    }));
    setCards(cardData);
  }, []);

  return (
    <div className="row">
      {cards.map((card, index) => (
        <Card key={index} name={card.name} image={card.image} />
      ))}
    </div>
  );
}

export default Home;
