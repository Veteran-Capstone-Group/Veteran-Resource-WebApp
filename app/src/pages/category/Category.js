import React, {useEffect} from "react";
import {useSelector, useDispatch} from "react-redux";

import {ResourceCard} from "../../shared/components/resource-card/ResourceCard";
import {getResourceByResourceCategory} from "../../shared/actions/get-resource";

import Container from "react-bootstrap/Container";

import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {getUsefulsAndResources} from "../../shared/actions/get-useful";



export const ResourcesInCategory = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));


	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.


	//pass side effects with inputs to useEffect

	useEffect(() => {
		dispatch(getUsefulsAndResources(match.params.resourceCategoryId));
	}, [match.params.resourceCategoryId]);

	return (
		<>
		<div>
			<Container fluid="true">
					{resources.map((resourceItem) => {
						return <ResourceCard resource={resourceItem} key={resourceItem.resourceId} />;
					}
					)}
				</Container>
			</div>
		</>
	)


};