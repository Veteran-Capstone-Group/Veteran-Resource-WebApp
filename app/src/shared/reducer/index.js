import {combineReducers} from "redux";
import categoryReducer from "./categoryReducer";
import resourceReducer from "./resourceReducer";
import usefulReducer from "./usefulReducer";

export default combineReducers({
	category: categoryReducer,
	resource: resourceReducer,
	useful: usefulReducer,
	}

)