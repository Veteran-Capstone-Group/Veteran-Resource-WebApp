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
							<option value="501c7665-a4b1-47ab-a157-13d198f67d97">Food/Clothing</option>
							<option value="b20fe0cd-43e4-4878-9d29-a4ecb57678a3">Disability</option>
							<option value="b2b19ae1-7c88-4f5d-baa2-b2ebf964cd2a">Education</option>
							<option value="faef9afc-61e2-4238-a634-b15164ebdbae">Employment</option>
							<option value="0535ca67-9c12-4cc9-9450-e2faa89b91db">Mental Health</option>
							<option value="34b09b0c-08a9-46a5-829b-0e5b7f385f5a">Healthcare</option>
							<option value="8167caec-0d53-47c7-8a86-9b226a325eae">Housing</option>
							<option value="a48077fe-3955-460d-9bb8-e04e48aad125">Miscellaneous</option>
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