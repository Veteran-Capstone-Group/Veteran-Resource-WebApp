import {httpConfig} from "../utils/http-config";

export const getJsonResources = () => async dispatch => {
	const {data} =  await httpConfig(`/apis/download-resources-json/`);
	dispatch({type: "GET_JSON_RESOURCES",payload : data });
}; //data.message ?
