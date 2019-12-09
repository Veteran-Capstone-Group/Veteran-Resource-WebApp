import React, {useState} from 'react';
import {CreateResourceFormConten} from "./CreateResourceFormContent";
import {httpConfig} from "../../../utils/http-config";
import * as Yup from "yup";
import {Formik} from "formik";
import {CreateResourceFormContent} from "../create-resource/CreateResourceFormContent";

/**
 * CreateResourceFormContent validation and API Logic
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
	});

	const submitCreateResource = (values, {resetForm, setStatus}) => {
		const headers = {'X-JWT-Token': window.localStorage.getItem("jwt-token")};

		httpConfig.post("/apis/resource/", values, {headers: headers})
			.then(reply => {
				let {message, type} = reply;
				setStatus({message, type});

				if(reply.status === 200) {
					resetForm();
					setStatus({message, type});

					/*TODO: find a better way to re-render the post component!*/
					setTimeout(() => {
						window.location.reload();
					}, 1500);
				}
				// if there's an issue with a $_SESSION mismatch with xsrf or jwt, alert user and do a sign out
				if(reply.status === 401) {
					handleSessionTimeout();
				}
			});
	};

	return (
		<Formik onSubmit={submitCreateResource} initialValues={createResource} validationSchema={validator}>
			{CreateResourceFormContent}
		</Formik>
	)


};