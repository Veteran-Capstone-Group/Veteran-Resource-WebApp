export default (state = [], action) => {
	switch(action.type) {
		case "GET_USEFUL_BY_USEFUL_RESOURCE_ID":
			return action.payload;
		default:
			return state;
	}
}