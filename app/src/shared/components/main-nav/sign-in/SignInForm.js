import React, {useState} from 'react';
import {SignInFormContent} from "./SignInFormContent";
import {httpConfig} from "../../../utils/http-config";
import * as Yup from "yup";
import {Formik} from "formik";

/**
 * signInForm validation and API Logic
 *
 * @returns {*} formik Sign In Form
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */

//define signin state variable to utilize in sign-in form
export const SignInForm = () => {

	const signIn = {
		userUsername: "",
		userPassword: ""
	};

	//initiate yup validator
	const validator = Yup.object().shape({
		userUsername: Yup.string()
			.required("Username is required."),
		userPassword: Yup.string()
			.required("Password is required.")
	});
	const submitSignIn = (values, {resetForm, setStatus}) => {
		httpConfig.post("/apis/sign-in/", values)
			.then(reply => {
				let {message, type} = reply;
				setStatus({message, type});
				if(reply.status === 200) {
					resetForm();
					setStatus({message, type});
				}
			})
	};

	return (
		<Formik onSubmit={submitSignIn} initialValues={signIn} validationSchema={validator}>
			{SignInFormContent}
		</Formik>
	)
};