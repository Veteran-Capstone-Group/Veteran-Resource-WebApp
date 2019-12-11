import React from "react";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import {SignUpModal} from "../../sign-up/SignUpModal";
import {SignInModal} from "../sign-in/SignInModal";
import {UseJwt} from "../../../utils/JwtHelpers";
import {CreateResourceModal} from "../create-resource/CreateResourceModal";

export const Footer = () => {
const jwt = UseJwt();
	return (
		<>
			<Container fluid="true" id="footer">
				{jwt!== null ? (
					<Row className="justify-content-center">
						<CreateResourceModal/>
					</Row>) : (
					<Row className="justify-content-center">
						<SignUpModal/>
						<SignInModal/>
					</Row>
				)}
				<Row>
					<p className="col-12 text-center small">
						<a href="https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp" className="text-primary"
							target="_blank" rel="noopener noreferrer">Learn More on <u>Github</u>.</a>
					</p>
				</Row>
			</Container>
		</>
	)
};
export default Footer;
