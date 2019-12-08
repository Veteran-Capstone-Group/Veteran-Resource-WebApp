import React, {useEffect} from "react";
import {Link} from "react-router-dom";
import {useSelector, useDispatch} from "react-redux";

import {ResourceCard} from "../../shared/components/resource-card/ResourceCard";
import {UseWindowWidth} from "../../shared/utils/UseWindowWidth";
import {UseJwt, UseJwtUserId} from "../../shared/utils/JwtHelpers";
import {getResourceByResourceCategory} from "../../shared/actions/get-resource";

import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";

export const ResourcesInCategory = (categoryId) => {
	/*
* const width holds the value of the screen width on the resize event.
* See: UseWindowWidth
* */
	const width = UseWindowWidth();

	// grab jwt for logged in users
	const jwt = UseJwt();
	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.
	const effects = () => {
		dispatch(getResourceByResourceCategory());
	};

	//declare inputs
	const inputs = [categoryId];

	//pass side effects with inputs to useEffect
	useEffect(effects, inputs);

	return (
		<>
			<Container>
				<Col>
					<p>hello</p>
					{resources.map(resource =>
						<ResourceCard resource={resource} key={resources.resourceId}/>
					)}
				</Col>
			</Container>


		</>
	)



};