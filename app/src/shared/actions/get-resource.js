import {httpConfig} from "../utils/http-config";

export const getResourceByResourceId = (resourceId) => async dispatch => {
	const {data} =  await httpConfig(`/apis/resource/?resourceId=${resourceId}`);
	dispatch({type: "GET_RESOURCE_BY_ID",payload : data });
};

export const getResourceByResourceCategory = (resourceCategoryId) => async dispatch => {
	const {data} =  await httpConfig(`/apis/resource/${resourceCategoryId}`);
	dispatch({type: "GET_RESOURCE_BY_CATEGORY",payload : data });
};