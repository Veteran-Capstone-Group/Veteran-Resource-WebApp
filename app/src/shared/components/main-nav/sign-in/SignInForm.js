import React, {useState} from 'react';
import {SignInFormContent} from "./SignInFormContent";
import {httpConfig} from "../../../utils/http-config";
import * as Yup from "yup";
import {Formik} from "formik";

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

	}
};