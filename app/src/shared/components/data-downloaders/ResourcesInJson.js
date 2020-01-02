import React, {useEffect, useState} from "react";
import {useSelector, useDispatch} from "react-redux";
import {ResourceCard} from "../../../shared/components/resource-card/ResourceCard";
import Container from "react-bootstrap/Container";
import {getAllResources} from "../../../shared/actions/get-resource";
import _ from 'lodash';

export const ResourcesInJson = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.


	//pass side effects with inputs to useEffect
	useEffect(() => {
		dispatch(getAllResources());});
	let resourcesHere = resources;
	let jsonResources = "";
	jsonResources = resourcesHere.map((resourceItem) => {
		jsonResources = jsonResources +", "+ JSON.stringify(resourceItem);
		return jsonResources;
	});
console.log(resourcesHere);
	return (
		<>
			<div id="mainContent">
				<Container fluid="true">
					{jsonResources}
				</Container>
			</div>
		</>
	)


};