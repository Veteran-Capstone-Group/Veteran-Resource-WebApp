import React from 'react';
import ReactDOM from 'react-dom'
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";

import thunk from "redux-thunk";
import {applyMiddleware, createStore} from "redux";
import reducers from "./shared/reducer";
import {Provider} from 'react-redux';

import 'bootstrap/dist/css/bootstrap.css';

import {FourOhFour} from "./pages/four-oh-four/FourOhFour";
import {Home} from "./pages/home/Home";
import {Header} from "./shared/components/main-nav/header/Header";
import {Footer} from "./shared/components/main-nav/footer/footer";
import {ResourcesInCategory} from "./pages/category/Category";
import {library} from '@fortawesome/fontawesome-svg-core';
import {faDove, faEnvelope, faKey, faPhone, faStroopwafel, faMedal, faArrowLeft, faArrowRight} from '@fortawesome/free-solid-svg-icons';

library.add(faDove, faEnvelope, faKey, faPhone, faStroopwafel, faMedal, faArrowLeft, faArrowRight);

const store = createStore(reducers, applyMiddleware(thunk));
const Routing = (store) => (
	<>
		<Provider store={store}>
			<BrowserRouter>
				<Header/>
				<Switch>

					<Route exact path="/Category/:resourceCategoryId" component={ResourcesInCategory} resourceCategoryId=":resourceCategoryId"/>
					<Route exact path="/" component={Home}/>
					<Route component={FourOhFour}/>
				</Switch>
				{/*<Footer/>*/}
			</BrowserRouter>
		</Provider>
	</>
);
ReactDOM.render(Routing(store), document.querySelector('#root'));