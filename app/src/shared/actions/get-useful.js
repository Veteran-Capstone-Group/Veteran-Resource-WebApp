import {httpConfig} from "../utils/http-config";

export const getUsefulByUsefulResourceId = (resourceId) => async (dispatch) => {

	const payload =  await httpConfig.get(`/apis/useful/?usefulResourceId=${resourceId}`);
	dispatch({type: "GET_USEFUL_BY_USEFUL_RESOURCE_ID", payload : payload.data });
};
