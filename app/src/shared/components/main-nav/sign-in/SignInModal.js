import React, {useState} from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import {SignInForm} from "./SignInForm";


//create signInModal JSX to serve SignInForm
export const SignInModal = () => {
	//initializes form in hidden state
	const [show, setShow] = useState(false);
	//function hides modal
	const handleClose = () => setShow(false);
	//function shows modal

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
				<Modal.Footer>
					<Button variant="secondary" onClick={handleClose}>
						Close
					</Button>
					<Button variant="primary" onClick={handleClose}>
						Sign In
					</Button>
				</Modal.Footer>
			</Modal>
		</>
	);
};