import React, {useState, useEffect} from "react";
import * as jwtDecode from "jwt-decode";

/*
* Hooks to grab the JWT Token and decode it's data for logged in users.
*
* */

export const UseJwt = () => {
	const [jwt, setJwt] = useState(null);

	useEffect(() => {
		setJwt(window.localStorage.getItem("jwt-token"));
	}, [jwt]);

	return jwt;
};

export const UseJwtUserUsername = () => {
	const [userUsername, setUserUsername] = useState(null);

	useEffect(() => {
		const token = window.localStorage.getItem("jwt-token");
		if(token !== null) {
			const decodedJwt = jwtDecode(token);
			setUserUsername(decodedJwt.auth.userUsername);
		}
	}, [userUsername]);

	return userUsername;
};

export const UseJwtUserId = () => {
	const [userId, setUserId] = useState(null);

	useEffect(() => {
		const token = window.localStorage.getItem("jwt-token");
		if(token !== null) {
			const decodedJwt = jwtDecode(token);
			setUserId(decodedJwt.auth.userId);
		}
	}, [userId]);

	return userId;
};