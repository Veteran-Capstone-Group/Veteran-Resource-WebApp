import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Col from "react-bootstrap/Col";
import NavDropdown from "react-bootstrap/NavDropdown";
import {UseWindowWidth} from "../../../utils/UseWindowWidth.js";
import logo from "../../../img/logo.png";


export const Header= () => {
	const isMobile = UseWindowWidth() < 991;
	const clothingAndFood = "777640f1-dac4-4ae1-9c31-ac9fd3f70e35";
	const disability = "9993a0c5-2247-4654-8f84-79daa9a8ef93";
	const education = "bdf8061d-f359-4ece-b782-07b50ac9b015";
	const employment= "c8a2c629-fc51-4a38-9eac-d75cd5685f58";
	const mentalHealth = "100c162d-9a5e-4d51-ab75-75ccd3bd3253";
	const healthcare = "60ea99d3-07d2-4284-a641-2ab39e1e708a";
	const housing = "7e94b87a-4ee9-48c6-bd44-b0cb9ef218ad";
	const miscellaneous = "3a55391b-fea6-4772-99b3-93e7cb6f4730";

	const arrayOfCategoryTitles = {"777640f1-dac4-4ae1-9c31-ac9fd3f70e35":"Clothing/Food",
		"9993a0c5-2247-4654-8f84-79daa9a8ef93":"Disability", "bdf8061d-f359-4ece-b782-07b50ac9b015": "Education",
		"c8a2c629-fc51-4a38-9eac-d75cd5685f58": "Employment", "100c162d-9a5e-4d51-ab75-75ccd3bd3253": "Mental Health",
		"60ea99d3-07d2-4284-a641-2ab39e1e708a": "Healthcare", "7e94b87a-4ee9-48c6-bd44-b0cb9ef218ad":"Housing",
		"3a55391b-fea6-4772-99b3-93e7cb6f4730":"Miscellaneous"};
let title = arrayOfCategoryTitles[window.location.pathname.split("/Category/")[1]];
	if(isMobile) {//create mobile header
		return (
			<>
				<Navbar className={`p-0 border border-dark bg-light sticky-top`} id="header">
					<Navbar.Toggle aria-controls="navbar-nav"/>
					<Navbar.Collapse id="navbar-nav">
						<Col id="navDropdownButton">
							<NavDropdown title={window.location.pathname === "/" ? "Home" : title} id="collapsible-nav-dropdown"
											 className={`mobile-fix text-dark`}>
								<Col xs={10}>
									<NavDropdown.Item
										href={"/"}>Home</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+clothingAndFood} className="dropdownText">Clothing/Food</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+disability} className="dropdownText">Disability</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+education} className="dropdownText">Education</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+employment} className="dropdownText">Employment</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href={"/Category/"+mentalHealth} className="dropdownText">Mental
										Health</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+healthcare} className="dropdownText">Healthcare</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href={"/Category/"+housing} className="dropdownText">Housing</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item id={`bottomMenuItem`}
															href={"/Category/"+miscellaneous} className="dropdownText">Miscellaneous</NavDropdown.Item>
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
								<NavDropdown.Item
									href={"/"}>Home</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+clothingAndFood} className="dropdownText">Clothing/Food</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+disability} className="dropdownText">Disability</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+education} className="dropdownText">Education</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+employment} className="dropdownText">Employment</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href={"/Category/"+mentalHealth} className="dropdownText">Mental
									Health</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+healthcare} className="dropdownText">Healthcare</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href={"/Category/"+housing} className="dropdownText">Housing</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item id={`bottomMenuItem`}
														href={"/Category/"+miscellaneous} className="dropdownText">Miscellaneous</NavDropdown.Item>
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