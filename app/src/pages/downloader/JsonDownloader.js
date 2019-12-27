import React, {useEffect} from "react";
import Card from "react-bootstrap/Card";
import {getAllResources} from "../../shared/actions/get-resource";
import {useSelector, useDispatch} from "react-redux";

export const JsonDownloader = () => {
	//sets value of resources to all resources in state
	const resources = useSelector(state=>(state.resource ? state.resource : []));

	//assign dispatch to dispatch variable
	const dispatch = useDispatch();

	//pass effects to useEffect
	useEffect(()=> {
		dispatch(getAllResources());});
	return (
		<>
			{resources.map(resource => {
				return(
					<Card style={{ width: '18rem' }} key={resource.resourceId}>
						<Card.Img variant="top" src={resource.resourceUrl} />
						<Card.Body>
							<Card.Text>{resource.resourceTitle}</Card.Text>
							<Card.Text>{resource.resourcePhone}</Card.Text>
							<Card.Text>
								{resource.resourceDescription}
							</Card.Text>
						</Card.Body>
					</Card>)
			})}
		</>
	)

};