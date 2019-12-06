import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {FormDebugger} from "../../../utils/FormDebugger";
import React from "react";

export const SignUpFormContent = (props) => {
	const {
		status,
		values,
		errors,
		touched,
		dirty,
		isSubmitting,
		handleChange,
		handleBlur,
		handleSubmit,
		handleReset
	} = props;
	return (
		<>
			<form onSubmit={handleSubmit}>
				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="userEmail">Email Address</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="envelope"/>
							</div>
						</div>
						<input
							className="form-control"
							id="userEmail"
							type="email"
							value={values.userEmail}
							placeholder="Enter Email"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{
						errors.userEmail && touched.userEmail && (
							<div className="alert alert-danger">
								{errors.userEmail}
							</div>
						)
					}
				</div>
				{/*controlId must match what is passed to the initialValues prop*/}
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
						{errors.userPassword && touched.userPassword && (
							<div className="alert alert-danger">{errors.userPassword}</div>
						)}
					</div>

				</div>
				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="userPasswordConfirm">Confirm Your Password</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="userPasswordConfirm"
							type="password"
							value={values.userPasswordConfirm}
							placeholder="Password Confirm"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.userPasswordConfirm && touched.userPasswordConfirm && (
						<div className="alert alert-danger">{errors.userPasswordConfirm}</div>
					)}
				</div>
				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="userName">Name</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="key"/>
							</div>
						</div>
						<input
							className="form-control"
							id="userName"
							type="text"
							value={values.userName}
							placeholder="Name"
							onChange={handleChange}
							onBlur={handleBlur}
						/>
					</div>
					{errors.userName && touched.userName && (
						<div className="alert alert-danger">{errors.userName}</div>
					)}
				</div>
				{/*controlId must match what is passed to the initialValues prop*/}
				<div className="form-group">
					<label htmlFor="userUsername">Username</label>
					<div className="input-group">
						<div className="input-group-prepend">
							<div className="input-group-text">
								<FontAwesomeIcon icon="key"/>
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
					{errors.userUsername && touched.userUsername && (
						<div className="alert alert-danger">{errors.userUsername}</div>
					)}
				</div>
				<div className="form-group">
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