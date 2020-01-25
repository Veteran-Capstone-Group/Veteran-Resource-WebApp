import {httpConfig} from "../utils/http-config";
import  _ from "lodash"
import {getResourceByResourceCategory, getAllResources} from "./get-resource";

export const getUsefulByUsefulResourceId = (resourceId) => async (dispatch) => {

	const payload =  await httpConfig.get(`/apis/useful/?usefulResourceId=${resourceId}`);
	dispatch({type: "GET_USEFUL_BY_USEFUL_RESOURCE_ID", payload : payload.data });
};

export const getUsefulsAndResources = (categoryId) => async (dispatch, getState) => {
	await dispatch(getResourceByResourceCategory(categoryId));

	_.chain(getState().resource)
		.map("resourceId")
		.uniq()
		.forEach(id => dispatch(getUsefulByUsefulResourceId(id)))
		.value()
};

export const getUsefulsAndAllResources = () => async (dispatch, getState) => {
	await dispatch(getAllResources());

	_.chain(getState().resource)
		.map("resourceId")
		.uniq()
		.forEach(id => dispatch(getUsefulByUsefulResourceId(id)))
		.value()
};
