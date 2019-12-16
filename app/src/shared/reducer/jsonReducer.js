export default (state = [], action) => {
	switch(action.type) {
		case "GET_JSON_RESOURCES":
			return action.payload;
		default:
			return state;
	}
}