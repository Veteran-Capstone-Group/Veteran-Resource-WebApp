export default (state = [], action) => {
	switch(action.type) {
		case "GET_RESOURCE_BY_CATEGORY":
			return action.payload;
		case "GET_RESOURCE_BY_ID":
			return action.payload;
		default:
			return state;
	}
}