import React, {useEffect} from "react";
import {httpConfig} from "../../utils/http-config";
import 'bootstrap/dist/css/bootstrap.css';
import {useSelector, useDispatch} from "react-redux";
import {UseWindowWidth} from "../../utils/UseWindowWidth"
import {getCountByUsefulResourceId} from "../../actions/get-useful.js"
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Button from "react-bootstrap/Button";

//export component
export const	ResourceCard = ({resource}) =>{
	const {$resourceId, $resourceTitle, $resourceOrganization, $resourceEmail, $resourceAddress, $resourcePhone, $resourceUrl, $resourceImageUrl, $resourceDescription} = resource;
	console.log($resourceTitle);

	//Store screen width on resize event to allow different views on mobile vs desktop
	const width = UseWindowWidth();

	//define side effects that will occur in application. Dispatch takes actions as arguments to make changes to Store/Redux
	const effects = () => {dispatch(getCountByUsefulResourceId);};

	//Declare any inputs that will be used by functions that are declared in sideEffects.
	const inputs = [$resourceId];

	useEffect(effects, inputs);
	return (
		<>
			{width > 991 ? (
			<!--desktop view-->
			<Container className="d-block">
				<Row className="border border-primary rounded my-4 py-2 px-2">
					<Col xs={3} className="d-inline">
						<img src={$resourceImageUrl} className="img-fluid" alt="Employment Icon"/>
					</Col>
					<Col xs={9} className="col-9 d-inline">
						<Row className="border-bottom border-primary py-0 align-items-end">
							<h3 className="font-weight-bold col-8 align-bottom pb-0 mb-0 pt-2 d-block text-truncate">
								{$resourceTitle}
							</h3>
							<p className="col-4 align-bottom text-right font-weight-bold pb-0 mb-0 pt-2 d-block text-truncate text-success">234 Usefuls</p>
						</Row>
						<div className="row pt-1">
							<div className="col align-bottom">
								<div className="row py-0 mt-1">
									<p className="col-6 text-left d-block text-truncate py-0 my-0 font-weight-light">{$resourceOrganization}
										</p>
									<p className="col-6 text-right d-block text-truncate py-0 my-0 font-weight-light">{$resourceAddress}</p>
								</div>
								<div className="row py-0 mt-1">
									<p className="col-6 text-left d-block text-truncate py-0 my-0 font-weight-light">{$resourcePhone}</p>
									<p className="col-6 text-right d-block text-truncate py-0 my-0 font-weight-light">
										{$resourceEmail}</p>
								</div>
								<div className="row pt-2">
									<p>{$resourceDescription}</p>
								</div>
							</div>
						</div>
					</Col>
				</Row>
			</Container>
				):( $resourceImageUrl === "" ?(
			<!-- Mobile view without image-->
			<div className="container d-lg-none h-25">
				<div className="border border-primary rounded my-4 py-2 px-2 mh-100">
					<div className="row">
						<div className="col d-inline">
							<div className="row border-bottom border-primary mx-1 py-0 pr-1">
								<p className="font-weight-bold col align-bottom mb-0 p-0 mx-1 d-block text-truncate text-left">National
									Employment Resources</p>
							</div>
							<div className="row pt-1 mx-1 small">
								<p>VA's Education and Career Counseling program is a great opportunity for Servicemembers, Veterans and
									dependents to get personalized counseling and support to help guide their career paths, ensure most
									effective use of their VA benefits, and achieve their goals.</p>
							</div>
						</div>
					</div>
					<div className="row d-flex justify-content-around">
						<button type="button" className="btn btn-primary">Directions</button>
						<button type="button" className="btn btn-primary">Call: (505) 346-4864</button>
					</div>
				</div>
			</div>
				):(
			<!--mobile view w/ thumbnail image-->
			<div className="container d-lg-none h-25">
				<div className="border border-primary rounded my-4 py-2 px-2 mh-100">
					<div>
						<div className="row">
							<div className="col d-inline">
								<div className="row border-bottom border-primary py-0 px-1 mx-1">
									<div className="col-2 pb-1 px-0">
										<img className="img-fluid d-inline border-primary" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Seal_of_the_U.S._Department_of_Veterans_Affairs.svg/600px-Seal_of_the_U.S._Department_of_Veterans_Affairs.svg.png" alt="icon for resource"/>
									</div>
									<div className="col-10 my-0 p-0 mr-0 d-flex align-items-end">
										<p className="font-weight-bold align-bottom mb-0 pl-2 py-0 pr-0 d-block text-truncate text-left">National Employment Services</p>
									</div>
								</div>
								<div className="row pt-1 mx-1 small">
									<p>VA's Education and Career Counseling program is a great opportunity for Servicemembers, Veterans
										and dependents to get personalized counseling and support to help guide their career paths, ensure
										most effective use of their VA benefits, and achieve their goals.</p>
								</div>
							</div>
						</div>
						<div className="row d-flex justify-content-around">
							<button type="button" className="btn btn-primary">Directions</button>
							<button type="button" className="btn btn-primary">Call: (505) 346-4864</button>
						</div>
					</div>
				</div>
			</div>
				))}
		</>
	)

};