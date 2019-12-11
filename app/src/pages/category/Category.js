import React, {useEffect, useState} from "react";
import {useSelector, useDispatch} from "react-redux";
import {ResourceCard} from "../../shared/components/resource-card/ResourceCard";
import Container from "react-bootstrap/Container";
import {getUsefulsAndResources} from "../../shared/actions/get-useful";
import _ from 'lodash';

export const ResourcesInCategory = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));
	const usefuls = useSelector(state => state.useful ? state.useful : []);


	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	const [usefulCount, setUsefulCount] = useState(0);
	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.


	//pass side effects with inputs to useEffect
	useEffect(() => {
		dispatch(getUsefulsAndResources(match.params.resourceCategoryId));}, [match.params.resourceCategoryId]);

	//count useful function for sorting
	const countResourceUsefuls = (resourceId) => {
		const usefulResources = usefuls.filter(useful => useful.usefulResourceId === resourceId);
		return (usefulResources.length);
	};

	//sorts resources, most usefuls first.
	let sortedResources = _.sortBy(resources,[function(o) {return 0-countResourceUsefuls(o.resourceId)}]);

	return (
		<>
		<div id="mainContent">
			<Container fluid="true">
					{sortedResources.map((resourceItem) => {
						return <ResourceCard resource={resourceItem} key={resourceItem.resourceId} />;
					}
					)}
				</Container>
			</div>
		</>
	)


};