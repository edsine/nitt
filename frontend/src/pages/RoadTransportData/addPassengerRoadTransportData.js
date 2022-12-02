import React, { useState } from 'react';
import { Modal, Button, Row, Col, Label } from 'reactstrap';
import { AvForm, AvField } from "availity-reactstrap-validation"

const AddPassengerRoadTransportData = (props) => {
    const { isOpen, setIsOpen } = props;

    const removeBodyCss = () => {
        document.body.classList.add("no_padding")
    }
    const toggle = () => {
        setIsOpen(!isOpen)
        removeBodyCss()
    }

    return (
        <Modal
            isOpen={isOpen}
            toggle={() => {
                toggle()
            }}
        >
            <AvForm className="needs-validation">
                <div className="modal-header">
                    <h5 className="modal-title mt-0" id="myModalLabel">
                        Add Passenger Road Transport Data
                    </h5>
                    <button
                        type="button"
                        onClick={() => {
                            setIsOpen(false)
                        }}
                        className="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body">
                    <Row>
                        <Col md="6">
                            <div className="mb-3">
                                <Label htmlFor="year">Year</Label>
                                <AvField
                                    name="year"
                                    placeholder=""
                                    type="date"
                                    errorMessage="Select a Year"
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="year"
                                />
                            </div>
                        </Col>
                        <Col md="6">
                            <div className="mb-3">
                                <Label htmlFor="numberOfPassengersCarried">Passengers Carried</Label>
                                <AvField
                                    name="number_of_passengers_carried"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Number of Passengers Carried."
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="numberOfPassengersCarried"
                                />
                            </div>
                        </Col>
                    </Row>
                    <Row>
                        <Col md="4">
                            <div className="mb-3">
                                <Label htmlFor="numberOfVehicleInFleet">No. of Vehicles in Fleet</Label>
                                <AvField
                                    name="number_of_vehicle_in_fleet"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Number of Vehicles in Fleet."
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="numberOfVehicleInFleet"
                                />
                            </div>
                        </Col>
                        <Col md="4">
                            <div className="mb-3">
                                <Label htmlFor="revenueFromOperation">Revenue from Operation</Label>
                                <AvField
                                    name="revenue_from_operation"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Revenue from Operations"
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="revenueFromOperation"
                                />
                            </div>
                        </Col>
                        <Col md="4">
                            <div className="mb-3">
                                <Label htmlFor="numberOfEmployees">Number of Employees</Label>
                                <AvField
                                    name="zip"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Number of Employees"
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="numberOfEmployees"
                                />
                            </div>
                        </Col>
                        <Col md="12">
                            <div className="mb-3">
                                <Label htmlFor="annual_cost_of_vehicle_maintenance">Annual Cost of Vehicle Maintenance</Label>
                                <AvField
                                    name="annualCostOfVehicleMaintenance"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Annual Cost of Vehicle Maintenance"
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="annualCostOfVehicleMaintenance"
                                />
                            </div>
                        </Col>
                        <Col md="4">
                            <div className="mb-3">
                                <Label htmlFor="numberOfAccidents">No. of Accidents</Label>
                                <AvField
                                    name="number_of_accidents"
                                    placeholder=""
                                    type="number"
                                    errorMessage="Enter Number of Accidents"
                                    className="form-control"
                                    validate={{ required: { value: true } }}
                                    id="numberOfAccidents"
                                />
                            </div>
                        </Col>
                    </Row>
                </div>
                <div className="modal-footer">
                    <button
                        type="button"
                        onClick={() => {
                            toggle()
                        }}
                        className="btn btn-primary waves-effect"
                        data-dismiss="modal"
                    >
                        Close
                    </button>
                    <button
                        type="submit"
                        className="btn btn-primary waves-effect waves-light"
                    >
                        Save changes
                    </button>
                </div>
            </AvForm>
        </Modal >
    );
}

export default AddPassengerRoadTransportData;