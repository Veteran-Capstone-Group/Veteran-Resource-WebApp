import React, {useState, useEffect} from "react";
import Container from "react-bootstrap/Container";
import {getJsonResources} from "../../shared/actions/json-downloader";
import {useSelector, useDispatch} from "react-redux";

export const JsonDownloader = ({match}) => {
	//sets value of resources to all resources in state
	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assign dispatch to dispatch variable
	const dispatch = useDispatch();

	//pass effects to useEffect
	useEffect(()=> {
		dispatch(getJsonResources());});

	return (
		<>
			<Container className="border border-primary border">
				{resources};
			</Container>
		</>
	)

};