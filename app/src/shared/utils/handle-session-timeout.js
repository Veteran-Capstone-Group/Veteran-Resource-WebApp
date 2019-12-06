
import {httpConfig} from "./http-config";

export const handleSessionTimeout = () => {
	alert("Session is inactive. Please sign in again!");
	httpConfig.get("/apis/sign-out/")
		.then(reply => {
			let {message, type} = reply;
			if(reply.status === 200) {
				window.localStorage.removeItem("jwt-token");
				console.log(reply);
				setTimeout(() => {
					window.location = "/";
				}, 1000);
			}
		});
};