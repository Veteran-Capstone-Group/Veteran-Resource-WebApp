import React from "react";
import {SignUpForm} from "./SignUpForm";

import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";

export const SignUpModal = () => {
	return (
		<main className="d-block align-items-center">
			<Container fluid="false">
				<Row>
					<Col>
						<SignUpForm/>
					</Col>
				</Row>
			</Container>
		</main>
	);
};

