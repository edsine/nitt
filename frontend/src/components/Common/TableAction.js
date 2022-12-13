import React from "react";
import { checkPermisssion } from "../../helpers/check_permission";

const TableAction = ({
  id,
  handleEdit,
  handleDelete,
  handleChangePassword = null,
  addChangePassword = false,
  permissions = {
    edit: null,
    delete: null,
  },
}) => {
  return (
    <div style={{ display: "flex", justifyContent: "start" }}>
      {checkPermisssion(permissions.edit) && (
        <div
          style={{
            cursor: "pointer",
            color: "white",
            fontSize: ".7em",
            padding: ".5rem",
            borderRadius: ".3rem",
            background: "#FFBF00",
            marginRight: ".3rem",
          }}
          onClick={() => handleEdit(id)}
        >
          Edit
        </div>
      )}

      {checkPermisssion(permissions.edit) && addChangePassword && (
        <div
          style={{
            cursor: "pointer",
            color: "white",
            fontSize: ".7em",
            padding: ".5rem",
            borderRadius: ".3rem",
            background: "#FFBF00",
            marginRight: ".3rem",
          }}
          onClick={() => handleChangePassword(id)}
        >
          Change Password
        </div>
      )}

      {checkPermisssion(permissions.delete) && (
        <div
          style={{
            cursor: "pointer",
            color: "white",
            fontSize: ".7em",
            padding: ".5rem",
            borderRadius: ".3rem",
            background: "#fb6262",
          }}
          onClick={() => handleDelete(id)}
        >
          Delete
        </div>
      )}
    </div>
  );
};

export default TableAction;
