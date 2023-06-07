import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import Record from "./app/Record";

const AdminPage = () => {
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

  // const handleDelete = (id) => {
  //   axios
  //     .delete(`http://localhost:3000/products/${id}`)
  //     .then((response) => {
  //       // Update the list of records after deletion
  //       setRecords(records.filter((record) => record.id !== id));
  //       toast.info("Xoá thành công");
  //     })
  //     .catch((error) => {
  //       console.error("Error deleting record:", error);
  //     });
  // };

  return (
    <div className="container-fluid">
      <div className="my-3 d-flex justify-content-between align-items-center">
        <h1 className="mt-5 mb-4">Admin Dashboard</h1>
        <Link to="/" className="btn btn-default">Homepage</Link>
        <Link to="/add" className="btn btn-success">
          Add
        </Link>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">Data Table</h5>
          <div className="table-responsive">
            <table className="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Unit Price</th>
                  <th>Promotion</th>
                  <th>Description</th>
                  <th>Rate</th>
                  <th>Sold</th>
                </tr>
              </thead>
              <tbody>
                {records.map((record) => (
                  <Record
                    key={record.id}
                    id={record.id}
                    title={record.title}
                    image={record.image}
                    unit_price={record.unit_price}
                    promo_price={record.promo_price}
                    des={record.des}
                    rate={record.rate}
                    sold={record.sold}
                  />
                ))}
              </tbody>
            </table>
          </div>
          <ToastContainer />
        </div>
      </div>
    </div>
  );
};

export default AdminPage;
