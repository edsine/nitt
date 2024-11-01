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
          <Link to={`/datasetdetails/${name}`} className="btn btn-primary">
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
    <div className="bg-green-100 min-h-screen p-4">
      {/* Navigation Links */}
      <nav>
        <ul className="nav justify-center gap-1 mb-3">
          <li className="nav-item bg-sky-500 rounded-lg">
            <a className="links nav-link active text-white " aria-current="page" href="/charttemp">Charts</a>
          </li>
          <li className="nav-item rounded-lg bg-sky-500">
            <a className="links nav-link text-white" href="/tabletemp">Tables</a>
          </li>
        </ul>
      </nav>

      {/* Card Content */}
      <div className="row">
        {cards.map((card, index) => (
          <Card key={index} name={card.name} image={card.image} />
        ))}
      </div>
    </div>
  );
}

export default Home;
