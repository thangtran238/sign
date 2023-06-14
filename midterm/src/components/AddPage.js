import React, { useState } from "react";
import axios from "axios";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

const AddPage = () => {
  const [formData, setFormData] = useState({
    title: "",
    unit_price: "",
    image: "",
    promo_price: "",
    des: "",
    rate: "",
    sold: "",
  });

  const handleChange = (event) => {
    const { name, value } = event.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const { title, unit_price, image, promo_price, des, rate, sold } = formData;

    if (!title || !unit_price) {
      toast.warn("Vui lòng nhập đủ nội dung");
    } else {
      const form = new FormData();
      form.append("title", title);
      form.append("unit_price", unit_price);
      form.append("image", image);
      form.append("promo_price", promo_price);
      form.append("des", des);
      form.append("rate", rate);
      form.append("sold", sold);

      axios
        .post("http://localhost:8000/api/add", form)
        .then((res) => {
          toast.success("Thêm sản phẩm thành công");
          window.location.href = "/admin";
        })
        .catch((err) => {
          console.log(err);
        });
    }
  };

  const handleClear = () => {
    setFormData({
      title: "",
      unit_price: "",
      image: "",
      promo_price: "",
      des: "",
      rate: "",
      sold: "",
    });
    toast.info("Cleared form");
  };

  return (
    <div className="container-fluid">
      <h1 className="mt-5 mb-4">Add Page</h1>

      <div className="card">
        <div className="card-body">
          <h5 className="card-title">Add Record</h5>
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <label>Title:</label>
              <input
                type="text"
                name="title"
                value={formData.title}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="form-group">
              <label>Unit Price:</label>
              <input
                type="text"
                name="unit_price"
                value={formData.unit_price}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="form-group">
              <label>Promo Price:</label>
              <input
                type="text"
                name="promo_price"
                value={formData.promo_price}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="form-group">
              <label>Image:</label>
              <input
                type="text"
                name="image"
                value={formData.image}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="form-group">
              <label>Description:</label>
              <textarea
                name="des"
                value={formData.des}
                onChange={handleChange}
                className="form-control"
              ></textarea>
            </div>
            <div className="form-group">
              <label>Rate:</label>
              <input
                type="text"
                name="rate"
                value={formData.rate}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="form-group">
              <label>Sold:</label>
              <input
                type="text"
                name="sold"
                value={formData.sold}
                onChange={handleChange}
                className="form-control"
              />
            </div>
            <div className="d-grid gap-2">
              <button type="submit" className="btn btn-primary">
                Add Record
              </button>
              <button
                type="button"
                className="btn btn-secondary"
                onClick={handleClear}
              >
                Clear
              </button>
            </div>
          </form>
          <ToastContainer />
        </div>
      </div>
    </div>
  );
};

export default AddPage;
