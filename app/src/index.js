import React from 'react';
import ReactDOM from 'react-dom'
import thunk from "redux-thunk";
import 'bootstrap/dist/css/bootstrap.css';
import reducers from "./shared/reducer"
import {Provider} from 'react-redux';
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/four-oh-four/FourOhFour";
import {Home} from "./pages/home/Home";
import {Header} from "./shared/components/main-nav/header/Header";
import {Footer} from "./shared/components/main-nav/footer/footer";
import { library } from '@fortawesome/fontawesome-svg-core';
import {faDove, faEnvelope, faKey, faPhone, faStroopwafel, faMedal} from '@fortawesome/free-solid-svg-icons';
import {applyMiddleware, createStore} from "redux";


library.add(faDove, faEnvelope, faKey, faPhone, faStroopwafel, faMedal);
const store = createStore(reducers,applyMiddleware(thunk));
const Routing = () => (
	<>
		<BrowserRouter>
			<Header/>
			<Provider store={store}>
			<Switch>
				<Route exact path="/" component={Home}/>
				<Route component={FourOhFour}/>
			</Switch>
			</Provider>
			<Footer/>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));