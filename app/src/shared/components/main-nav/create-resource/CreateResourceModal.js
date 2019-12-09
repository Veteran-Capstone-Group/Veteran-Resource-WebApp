import React, {useState} from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import {CreateResourceForm} from "./CreateResourceForm";

/**
 * JSX Create Resource Modal
 *
 * @returns {*} JSX sign-in modal built from this component and createResourceFormContent component
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */

//create createResourceModal JSX to serve resouce form
export const CreateResourceModal = () => {
	//initializes form in hidden state
	const [show, setShow] = useState(false);
	//function hides modal
	const handleClose = () => setShow(false);
	//function shows modal
	const handleShow = () => setShow(true);

	return (
		<>
			<Button variant="primary" className={"m-4"} size='lg' onClick={handleShow}>
				Add New Resource
			</Button>

			<Modal show={show} onHide={handleClose}>
				<Modal.Header closeButton>
					<Modal.Title>Add New Resource</Modal.Title>
				</Modal.Header>
				<Modal.Body>
					<SignInForm/>
				</Modal.Body>
			</Modal>
		</>
	);
};