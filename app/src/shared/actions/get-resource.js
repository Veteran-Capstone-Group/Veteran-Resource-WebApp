import {httpConfig} from "../utils/http-config";

export const getResourceByResourceId = (resourceId) => async (dispatch) => {
	const payload =  await httpConfig.get(`/apis/resource/?resourceId=${resourceId}`);
	dispatch({type: "GET_RESOURCE_BY_ID",payload : payload.data });
};

export const getResourceByResourceCategory = (resourceCategoryId) => async dispatch => {
	const payload =  await httpConfig.get(`/apis/resource/?resourceCategoryId=${resourceCategoryId}`);
	dispatch({type: "GET_RESOURCE_BY_CATEGORY",payload : payload.data });
};