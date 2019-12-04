import {httpConfig} from "../utils/http-config";

export const getResourceByResourceId = () => async (dispatch) => {
	const payload =  await httpConfig.get("/apis/resource/");
	dispatch({type: "GET_ALL_CATEGORIES",payload : payload.data });
};