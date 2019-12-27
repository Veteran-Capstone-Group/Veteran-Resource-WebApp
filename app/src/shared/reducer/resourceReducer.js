export default (state = [], action) => {
	switch(action.type) {
		case "GET_RESOURCE_BY_CATEGORY":
			return action.payload;
		case "GET_RESOURCE_BY_ID":
			return action.payload;
		case "GET_ALL_RESOURCES":
			return action.payload;
		default:
			return state;
	}
}