import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {FormDebugger} from "../../../utils/FormDebugger";
import React from "react";

/**
 * @param props properties of inputs
 * @returns {*} fields for the signInForm
 * @author Timothy Beck <Dev@TimothyBeck.com
 */

export const SignUpFormContent = (props) => {
	const {
		status,
		values,
		handleChange,
		handleBlur,
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
						</div>
					</div>

				<FormDebugger {...props}/>
			</form>
			{console.log(status)}
			{status && (<div className={status.type}>{status.message}</div>)}
		</>
	)
};