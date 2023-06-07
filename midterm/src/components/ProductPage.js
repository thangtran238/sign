import React, { useState, useEffect } from "react";
import axios from "axios";
import Product from "./Product";
import {Link} from "react-router-dom";
export default function ProductPage() {
  const [records, setRecords] = useState([]);

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/get-product")
      .then((response) => {
        setRecords(response.data);
      })
      .catch((error) => {
        console.error("Error retrieving records:", error);
      });
  }, []);
  return (
    <section style={{ backgroundColor: "#eee" }}>
      <div className="d-flex justify-content-between p-5 align-items-center">
        <h2 className="text-primary">Tiki</h2>
        <Link className="btn btn-dark" to={"/admin"}>Admin Page</Link>
      </div>
      <div className="container py-5">
        {records.map((record) => (
          <Product
          key={record.id}
            title={record.title}
            image={record.image}
            unit_price={record.unit_price}
            promo_price={record.promo_price}
            des={record.des}
            rate={record.rate}
            sold={record.sold}
          />
        ))}
      </div>
    </section>
  );
}
