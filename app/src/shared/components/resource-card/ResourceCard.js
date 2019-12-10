import React, {useEffect} from "react";
import {httpConfig} from "../../utils/http-config";
import 'bootstrap/dist/css/bootstrap.css';
import {UseJwt, UseJwtUserId} from "../../utils/JwtHelpers";
import {useSelector, useDispatch} from "react-redux";
import {handleSessionTimeout} from "../../utils/handle-session-timeout";
import Usefuls from "../Usefuls";
import {UseWindowWidth} from "../../utils/UseWindowWidth"
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {getResourceByResourceId} from "../../actions/get-resource";
import Button from "react-bootstrap/Button";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {getCountByUsefulResourceId} from "../../actions/get-useful";


//export component
export const	ResourceCard = ({resource}) =>{
	//Store screen width on resize event to allow different views on mobile vs desktop
	const width = UseWindowWidth();

	//grab JWT Token for logged in users
	// const jwt = UseJwt();
	const userId = "ca38847b-1449-41b7-b794-6232ffcccc74";

	//assign values for variables of resource
	const {resourceId, resourceTitle, resourceOrganization, resourceEmail, resourceAddress, resourcePhone, resourceUrl, resourceImageUrl, resourceDescription} = resource;
	console.log("resource has been loaded");

	return (
		<>
			<Container className="d-block" id="resourceTray">
				<Row className="border border-primary rounded bg-light my-4 py-2 px-2">
					{resourceImageUrl === "" ? ("") : (
						<Col xs={3} className="d-inline">
							<img src={resourceImageUrl} className="img-fluid" alt="Employment Icon"/>
						</Col>
					)}
					<Col className="d-inline">
						<Row className="border-bottom border-primary py-0 d-flex align-content-between">
							<h3 className="font-weight-bold col align-bottom pb-0 mb-0 pt-2 d-block text-truncate">
								<a href={resourceUrl}>{resourceTitle}</a>
							</h3>
							<Usefuls  key={resourceId} userId={userId} resourceId={resourceId}/>
						</Row>
						<div className="row pt-1">
							<div className="col align-bottom">
								<div className="row py-0 mt-1">
									<p className="col-6 text-left d-block text-truncate py-0 my-0 font-weight-light">{resourceOrganization}
										</p>
									<p className="col-6 text-right d-block text-truncate py-0 my-0 font-weight-light">{resourceAddress}</p>
								</div>
								<div className="row py-0 mt-1">
									<p className="col-6 text-left d-block text-truncate py-0 my-0 font-weight-light">{resourcePhone}</p>
									<p className="col-6 text-right d-block text-truncate py-0 my-0 font-weight-light">
										{resourceEmail}</p>
								</div>
								<div className="row pt-2">
									<p>{resourceDescription}</p>
								</div>
							</div>
						</div>
					</Col>
				</Row>
			</Container>

		</>
	)

};
export default ResourceCard;

