import React from "react";

export default function Product({
  title,
  image,
  unit_price,
  promo_price,
  des,
  rate,
  sold,
}) {
  return (
    <div className="row justify-content-center mb-3">
      <div className="col-md-12 col-xl-10">
        <div className="card shadow-0 border rounded-3">
          <div className="card-body">
            <div className="row">
              <div className="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div className="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src={image} className="w-100" />
                  <a href="#!">
                    <div className="hover-overlay">
                      <div
                        className="mask"
                        style={{
                          backgroundColor: "rgba(253, 253, 253, 0.15)",
                        }}
                      />
                    </div>
                  </a>
                </div>
              </div>
              <div className="col-md-6 col-lg-6 col-xl-6">
                <h5>{title}</h5>
                <div className="flex-row">
                  <div className="text-danger mb-1 me-2">
                    <p className="d-block">
                      Rate: {rate}
                      <i className="fa fa-star" />
                    </p>
                  </div>
                  <div>
                    {promo_price == 0 ? (
                      <span className="text-wrap">
                        Price: {unit_price}
                      </span>
                    ) : (
                      <div className="">
                        <p
                          className=""
                          
                        >
                          Old Price: <span style={{ textDecoration: "line-through" }} className="text-danger">{unit_price}</span>
                        </p>
                        <p className="">
                          New Price: <span className="text-success">{promo_price}</span>
                        </p>
                      </div>
                    )}
                  </div>
                  <div className="mt-1 mb-0 text-muted small">
                    <span>Sold: {sold}</span>
                  </div>
                  <p className="mb-4 mb-md-0">{des}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
