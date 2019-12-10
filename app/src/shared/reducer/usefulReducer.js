export default (state = [], action) => {
	switch(action.type) {
		case "GET_USEFUL_BY_USEFUL_RESOURCE_ID":
			return [...state, ...action.payload];
		case "GET_USEFULS_AND_RESOURCES":
			return action.payload;
		default:
			return state;
	}
}