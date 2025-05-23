import React, {useState} from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import {SignInForm} from "./SignInForm";

/**
 * JSX Sign in modal
 *
 * @returns {*} JSX sign-in modal built from this component and signInFormContent component
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */

//create signInModal JSX to serve SignInForm
export const SignInModal = () => {
	//initializes form in hidden state
	const [show, setShow] = useState(false);
	//function hides modal
	const handleClose = () => setShow(false);
	//function shows modal
	const handleShow = () => setShow(true);

	return (
		<>
			<Button variant="primary" className={"m-4"} size='lg' onClick={handleShow}>
				Sign In
			</Button>

			<Modal show={show} onHide={handleClose}>
				<Modal.Header closeButton>
					<Modal.Title>Sign In</Modal.Title>
				</Modal.Header>
				<Modal.Body>
					<SignInForm/>
				</Modal.Body>
			</Modal>
		</>
	);
};