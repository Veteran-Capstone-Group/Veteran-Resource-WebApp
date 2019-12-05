
export default (state = [], action) => {
	switch(action.type) {
		case "GET_ALL_CATEGORIES":
			return action.payload;
		default:
			return state;
	}
}