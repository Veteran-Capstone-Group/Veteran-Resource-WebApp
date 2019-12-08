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

export const ResourcesInCategory = ({match}) => {
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
	const resourceList = getResourceByResourceCategory(match.params.resourceCategoryId);

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.
	console.log(match.params.resourceCategoryId);
	const effects = () => {
		dispatch(resourceList);
	};

	//declare inputs
	const inputs = [match.params.resourceCategoryId];

	//pass side effects with inputs to useEffect
	useEffect(effects, inputs);
	console.log(resources);
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