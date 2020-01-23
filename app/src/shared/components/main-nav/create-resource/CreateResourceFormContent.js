import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import React from "react";
import Form from "react-bootstrap/Form";


/**
 * @param props properties of inputs
 * @returns {*} fields for the signInForm
 * @author Timothy Beck <Dev@TimothyBeck.com
 */

export const CreateResourceFormContent = (props) => {
	const {
		status,
		values,
		dirty,
		touched,
		errors,
		isSubmitting,
		handleReset,
		handleChange,
		handleBlur,
		handleSubmit
	} = props;

	return (
		<>
			<form onSubmit={handleSubmit}>

				{/*Category Field should be a dropdown selection*/}
				<Form.Group controlId="exampleForm.ControlSelect1">
					<Form.Label htmlFor="resourceCategory">Select Category</Form.Label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="list"/>
							</div>
						</div>
						<Form.Control
							as="select"
							id="resourceCategoryId"
							type="text"
							value={values.resourceCategoryId}
							placeholder="resourceCategory"
							onChange={handleChange}
							onBlur={handleBlur}
						>
							<option value="100c162d-9a5e-4d51-ab75-75ccd3bd3253">Food/Clothing</option>
							<option value="3a55391b-fea6-4772-99b3-93e7cb6f4730">Disability</option>
							<option value="60ea99d3-07d2-4284-a641-2ab39e1e708a">Education</option>
							<option value="777640f1-dac4-4ae1-9c31-ac9fd3f70e35">Employment</option>
							<option value="7e94b87a-4ee9-48c6-bd44-b0cb9ef218ad">Mental Health</option>
							<option value="9993a0c5-2247-4654-8f84-79daa9a8ef93">Healthcare</option>
							<option value="bdf8061d-f359-4ece-b782-07b50ac9b015">Housing</option>
							<option value="c8a2c629-fc51-4a38-9eac-d75cd5685f58">Miscellaneous</option>
						</Form.Control>
					</div>
					{errors.resourceCategoryId && touched.resourceCategoryId && (
						<div className="alert alert-danger">{errors.resourceCategoryId}</div>
					)}
				</Form.Group>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceTitle">Resource Title</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="heading"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceTitle"
							type="text"
							value={values.resourceTitle}
							placeholder="Resource Title"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceTitle && touched.resourceTitle && (
						<div className="alert alert-danger">{errors.resourceTitle}</div>
					)}
				</div>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceOrganization">Organization</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="suitcase"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceOrganization"
							type="text"
							value={values.resourceOrganization}
							placeholder="Organization Name"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceOrganization && touched.resourceOrganization && (
						<div className="alert alert-danger">{errors.resourceOrganization}</div>
					)}
				</div>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceUrl">Resource URL</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="laptop"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceUrl"
							type="text"
							value={values.resourceUrl}
							placeholder="Website Url"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceUrl && touched.resourceUrl && (
						<div className="alert alert-danger">{errors.resourceUrl}</div>
					)}
				</div>


				{/*Description field here*/}
				{/*controlId must match what is passed to the initialValues prop*/}
				<Form.Group controlId="exampleForm.ControlTextarea1">
					<Form.Label htmlFor="userUsername">Description of Resource</Form.Label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="align-left"/>
							</div>
						</div>
						<Form.Control
							as="textarea"
							rows="4"
							placeholder="Description"
							onChange={handleChange}
							onBlur={handleBlur}
							className={"form-control"}
							id="resourceDescription"
							value={values.resourceDescription}
						/>
					</div>
					{errors.resourceDescription && touched.resourceDescription && (
						<div className="alert alert-danger">{errors.resourceDescription}</div>
					)}
				</Form.Group>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceImageUrl">Image URL</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="image"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceImageUrl"
							type="text"
							value={values.resourceImageUrl}
							placeholder="Image Url"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceImageUrl && touched.resourceImageUrl && (
						<div className="alert alert-danger">{errors.resourceImageUrl}</div>
					)}
				</div>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceAddress">Address</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="city"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceAddress"
							type="text"
							value={values.resourceAddress}
							placeholder="Address"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceAddress && touched.resourceAddress && (
						<div className="alert alert-danger">{errors.resourceAddress}</div>
					)}
				</div>


				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourceEmail">Email to contact resource</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="envelope"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceEmail"
							type="text"
							value={values.resourceEmail}
							placeholder="Contact Email"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourceEmail && touched.resourceEmail && (
						<div className="alert alert-danger">{errors.resourceEmail}</div>
					)}
				</div>

				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="resourcePhone">Contact Phone Number</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="phone"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourcePhone"
							type="text"
							value={values.resourcePhone}
							placeholder="Phone Number"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.resourcePhone && touched.resourcePhone && (
						<div className="alert alert-danger">{errors.resourcePhone}</div>
					)}
				</div>

				{/*submit/reset form buttons*/}
				<div className="form-group d-flex justify-content-center">
					<button className="btn btn-primary mb-2 mx-4" type="submit">Submit</button>

					<button
						className="btn btn-primary mb-2 mx-4"
						onClick={handleReset}
						disabled={!dirty || isSubmitting}
					>Reset
					</button>
				</div>

			</form>
			{status && (<div className={status.type}>{status.message}</div>)}
		</>
	)
};