
import {httpConfig} from "./http-config";

export const handleSessionTimeout = () => {
	alert("Session is inactive. Please sign in again!");
	httpConfig.get("/apis/sign-out/")
		.then(reply => {
			if(reply.status === 200) {
				window.localStorage.removeItem("jwt-token");
				setTimeout(() => {
					window.location = "/";
				}, 1000);
			}
		});
};