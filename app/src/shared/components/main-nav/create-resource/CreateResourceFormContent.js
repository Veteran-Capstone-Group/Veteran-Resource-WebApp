import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {FormDebugger} from "../../../utils/FormDebugger";
import React from "react";

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
								<FontAwesomeIcon icon="key"/>
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
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
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
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceTitle"
							type="text"
							value={values.resourceTitle}
							placeholder="Title"
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
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceOrganization"
							type="text"
							value={values.resourceOrganization}
							placeholder="Organization"
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
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceUrl"
							type="text"
							value={values.resourceUrl}
							placeholder="Url"
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
								<FontAwesomeIcon icon="key"/>
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
								<FontAwesomeIcon icon="key"/>
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
								<FontAwesomeIcon icon="key"/>
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
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="resourceEmail"
							type="text"
							value={values.resourceEmail}
							placeholder="Email"
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
								<FontAwesomeIcon icon="key"/>
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
				<div className="form-group">
					<button className="btn btn-primary mb-2" type="submit">Submit</button>

					<button
						className="btn btn-primary mb-2"
						onClick={handleReset}
						disabled={!dirty || isSubmitting}
					>Reset
					</button>
				</div>

				<FormDebugger {...props}/>
			</form>
			{console.log(status)}
			{status && (<div className={status.type}>{status.message}</div>)}
		</>
	)
};