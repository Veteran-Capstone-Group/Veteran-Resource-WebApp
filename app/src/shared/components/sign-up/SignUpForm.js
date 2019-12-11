import React, {useState} from 'react';
import {SignUpFormContent} from "./SignUpFormContent";
import {httpConfig} from "../../utils/http-config";
import * as Yup from "yup";
import {Formik} from "formik";

//define 'state variables' to be used in sign up form
export const SignUpForm = () => {

	const signUp = {
		userEmail: "",
		userPassword: "",
		userPasswordConfirm: "",
		userName: "",
		userUsername: ""
	};
 const [setStatus] = useState(null);
	// initiate yup validator
	const validator = Yup.object().shape({
		userEmail: Yup.string()
			.email("Email Address must be valid.")
			.required("Email Address is required."),
		userPassword: Yup.string()
			.required("Password is required.")
			.min(8, "Password must be at least eight characters!"),
		userPasswordConfirm: Yup.string()
			.required("Password is required.")
			.min(8, "Password must be at least eight characters!"),
		userName: Yup.string()
			.required("Name is required."),
		userUsername: Yup.string()
			.required("Username is required.")
	});
	const submitSignUp = (values, {resetForm}) => {
		httpConfig.post("/apis/sign-up/", values)
			.then(reply => {
					let {message, type} = reply;
					setStatus({message, type});
					if(reply.status === 200) {
						resetForm();
					}
				}
			);
	};

	return (
		<Formik
			initialValues={signUp}
			onSubmit={submitSignUp}
			validationSchema={validator}
			>
			{SignUpFormContent}
		</Formik>
	)
};