import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import {UseJwtUserId} from "../../utils/JwtHelpers";
import Usefuls from "../Usefuls";
import {UseWindowWidth} from "../../utils/UseWindowWidth"
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";

//export component
export const	ResourceCard = ({resource}) =>{
	//Store screen width on resize event to allow different views on mobile vs desktop
	const width = UseWindowWidth();

	//grab JWT Token for logged in users
	const userId = UseJwtUserId;

	//assign values for variables of resource
	const {resourceId, resourceTitle, resourceOrganization, resourceEmail, resourceAddress, resourcePhone, resourceUrl, resourceImageUrl, resourceDescription} = resource;
	const googleMapsSearch = ("https://www.google.com/maps/place/" + resourceAddress.split(" ").join("+"));
	const callHref = "tel: " + resourcePhone;
if (width>991) {
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
								<Usefuls resourceId={resourceId} userId={userId}/>
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
			)} else if (window.location.pathname === "/") {
return (
	<>
				<div className="container d-none" id="resourceTray">
					<div className="border border-primary rounded my-4 py-0 px-2 mh-100 bg-light">
						<div className="row">
							<div className="col d-inline">
								<div className="row border-bottom border-primary mx-1 py-0 pr-1">
									<p className="font-weight-bold col align-bottom mb-0 p-0 mx-1 d-block text-truncate text-left">
										<a href={resourceUrl}>{resourceTitle}</a></p>
									<Usefuls resourceId={resourceId} userId={userId}/>
								</div>
								<div className="row pt-1 mx-1 small">
									<p>{resourceDescription}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
		</>
)} else if (resourceImageUrl === "") {
return(

	<>
				<div className="container d-lg-none h-25" id="resourceTray">
					<div className="border border-primary rounded my-4 py-2 px-2 mh-100 bg-light">
						<div className="row">
							<div className="col d-inline">
								<div className="row border-bottom border-primary mx-1 py-0 pr-1">
									<p className="font-weight-bold col align-bottom mb-0 p-0 mx-1 d-block text-truncate text-left">
										<a href={resourceUrl}>{resourceTitle}</a></p>
									<Usefuls resourceId={resourceId} userId={userId}/>
								</div>
								<div className="row pt-1 mx-1 small">
									<p>{resourceDescription}</p>
								</div>
							</div>
						</div>
						<div className="row d-flex justify-content-around">
							{resourceAddress === "" ? (""):
								<a href={googleMapsSearch}><button type="button" className="btn btn-primary">Directions</button></a>
							}
							{resourcePhone === "" ? ("") :
								<a href={callHref}><button type="button" className="btn btn-primary">Call: {resourcePhone}</button></a>
							}
						</div>
					</div>
				</div>
		</>
)} else {
	return(

				<div className="container d-lg-none h-25" id="resourceTray">
					<div className="border border-primary rounded my-4 py-2 px-2 mh-100 bg-light">
						<div>
							<div className="row">
								<div className="col d-inline">
									<div className="row border-bottom border-primary py-0 px-1 mx-1">
										<div className="col-2 pb-1 px-0">
											<img className="img-fluid d-inline border-primary" src={resourceImageUrl} alt="icon for resource"/>
										</div>
										<div className="col-10 my-0 p-0 pr-3">
											<Row>
												<p className="text-white">.</p>
											</Row>
											<Row>
												<p className="font-weight-bold col align-bottom mb-0 pl-4 py-0 pr-0 d-block text-truncate text-left">
													<a href={resourceUrl}>{resourceTitle}</a>
												</p>
												<Usefuls resourceId={resourceId} userId={userId}/>
											</Row>
										</div>
									</div>
									<div className="row pt-1 mx-1 small">
										<p>{resourceDescription}</p>
									</div>
								</div>
							</div>
							<div className="row d-flex justify-content-around">
								{resourceAddress === "" ? (""):
									<a href={googleMapsSearch}><button type="button" className="btn btn-primary">Directions</button></a>
								}
								{resourcePhone === "" ? ("") :
									<a href={callHref}><button type="button" className="btn btn-primary">Call: {resourcePhone}</button></a>
								}
							</div>
						</div>
					</div>
				</div>
	)}
};
export default ResourceCard;

