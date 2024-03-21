import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { BACKEND_URL, BACKEND_URL_IMAGE } from "../../constants";

const Indicator = () => {
  const [posts, setPosts] = useState([]);
  useEffect(() => {
    fetch(`${BACKEND_URL}/indicators?populate=*`)
      .then((response) => response.json())
      .then((data) => {
        setPosts(data.data);
      })
      .catch((err) => {
        console.log(err.message);
      });
  }, []);

  if (posts) {
    return posts.map((post, index) => {
      return (
        <div
          className="col-xl-3 col-md-6 d-flex"
          data-aos="fade-up"
          data-aos-delay={300}
          key={index}
        >
          <div className="member">
            <img
              src={`${BACKEND_URL_IMAGE}${post?.attributes?.image?.data?.attributes?.url}`}
              style={{ height: "280px", width: "350px", objectFit: "cover" }}
              className="img-fluid"
              alt=""
            />
            <h4>{post?.attributes.name}</h4>
            <p>{post?.attributes.description}</p>

            <Link
              to={{
                pathname: "/indicator-details",
                state: {
                  id: post?.id,
                  indicator: post?.attributes.name,
                },
              }}
            >
              <div className="social">
                <small style={{ color: "red" }}>Read more</small>
              </div>
            </Link>
          </div>
        </div>
      );
    });
  }
  return <div></div>;
};

export default Indicator;
