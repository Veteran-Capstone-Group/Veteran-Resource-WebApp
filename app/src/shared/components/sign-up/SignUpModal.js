import React, {useState} from "react";
import {SignUpForm} from "./SignUpForm";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";

export const SignUpModal = () => {
	//initializes form in hidden state
	const [show, setShow] = useState(false);
	//function hides modal
	const handleClose = () => setShow(false);
	//function shows modal
	const handleShow = () => setShow(true);

	return (
		<>
			<Button variant="primary" className={"m-4"} size='lg' onClick={handleShow}>
				Sign Up
			</Button>

			<Modal show={show} onHide={handleClose}>
				<Modal.Header closeButton>
					<Modal.Title>Sign Up</Modal.Title>
				</Modal.Header>
				<Modal.Body>
					<SignUpForm/>
				</Modal.Body>
			</Modal>
		</>
	);
};

export default SignUpModal;

