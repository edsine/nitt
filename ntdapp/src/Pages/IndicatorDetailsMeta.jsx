import React, { useState, useEffect } from "react";
import Content from "./Content";
import {
  CDBCard,
  CDBCardBody,
  CDBDataTable,
  CDBRow,
  CDBCol,
  CDBContainer,
} from "cdbreact";
import Common from "../inc/Common";
import { BACKEND_URL } from "../../constants";

const IndicatorDetailsMeta = (props) => {
  const [data, setData] = useState(null);

  const {
    location: { state },
  } = props;

  useEffect(() => {
    fetch(`${BACKEND_URL}/indicator-detail-metas?filters[indicator_detail][id][$eq]=${state.id}`)
      .then((response) => response.json())
      .then((data) => {
        setData(data.data);
        console.log(data.data);
      })
      .catch((err) => {
        console.log(err.message);
      });
  }, []);

  const tabledata = () => {
    // const tableColumns = state.columns?.map(
    //   ({ value: field, name: label, ...rest }) => ({
    //     field,
    //     label,
    //     width: 150,
    //     attributes: {
    //       "aria-controls": "DataTable",
    //     },
    //     ...rest,
    //   })
    // );

    const tableColumns = state.columns?.map((item, index) => {
      item.label = item.attributes.name;
      item.field = item.attributes.value;
      item.width = 150;
      return item;
    });

    return {
      columns: tableColumns,
      rows: data
        ?.map((item, index) => {
          tableColumns.forEach((element) => {
            const field = element.field;
            item[field] = item.attributes[field];
          });
          return item;
        }),
    };
  };
  return (
    <>
      <Common />
      <div className="my-5 py-5">
        <div style={{ maxWidth: "990px", margin: "auto" }}>
          <div className="card mb-3">
            <div className="card-body">
            <h4>{state.indicatorDetails}</h4>
              <CDBDataTable
                striped
                bordered
                hover
                paging={false}
                data={tabledata()}
                height={295}
              />
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default IndicatorDetailsMeta;
