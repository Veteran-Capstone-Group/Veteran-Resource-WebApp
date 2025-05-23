import React, {useState, useEffect} from "react";
import {useSelector} from "react-redux";
import {httpConfig} from "../utils/http-config";
import {UseJwt, UseJwtUserId} from "../utils/JwtHelpers";
import {handleSessionTimeout} from "../utils/handle-session-timeout";
import _ from "lodash";
import Badge from "react-bootstrap/Badge";
import Button from "react-bootstrap/Button";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

export const Useful = ({resourceId}) => {
	//grab the JWT Token

	const jwt = UseJwt();
	const userId = UseJwtUserId();


	const [isUsefulled, setIsUsefulled] = useState(null);
	const [usefulCount, setUsefulCount] = useState(0);

	//get all usefuls from redux
	const usefuls = useSelector(state => (state.useful ? state.useful : []));


	const effects = () => {
		initializeUsefuls(userId, usefuls, resourceId);
		countUsefuls(resourceId);
	};



	//add usefuls to inputs, informing React that the usefuls are being updated from redux
	const inputs =  [ usefuls, userId, resourceId];

	useEffect(effects, inputs);

	/**
	 * this function filters usefuls by resource ID and sets isUsefulled state variable to "active" if the user has
	 * already usefulled the post. "active" is a bootstrap class that will be added to the button.
	 * See: Lodash at https://lodash.com
	 */
	const initializeUsefuls = (userId, usefuls, resourceId) => {
		const userUsefuls = _.filter(usefuls, {'usefulUserId':userId });
		const resourceUsefuls = _.find(userUsefuls, {'usefulResourceId':resourceId});
		return (_.isEmpty(resourceUsefuls) === false) && setIsUsefulled("active");
	};
	/**
	 * this counts the usefuls for each resource
	 */

	const countUsefuls = (resourceId) => {
			const usefulResources = usefuls.filter(useful => useful.usefulResourceId === resourceId);
			return (setUsefulCount(usefulResources.length));
	};
	//
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
				if(reply.status === 200) {
					toggleUseful();
					setUsefulCount(usefulCount + 1);
				} else {
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
				if(reply.status === 200) {
					toggleUseful();
					setUsefulCount(usefulCount > 0 ? usefulCount - 1 : 0);
				} else {
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
			<Button variant="outline-danger" className={`resource-useful-bts ${(isUsefulled !== null ? isUsefulled : "")}`} disabled={!jwt && true} onClick={clickUseful}>
				<FontAwesomeIcon icon="medal"/>&nbsp;
				<Badge variant="danger">{usefulCount}</Badge>
			</Button>
		</>
	)


};
export default Useful;