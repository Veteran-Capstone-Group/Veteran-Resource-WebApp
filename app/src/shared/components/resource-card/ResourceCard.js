import React, {useEffect} from "react";
import {httpConfig} from "../../utils/http-config";
import 'bootstrap/dist/css/bootstrap.css';
import {UseJwt, UseJwtUserId} from "../../utils/JwtHelpers";
import {useSelector, useDispatch} from "react-redux";
import {handleSessionTimeout} from "../../utils/handle-session-timeout";
import Usefuls from "../../utils/Usefuls";
import {UseWindowWidth} from "../../utils/UseWindowWidth"
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Button from "react-bootstrap/Button";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {getCountByUsefulResourceId} from "../../actions/get-useful";


//export component
export const	ResourceCard = ({resource}) =>{



	//Store screen width on resize event to allow different views on mobile vs desktop
	const width = UseWindowWidth();

	//grab JWT Token for logged in users
	const jwt = UseJwt();
	const userId = UseJwtUserId;

	//assign values for variables of resource
	const {resourceId, resourceTitle, resourceOrganization, resourceEmail, resourceAddress, resourcePhone, resourceUrl, resourceImageUrl, resourceDescription} = resource;
	console.log(resourceTitle);
	//define side effects that will occur in application. Dispatch takes actions as arguments to make changes to Store/Redux
	// const dispatch = useDispatch();
	// const effects = () => {dispatch(getCountByUsefulResourceId(resourceId));};

	//Declare any inputs that will be used by functions that are declared in sideEffects.
	//const inputs = [resourceId];
	const googleMapsSearch = "https://www.google.com/maps/place/" + resourceAddress.split(" ").join("+");
	// useEffect(effects, inputs);
	return (
		<>
			{width > 991 ? (
			// <!--desktop view-->
			<Container className="d-block">
				<Row className="border border-primary rounded bg-light my-4 py-2 px-2">
					<Col xs={3} className="d-inline">
						<img src={resourceImageUrl} className="img-fluid" alt="Employment Icon"/>
					</Col>
					<Col xs={9} className="col-9 d-inline">
						<Row className="border-bottom border-primary py-0 align-items-end">
							<h3 className="font-weight-bold col-8 align-bottom pb-0 mb-0 pt-2 d-block text-truncate">
								{resourceTitle}
							</h3>
							<Usefuls/>
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
				):( resourceImageUrl === "" ?(
			// <!-- Mobile view without image-->
			<div className="container d-lg-none h-25">
				<div className="border border-primary rounded my-4 py-2 px-2 mh-100 bg-light">
					<div className="row">
						<div className="col d-inline">
							<div className="row border-bottom border-primary mx-1 py-0 pr-1">
								<p className="font-weight-bold col align-bottom mb-0 p-0 mx-1 d-block text-truncate text-left">
									{resourceTitle}</p>
							</div>
							<div className="row pt-1 mx-1 small">
								<p>{resourceDescription}</p>
							</div>
						</div>
					</div>
					<div className="row d-flex justify-content-around">
						<a href={googleMapsSearch}><button type="button" className="btn btn-primary">Directions</button></a>
						<button type="button" className="btn btn-primary">Call: (505) 346-4864</button>
					</div>
				</div>
			</div>
				):(
			// <!--mobile view w/ thumbnail image-->
			<div className="container d-lg-none h-25">
				<div className="border border-primary rounded my-4 py-2 px-2 mh-100 bg-light">
					<div>
						<div className="row">
							<div className="col d-inline">
								<div className="row border-bottom border-primary py-0 px-1 mx-1">
									<div className="col-2 pb-1 px-0">
										<img className="img-fluid d-inline border-primary" src={resourceImageUrl} alt="icon for resource"/>
									</div>
									<div className="col-10 my-0 p-0 mr-0 d-flex align-items-end">
										<p className="font-weight-bold align-bottom mb-0 pl-2 py-0 pr-0 d-block text-truncate text-left">
											{resourceTitle}
										</p>
									</div>
								</div>
								<div className="row pt-1 mx-1 small">
									<p>{resourceDescription}</p>
								</div>
							</div>
						</div>
						<div className="row d-flex justify-content-around">
							<a href={googleMapsSearch}><button type="button" className="btn btn-primary">Directions</button></a>
							<button type="button" className="btn btn-primary">Call: (505) 346-4864</button>
						</div>
					</div>
				</div>
			</div>
				))}
		</>
	)

};
export default ResourceCard;