import React, {useEffect} from "react";
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Col from "react-bootstrap/Col";
import NavDropdown from "react-bootstrap/NavDropdown";
import {UseWindowWidth} from "../../../utils/UseWindowWidth.js";
import logo from "../../../img/logo.png";
import {useSelector, useDispatch} from "react-redux";
import {getAllCategories} from "../../../../shared/actions/category";


export const Header= () => {
	const isMobile = UseWindowWidth() < 991;

	const categories = useSelector(state => state.category ? state.category : []);

	// assigns useDispatch reference to the dispatch variable for later use.
	const dispatch = useDispatch();

	// Define the side effects that will occur in the application, e.g., code that handles dispatches to redux, API requests, or timers.
	// The dispatch function takes actions as arguments to make changes to the store/redux.
	const effects = () => {
		dispatch(getAllCategories());
	};

	// Declare any inputs that will be used by functions that are declared in sideEffects.
	const inputs = [];

	/**
	 * Pass both sideEffects and sideEffectInputs to useEffect.
	 * useEffect is what handles re-rendering of components when sideEffects resolve.
	 * E.g when a network request to an api has completed and there is new data to display on the dom.
	 **/
	useEffect(effects, inputs);
	//establish variable names for later use, required to not error out before state is populated
	let categoryOne = categories[0];
	let categoryOneName, categoryTwoName, categoryThreeName, categoryFourName, categoryFiveName, categorySixName, categorySevenName, categoryEightName;
	let categoryOneUuid, categoryTwoUuid, categoryThreeUuid, categoryFourUuid, categoryFiveUuid, categorySixUuid, categorySevenUuid, categoryEightUuid;
	let selectedCategory;
	if(categoryOne) {
		//sets values for navigation menu dynamically
		categoryOneName = categories[0]["categoryType"];
		categoryTwoName = categories[1]["categoryType"];
		categoryThreeName = categories[2]["categoryType"];
		categoryFourName= categories[3]["categoryType"];
		categoryFiveName = categories[4]["categoryType"];
		categorySixName = categories[5]["categoryType"];
		categorySevenName = categories[6]["categoryType"];
		categoryEightName = categories[7]["categoryType"];
		categoryOneUuid = categories[0]["categoryId"];
		categoryTwoUuid = categories[1]["categoryId"];
		categoryThreeUuid = categories[2]["categoryId"];
		categoryFourUuid = categories[3]["categoryId"];
		categoryFiveUuid = categories[4]["categoryId"];
		categorySixUuid = categories[5]["categoryId"];
		categorySevenUuid = categories[6]["categoryId"];
		categoryEightUuid = categories[7]["categoryId"];
		//sets selected category for title
		//selectedCategory = window.location.pathname === "/" ? "Home" : categories.find(category => category["categoryId"] === window.location.pathname.split("/Category/")[1])["categoryType"];
	}

let title = "selectedCategory";

	if(isMobile) {//create mobile header
		return (
			<>
				<Navbar className={`p-0 border border-dark bg-light sticky-top`} id="header">
					<Navbar.Toggle aria-controls="navbar-nav"/>
					<Navbar.Collapse id="navbar-nav">
						<Col id="navDropdownButton">
							<NavDropdown title={title} id="collapsible-nav-dropdown"
											 className={`mobile-fix text-dark`}>
								<Col xs={10}>
									<NavDropdown.Item href={"/"}>Home</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categoryOneUuid} className="dropdownText">{categoryOneName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categoryTwoUuid} className="dropdownText">{categoryTwoName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categoryThreeUuid} className="dropdownText">{categoryThreeName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categoryFourUuid} className="dropdownText">{categoryFourName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categoryFiveUuid} className="dropdownText">{categoryFiveName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categorySixUuid} className="dropdownText">{categorySixName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+categorySevenUuid} className="dropdownText">{categorySevenName}</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item id={`bottomMenuItem`} href={"/Category/"+categoryEightUuid} className="dropdownText">{categoryEightName}</NavDropdown.Item>
								</Col>
								<Col xs={2}>
									<span></span>
								</Col>
							</NavDropdown>
						</Col>
						<a href="/"><img src={logo} className={'img-fluid d-inline pr-2'} id={"logoimage"}
											  alt={"ABQ Veterans Logo"}/></a>
					</Navbar.Collapse>
				</Navbar>
			</>
		)
	} else {//create desktop header
		return (
			<>
				<Navbar collapseOnSelect expand="md" className={`p-0 border border-dark bg-light sticky-top`} id="header">
					<Navbar.Toggle aria-controls="responsive-navbar-nav"/>
					<Navbar.Collapse id="responsive-navbar-nav">
						<Col xs={2} id="navDropdownButton">
							<NavDropdown title={window.location.pathname === "/" ? "Home" : title} id="collapsible-nav-dropdown" className={`text-dark`}>
								<NavDropdown.Item href={"/"}>Home</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categoryOneUuid} className="dropdownText">{categoryOneName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categoryTwoUuid} className="dropdownText">{categoryTwoName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categoryThreeUuid} className="dropdownText">{categoryThreeName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categoryFourUuid} className="dropdownText">{categoryFourName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categoryFiveUuid} className="dropdownText">{categoryFiveName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categorySixUuid} className="dropdownText">{categorySixName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+categorySevenUuid} className="dropdownText">{categorySevenName}</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item id={`bottomMenuItem`} href={"/Category/"+categoryEightUuid} className="dropdownText">{categoryEightName}</NavDropdown.Item>
							</NavDropdown>
						</Col>
						<Col xs={8}>
							<Navbar.Brand className={"col-12 text-center font-weight-bold text-dark"} id="DesktopHeader"
											  href="/">ABQ Veterans</Navbar.Brand>
						</Col>
						<Col xs={2}>
							<a href="/"><img src={logo} className={'img-fluid d-inline'} id={"logoimage"}
												  alt={"ABQ Veterans Logo"}/></a>
						</Col>
					</Navbar.Collapse>
				</Navbar>
			</>
		)
	}
};