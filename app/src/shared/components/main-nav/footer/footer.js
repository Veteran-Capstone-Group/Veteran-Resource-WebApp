import React from "react";
import {Link} from "react-router-dom";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {SignUpModal} from "../sign-up/SignUpModal";

export const Footer = () => {

	return(
		<>
			<Container>
			<Row className="justify-content-center">
				<Col>
					<SignUpModal/>
				</Col>
				<Col>
				{/*	sign-in goes here*/}
				</Col>
			</Row>
			<Row>
				<p className="col-12 text-center small">
					<a href="https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp" className="text-muted bg-light" target="_blank" rel="noopener noreferrer">Learn More on GitHub</a>
				</p>
			</Row>
			</Container>
			</>
	)
};
export default Footer;
