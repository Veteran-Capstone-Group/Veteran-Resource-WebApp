import React from "react";
import {useSelector} from "react-redux";
import Container from "react-bootstrap/Container";


export const ResourceListJson = ({match}) => {

	const resources = useSelector(state => (state.resource ? state.resource : []));
	console.log(resources);

	return (
		<>
			<div id="resourcesJson">
				<Container fluid="true" className="overflow-auto vh-50 border border-primary">
					<p>
						{resources}
					</p>
				</Container>
			</div>
		</>
	)


};