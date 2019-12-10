import React, {useEffect} from "react";
import {useSelector, useDispatch} from "react-redux";

import {ResourceCard} from "../../shared/components/resource-card/ResourceCard";
import {getResourceByResourceCategory} from "../../shared/actions/get-resource";

import Container from "react-bootstrap/Container";


export const ResourcesInCategory = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();
	const resourceList = getResourceByResourceCategory(match.params.resourceCategoryId);

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.
	const effects = () => {
		dispatch(resourceList);
	};

	//declare inputs
	const inputs = [match.params.resourceCategoryId];

	//pass side effects with inputs to useEffect
	useEffect(effects, inputs);
	const resourceArray = [];
	for(let i = 0; i < Object.keys(resources).length; i++) {
		resourceArray.push(resources[i]);
	}

	return (
		<>
			<div id="mainContent">
				<Container fluid="true">
					{resourceArray.map((resourceItem) => {
							return <ResourceCard resource={resourceItem} key={resourceItem}/>;
						}
					)}
				</Container>
			</div>
		</>
	)


};