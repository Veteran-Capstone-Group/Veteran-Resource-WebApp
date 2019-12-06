import React from 'react';
import ReactDOM from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import {BrowserRouter} from "react-router-dom";
import {Route, Switch} from "react-router";
import {FourOhFour} from "./pages/four-oh-four/FourOhFour";
import {Home} from "./pages/home/Home";
import {Header} from "./shared/components/main-nav/header/Header";
import {SignUpModal} from "./shared/components/main-nav/sign-up/SignUpModal";
import {Footer} from "./shared/components/main-nav/footer/footer";
import {ResourceCard} from "./shared/components/resource-card/resource-card";


const Routing = () => (
	<>
		<BrowserRouter>
			{/*<ResourceCard/>*/}
			<Header/>
			<Switch>
				<Route exact path="/" component={Home}/>
				<Route component={FourOhFour}/>
				<Route component={SignUpModal}/>
				<Route component={ResourceCard}/>
			</Switch>
			<Footer/>
		</BrowserRouter>
	</>
);
ReactDOM.render(<Routing/>, document.querySelector('#root'));