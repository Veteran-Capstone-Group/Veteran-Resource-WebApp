import {httpConfig} from "../utils/http-config";

export const getCountByUsefulResourceId = () => async (dispatch) => {
	const payload =  await httpConfig.get("/apis/useful/");
	dispatch({type: "GET_COUNT_BY_USEFUL_RESOURCE_ID", payload : payload.data });
};
