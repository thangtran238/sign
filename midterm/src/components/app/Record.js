import React from "react";
import { Link } from "react-router-dom";
const Record = ({
  id,
  title,
  rate,
  sold,
  unit_price,
  promo_price,
  des,
  image
}) => {


  return (
    <tr>
      <td>{id}</td>
      <td>{title}</td>
      <td>
        <img className="img-fluid rounded shadow" src={image} alt="" width={50} height={50}/>
      </td>
      <td>{unit_price}</td>
      <td>{promo_price}</td>
      <td>{des}</td>
      <td>{rate}</td>
      <td>{sold}</td>
    </tr>
  );
};

export default Record;
