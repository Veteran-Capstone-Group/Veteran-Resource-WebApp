import React from "react";
import {useSelector, useDispatch} from "react-redux";
import {getAllCategories} from "../../shared/actions/category";
import 'bootstrap/dist/css/bootstrap.css';
import Col from "react-bootstrap/Col";
import Row from "react-bootstrap/Row";
import Container from "react-bootstrap/Container";
import clothingImage from "../../shared/img/clothing.svg";
import disabilityImage from "../../shared/img/disability.svg";
import educationImage from "../../shared/img/education.svg";
import employmentImage from "../../shared/img/employment.svg";
import healthcareImage from "../../shared/img/healthcare.svg";
import housingImage from "../../shared/img/housing.svg";
import mentalhealthImage from "../../shared/img/mentalhealth.svg";
//import miscImage from "../../shared/img/clothing.svg";
import stylesheet from "../../index.css";

export const Home = () => {
	/*const categories = useSelector(state => state.categories);
	const dispatch = useDispatch();

	const effects = () => {
		dispatch(getAllCategories());
	};

	const inputs = [];

	useEffect(effects,inputs);
	*/

//TODO UNFUCKIFY THIS SHIT
	return (
		<>
			<h1>Home Test</h1>
			<div className={`categoryTray`}>
				<Container>
					<Row>
						<Col s={6} md={3} l={3}>
							<div className={`categoryButton`}>
									<a id={`clothing-link`} href={'test.com'}>
										<img className={`category-image`} src={clothingImage} alt={'clothing'} />
									</a>
							</div>
							<div className={`categoryButton`}>
								<a id={`clothing-link`} href={'test.com'}>
									<img className={`category-image`} src={disabilityImage} alt={'clothing'} />
								</a>
							</div>
							<div className={`categoryButton`}>
								<a id={`clothing-link`} href={'test.com'}>
									<img className={`category-image`} src={educationImage} alt={'clothing'} />
								</a>
							</div>
							<div className={`categoryButton`}>
								<a id={`clothing-link`} href={'test.com'}>
									<img className={`category-image`} src={employmentImage} alt={'clothing'} />
								</a>
							</div>
						</Col>
					</Row>
				</Container>
			</div>
		</>
	)
};