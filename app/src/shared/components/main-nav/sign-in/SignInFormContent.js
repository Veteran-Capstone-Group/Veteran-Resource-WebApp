import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import React from "react";

/**
 * @param props properties of inputs
 * @returns {*} fields for the signInForm
 * @author Timothy Beck <Dev@TimothyBeck.com
 */

export const SignInFormContent = (props) => {
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
		handleClose,
		handleSubmit
	} = props;

	return (
		<>
			<form onSubmit={handleSubmit}>
				<div className="form-group">
					{/*Username Field*/}
					<label htmlFor="userUsername">Username</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="user"/>
							</div>
						</div>
						<input
							className="form-control"
							id="userUsername"
							type="text"
							value={values.userUsername}
							placeholder="Username"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{
						errors.userUsername && touched.userUsername &&(
							<div className="alert alert-danger">
								{errors.userUsername}
							</div>
						)
					}
				</div>

					{/*Password Field*/}
					<div className="form-group">
						<label htmlFor="userPassword">Password</label>
						<div className="input-group">
							<div className="input-group">
								<div className="input-group-prepend">
									<div className="input-group-text">
										<FontAwesomeIcon icon="key"/>
									</div>
								</div>
								<input
									className="form-control"
									id="userPassword"
									type="password"
									value={values.userPassword}
									placeholder="Enter Password"
									onChange={handleChange}
									onBlur={handleBlur}
								/>
							</div>
							{
								errors.userPassword && touched.userPassword &&(
									<div className="alert alert-danger">
										{errors.userPassword}
									</div>
								)
							}
						</div>
					</div>

				<div className="form-group d-flex justify-content-center">
					<button className="btn btn-primary mb-2 mx-4" type="submit" onClick={handleClose}>Submit</button>

					<button
						className="btn btn-primary mb-2 mx-4"
						onClick={handleReset}
						disabled={!dirty || isSubmitting}
					>Reset
					</button>
				</div>

			</form>
			{console.log(status)}
			{status && (<div className={status.type}>{status.message}</div>)}
		</>
	)
};