import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Col from "react-bootstrap/Col";
import NavDropdown from "react-bootstrap/NavDropdown";
import {UseWindowWidth} from "../../../utils/UseWindowWidth.js";
import logo from "../../../img/logo.png";


export const Header = () => {
	const isMobile = UseWindowWidth() < 991;

	if(isMobile) {//create mobile header
		return (
			<>
				<Navbar className={`p-0 border border-dark bg-light`}>
					<Navbar.Toggle aria-controls="navbar-nav"/>
					<Navbar.Collapse id="navbar-nav">
						<Col id="navDropdownButton">
							<NavDropdown title="$CategoryTitle" id="collapsible-nav-dropdown"
											 className={`mobile-fix text-dark`}>
								<Col xs={10}>
									<NavDropdown.Item
										href="/Category/501c7665-a4b1-47ab-a157-13d198f67d97">Clothing/Food</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href="/Category/b20fe0cd-43e4-4878-9d29-a4ecb57678a3">Disability</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href="/Category/b2b19ae1-7c88-4f5d-baa2-b2ebf964cd2a">Education</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href="/Category/faef9afc-61e2-4238-a634-b15164ebdbae">Employment</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="/Category/0535ca67-9c12-4cc9-9450-e2faa89b91db">Mental
										Health</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href="/Category/34b09b0c-08a9-46a5-829b-0e5b7f385f5a">Healthcare</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item
										href="/Category/8167caec-0d53-47c7-8a86-9b226a325eae">Housing</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item id={`bottomMenuItem`}
															href="/Category/a48077fe-3955-460d-9bb8-e04e48aad125">Miscellaneous</NavDropdown.Item>
								</Col>
								<Col xs={2}>
									<span></span>
								</Col>
							</NavDropdown>
						</Col>
						<a href="/"><img src={logo} className={'img-fluid d-inline'} id={"logoimage"}
											  alt={"ABQ Veterans Logo"}/></a>
					</Navbar.Collapse>
				</Navbar>
			</>
		)
	} else {//create desktop header
		return (
			<>
				<Navbar collapseOnSelect expand="md" className={`p-0 border border-dark bg-light`}>
					<Navbar.Toggle aria-controls="responsive-navbar-nav"/>
					<Navbar.Collapse id="responsive-navbar-nav">
						<Col xs={2} id="navDropdownButton">
							<NavDropdown title="$CategoryTitle" id="collapsible-nav-dropdown" className={`text-dark`}>
								<NavDropdown.Item
									href="/Category/501c7665-a4b1-47ab-a157-13d198f67d97">Clothing/Food</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href="/Category/b20fe0cd-43e4-4878-9d29-a4ecb57678a3">Disability</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href="/Category/b2b19ae1-7c88-4f5d-baa2-b2ebf964cd2a">Education</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href="/Category/faef9afc-61e2-4238-a634-b15164ebdbae">Employment</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item href="/Category/0535ca67-9c12-4cc9-9450-e2faa89b91db">Mental
									Health</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href="/Category/34b09b0c-08a9-46a5-829b-0e5b7f385f5a">Healthcare</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item
									href="/Category/8167caec-0d53-47c7-8a86-9b226a325eae">Housing</NavDropdown.Item><NavDropdown.Divider/>
								<NavDropdown.Item id={`bottomMenuItem`}
														href="/Category/a48077fe-3955-460d-9bb8-e04e48aad125">Miscellaneous</NavDropdown.Item>
							</NavDropdown>
						</Col>
						<Col xs={8}>
							<Navbar.Brand className={"col-12 text-center font-weight-bold text-dark"} id="DesktopHeader"
											  href="#home">ABQ Veterans</Navbar.Brand>
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