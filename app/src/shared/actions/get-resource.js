import {httpConfig} from "../utils/http-config";

export const getResourceByResourceId = (resourceId) => async dispatch => {
	const {data} =  await httpConfig(`/apis/resource/?resourceId=${resourceId}`);
	dispatch({type: "GET_RESOURCE_BY_ID",payload : data });
}; //data.message ?

export const getResourceByResourceCategory = (resourceCategoryId) => async dispatch => {
	const {data} =  await httpConfig(`/apis/resource/?resourceCategoryId=${resourceCategoryId}`);
	dispatch({type: "GET_RESOURCE_BY_CATEGORY",payload : data });
};

export const getAllResources = () => async dispatch => {
	const {data} =  await httpConfig.get(`/apis/resource/`);
	dispatch({type: "GET_ALL_RESOURCES",payload : data });
};