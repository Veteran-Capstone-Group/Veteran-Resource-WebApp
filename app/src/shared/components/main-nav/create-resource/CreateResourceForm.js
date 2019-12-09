import React, {useState} from 'react';
import {CreateResourceFormConten} from "./CreateResourceFormContent";
import {httpConfig} from "../../../utils/http-config";
import * as Yup from "yup";
import {Formik} from "formik";
import {SignInFormContent} from "../sign-in/SignInFormContent";

/**
 * CreateResourceFormConten validation and API Logic
 *
 * @returns {*} formik create resource Form
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */

//define create resource state variable to utilize in create resource form
export const CreateResourceForm = () => {

	const createResource = {
		resourceCategoryId: "",
		resourceTitle: "",
		resourceOrganization: "",
		resourceDescription: "",
		resourceAddress: "",
		resourcePhone: "",
		resourceEmail: "",
		resourceUrl: "",
		resourceImageUrl: ""
	};

	//initiate yup validator
	const validator = Yup.object().shape({
		resourceCategoryId: Yup.string()
			.required("Category Type is required."),
		resourceTitle: Yup.string()
			.required("")
			.max(64, "Title can not be longer than 64 characters."),
		resourceOrganization: Yup.string()
			.max(124, "Organization name can not be longer than 124 characters."),
		resourceDescription: Yup.string()
			.required("")
			.max(300, "Description can not be longer than 300 characters."),
		resourceAddress: Yup.string()
			.max(124, "Address can not be longer than 124 characters."),
		resourcePhone: Yup.string()
			.max(20, "Phone number too long"),
		resourceEmail: Yup.string()
			.max(124, "Email can not be longer than 124 characters."),
		resourceUrl: Yup.string()
			.required("")
			.max(255, "URL can not be longer than 255 characters."),
		resourceImageUrl: Yup.string()
			.max(255, "URL can not be longer than 255 characters.")
	})

	const submitCreateResource = (values, {resetForm, setStatus}) => {
		httpConfig.post("/apis/resource/", values)
			.then(reply => {
				let {message, type} = reply;
				setStatus({message, type});
				//TODO maybe add stuff here
				if(reply.status === 200 && reply.headers['x-jwt-token']) {
					window.localStorage.removeItem('jwt-token');
					window.localStorage.setItem("jwt-token", reply.headers['x-jwt-token']);
					resetForm();
				}
			})
	};

	return (
		<Formik onSubmit={submitCreateResource} initialValues={createResource} validationSchema={validator}>
			{CreateResourceFormContent}
		</Formik>
	)






};