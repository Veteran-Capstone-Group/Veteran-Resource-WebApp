import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import Col from "react-bootstrap/Col";
import NavDropdown from "react-bootstrap/NavDropdown";


export const Header = () => {
	const isMobile = window.innerWidth < 480;
	if(isMobile) {//create mobile header

	} else {//create desktop header
		return (
			<>
				<Navbar collapseOnSelect expand="md" className={`p-0 border border-dark bg-light`}>
					<Navbar.Toggle aria-controls="responsive-navbar-nav"/>
					<Navbar.Collapse id="responsive-navbar-nav">
						<Col xs={2} id="navDropdownButton">
								<NavDropdown title="$CategoryTitle" id="collasible-nav-dropdown" className={`text-dark`}>
									<NavDropdown.Item href="#action/3.1">Clothing/Food</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.2">Disability</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.3">Education</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.4">Employment</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.5">Mental Health</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.6">Healthcare</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item href="#action/3.7">Housing</NavDropdown.Item><NavDropdown.Divider/>
									<NavDropdown.Item id={`bottomMenuItem`} href="#action/3.8">Miscellaneous</NavDropdown.Item>
								</NavDropdown>
						</Col>
						<Col xs={8}>
							<Navbar.Brand className={"col-12 text-center font-weight-bold text-dark"} id="DesktopHeader" href="#home">ABQ Veterans</Navbar.Brand>
						</Col>
						<Col xs={2}>
							<span></span>
						</Col>
					</Navbar.Collapse>

				</Navbar>
			</>
		)
	}
};