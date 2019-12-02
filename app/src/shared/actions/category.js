import {httpConfig} from "../utils/http-config";

export const getAllCategories = () => async (dispatch) => {
	const payload =  await httpConfig.get("/apis/category/");
	dispatch({type: "GET_ALL_CATEGORIES",payload : payload.data });
};