import React, {useEffect, useState, useRef} from "react";
import {useSelector, useDispatch} from "react-redux";
import {ResourceCard} from "../../../shared/components/resource-card/ResourceCard";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row"
import Col from "react-bootstrap/Col"
import Card from "react-bootstrap/Card";
import {getAllResources} from "../../../shared/actions/get-resource";
import _ from 'lodash';

export const ResourcesInJson = ({match}) => {

	const [jsonCopySuccess, setJsonCopySuccess] = useState('');
	const [csvCopySuccess, setCsvCopySuccess] = useState('');
	const jsonAreaRef = useRef(null);
	const csvAreaRef = useRef(null);

	function jsonToClipboard(e) {
		jsonAreaRef.current.select();
		document.execCommand('copy');
		// This is just personal preference.
		// I prefer to not show the the whole text area selected.
		e.target.focus();
		setJsonCopySuccess('Copied!');
	};

	function csvToClipboard(e) {
		csvAreaRef.current.select();
		document.execCommand('copy');
		// This is just personal preference.
		// I prefer to not show the the whole text area selected.
		e.target.focus();
		setCsvCopySuccess('Copied!');
	};

	const resources = useSelector(state => (state.resource ? state.resource : []));

	//assigns useDispatch to dispatch variable
	const dispatch = useDispatch();

	//pass side effects with inputs to useEffect
	useEffect(() => {
		dispatch(getAllResources());});

	let results = "";
	let csvObject = "";
	let csvResult = "";
	let csvTitle="resourceId, resourceCategoryId, resourceUserId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceUrl";
	let jsonResources = resources.map((resourceItem, index) => {
		if (index !==0) {
			results = ", "
		}
		results = results + JSON.stringify(resourceItem);
		return results;
	});
	let csvResources = resources.map((resourceItem) => {
		csvObject = resourceItem.resourceId + ", " + resourceItem.resourceCategoryId + ", " + resourceItem.resourceUserId
			+ ", " + resourceItem.resourceAddress + ", " + resourceItem.resourceApprovalStatus + ", " +
			resourceItem.resourceDescription + ", " + resourceItem.resourceEmail + ", " + resourceItem.resourceImageUrl +
			", " + resourceItem.resourceOrganization + ", " + resourceItem.resourcePhone + ", " + resourceItem.resourceTitle
			+ ", " + resourceItem.resourceUrl;
		csvResult = csvObject;
		return csvResult;
	});

	return (
		<>
			<div id="mainContent">
				<Container fluid="true">
					<Row>
						<Col lg="6" style={{height: "500px"}}>
							<Card className="h-100 overflow-auto">
								<h5 className="card-title">
									Json Resources
								</h5>
								<textarea ref={jsonAreaRef} className="card-text h-75" value={"["+jsonResources+"]"}/>
								{
									/* Logical shortcut for only displaying the
										button if the copy command exists */
									document.queryCommandSupported('copy') &&
									<div className="py-3">
										<button onClick={jsonToClipboard}>Copy</button> <br/>
										{jsonCopySuccess}
									</div>
								}
							</Card>
						</Col>
						<Col lg="6" style={{maxHeight: "1000px"}}>
							<Card className="h-100 overflow-auto">
								<h5 className="card-title">
									CSV Resources
								</h5>
								<textarea ref={csvAreaRef} className="card-text h-75" value={"["+csvTitle+"\n"+csvResources.join("\n")+"]"}/>
								{
									/* Logical shortcut for only displaying the
										button if the copy command exists */
									document.queryCommandSupported('copy') &&
									<div className="py-3">
										<button onClick={csvToClipboard}>Copy</button> <br/>
										{csvCopySuccess}
									</div>
								}
							</Card>
						</Col>
					</Row>
				</Container>
			</div>
		</>
	)


};