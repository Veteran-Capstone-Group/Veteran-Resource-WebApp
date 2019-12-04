import React from "react";
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import NavDropdown from "react-bootstrap/NavDropdown";


export const Header = () => {
	const isMobile = window.innerWidth < 480;
	if(isMobile) {//create mobile header

	} else {//create desktop header
		return (
			<>
				<Navbar collapseOnSelect expand="lg">
					<Navbar.Toggle aria-controls="responsive-navbar-nav"/>
					<Navbar.Collapse id="responsive-navbar-nav">
						<Nav className="mr-auto">
							<NavDropdown title="Dropdown" id="collasible-nav-dropdown" border-right border-light>
								<NavDropdown.Item href="#action/3.1">Action</NavDropdown.Item>
								<NavDropdown.Item href="#action/3.2">Another action</NavDropdown.Item>
								<NavDropdown.Item href="#action/3.3">Something</NavDropdown.Item>
								<NavDropdown.Divider/>
								<NavDropdown.Item href="#action/3.4">Separated link</NavDropdown.Item>
							</NavDropdown>
						</Nav>
					</Navbar.Collapse>
					<Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
				</Navbar>
			</>
		)
	}
};