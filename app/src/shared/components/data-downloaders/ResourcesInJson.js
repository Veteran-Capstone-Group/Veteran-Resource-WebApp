import React, {useEffect, useState} from "react";
import {useSelector, useDispatch} from "react-redux";
import {ResourceCard} from "../../../shared/components/resource-card/ResourceCard";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row"
import Col from "react-bootstrap/Col"
import Card from "react-bootstrap/Card";
import {getAllResources} from "../../../shared/actions/get-resource";
import _ from 'lodash';

export const ResourcesInJson = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.

	//variable function



	//pass side effects with inputs to useEffect
	useEffect(() => {
		dispatch(getAllResources());});

	let results = "";
	let csvObject = "";
	let csvResult="resourceId, resourceCategoryId, resourceUserId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceUrl";
	let jsonResources = resources.map((resourceItem, index) => {
		if (index !==0) {
			results = ", "
		}
		results = results + JSON.stringify(resourceItem);
		return results;
	});
	let csvResources = resources.map((resourceItem) => {
		csvObject = <li key={resourceItem.resourceId} className="list-group-item">{resourceItem.resourceId + ", " + resourceItem.resourceCategoryId + ", " + resourceItem.resourceUserId
			+ ", " + resourceItem.resourceAddress + ", " + resourceItem.resourceApprovalStatus + ", " +
			resourceItem.resourceDescription + ", " + resourceItem.resourceEmail + ", " + resourceItem.resourceImageUrl +
			", " + resourceItem.resourceOrganization + ", " + resourceItem.resourcePhone + ", " + resourceItem.resourceTitle
			+ ", " + resourceItem.resourceUrl}</li>;
		csvResult = csvObject;
		return csvResult;
	});

	return (
		<>
			<div id="mainContent">
				<Container fluid="true">
					<Row>
						<Col xs="6" style={{maxHeight: "500px"}}>
							<Card className="h-100 overflow-auto">
								<h5 className="card-title">
									Json Resources
								</h5>
								<p className="card-text">
									{"["+jsonResources+"]"}
								</p>
							</Card>
						</Col>
						<Col xs="6" style={{maxHeight: "500px"}}>
							<Card className="h-100 overflow-auto">
								<h5 className="card-title">
									CSV Resources
								</h5>
								<p className="card-text list-group">
									{csvResources}
								</p>
							</Card>
						</Col>
					</Row>
				</Container>
			</div>
		</>
	)


};