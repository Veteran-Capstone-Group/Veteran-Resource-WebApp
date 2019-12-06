import React, {useState, useEffect} from "react";
import {useSelector} from "react-redux";
import {httpConfig} from "./http-config";
import {UseJwt} from "JwtHelpers";
import {handleSessionTimeout} from "./handle-session-timeout";
import _ from "lodash";
import {getCountByUsefulResourceId} from "../actions/get-useful";

import Badge from "react-bootstrap/Badge";
import Button from "react-bootstrap/Button";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

export const Useful = ({userId, resourceId}) => {
	//grab the JWT Token
	const jwt = UseJwt();

	const [isUsefulled, setIsUsefulled] = useState(null);
	const [usefulCount, setUsefulCount] = useState(0);

	//return all usefuls from Redux Store
	const usefuls = useSelector(state => (state.usefuls ? state.usefuls : []));

	const effects = () => {
		initializeUsefuls(userId);
		countUsefuls(resourceId);
	};

	//add usefuls to inputs, informing React that the usefuls are being updated from redux
	const inputs = [usefuls, userId, resourceId];
	useEffect(effects, inputs);

	/**
	 * this function filters usefuls by resource ID and sets isUsefulled state variable to "active" if the user has
	 * already usefulled the post. "active" is a bootstrap class that will be added to the button.
	 * See: Lodash at https://lodash.com
	 */
	const initializeUsefuls = (userId) => {
		const userUsefuls = usefuls.filter(useful => Useful.usefulUserId === userId);
		const usefulled = _.find(userUsefuls, {'usefulResourceId': resourceId});
		return (_.isEmpty(usefulled) === false) && setIsUsefulled("active");
	};
	/**
	 * this counts the usefuls for each resource
	 */
	const countUsefuls = (resourceId) => {
		return getCountByUsefulResourceId(resourceId);
	};

	const data = {
		usefulResourceId: resourceId,
		usefulUserId: userId
	};
	const toggleUseful = () => {
		setIsUsefulled(isUsefulled === null ? "active" : null)
	};
	const submitUseful = () => {
		const headers = {'X-JWT-TOKEN': jwt};
		httpConfig.post("/apis/useful/", data, {
			headers: headers
		})
			.then(reply => {
				let {message, type} = reply;
				if(reply.status === 200) {
					toggleUseful();
					setUsefulCount(usefulCount + 1);
				}
				/// if there is an issue with a session mismatch with xsrf or jwt, alert user and sign out
				if(reply.status === 401) {
					handleSessionTimeout();
				}
			});
	};

	const deleteUseful = () => {
		const headers = {'X-JWT-TOKEN': jwt};
		httpConfig.put("/apis/useful/", data, {
			headers: headers
		})
			.then(reply => {
				let {message, type} = reply;
				if(reply.status === 200) {
					toggleUseful();
					setUsefulCount(usefulCount > 0 ? usefulCount - 1 : 0);
				}
				// if there's an issue with a $_SESSION mismatch with xsrf or jwt, alert user and do a sign out
				if(reply.status === 401) {
					handleSessionTimeout();
				}
			});
	};

	//fire function on click
	const clickUseful = () => {
		(isUsefulled === "active") ? deleteUseful() : submitUseful();
	};

	return (
		<>
			<Button variant="outline-danger" size="sm" className={`resource-useful-bts ${(isUsefulled !== null ? isUsefulled : "")}`} disabled={!jwt && true} onClick={clickUseful}>
				<FontAwesomeIcon icon="medal"/>&nbsp;
				<Badge variant="danger">{usefulCount}</Badge>
			</Button>
		</>
	)


}