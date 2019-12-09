import React from "react";
import {Link} from "react-router-dom";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import {SignUpModal} from "../sign-up/SignUpModal";
import {SignInModal} from "../sign-in/SignInModal";
import {CreateResourceModal} from "../create-resource/CreateResourceModal";

export const Footer = () => {

	return(
		<>
			<Container fluid="true" id="footer">
			<Row className="justify-content-center">
					<SignUpModal/>
					<SignInModal/>
					<CreateResourceModal/>
			</Row>
			<Row>
				<p className="col-12 text-center small">
					<a href="https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp" className="text-primary" target="_blank" rel="noopener noreferrer">Learn More on <u>Github</u>.</a>
				</p>
			</Row>
			</Container>
			</>
	)
};
export default Footer;
