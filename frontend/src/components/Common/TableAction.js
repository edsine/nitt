import React from "react";

const TableAction = ({ id, handleEdit, handleDelete }) => {

    return (
        <div style={{ display: "flex", justifyContent: "space-between" }}>
            <div
                style={{
                    cursor: "pointer",
                    color: "white",
                    fontSize: ".7em",
                    padding: ".5rem",
                    borderRadius: ".3rem",
                    background: "#FFBF00",
                    marginRight: ".3rem"
                }}
                onClick={() => handleEdit(id)}
            >
                Edit
            </div>
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
        </div>
    );
}

export default TableAction;