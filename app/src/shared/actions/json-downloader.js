import {httpConfig} from "../utils/http-config";
//calls download-resources-json api
export const getJsonResources = () => async dispatch => {
	const {data} =  await httpConfig(`/apis/download-resources-json/`);
	dispatch({type: "GET_JSON_RESOURCES",payload : data });
}; //data.message ?
