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
import foodImage from "../../shared/img/food.svg";
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
				<Container className={`d-flex justify-content-around`}>
					<Container>
						<Row justify-content-center>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
										<a id={`clothing-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={clothingImage} alt={'clothing'} />
										</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`disability-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={disabilityImage} alt={'disability'} />
									</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`education-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={educationImage} alt={'education'} />
									</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`employment-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={employmentImage} alt={'employment'} />
									</a>
								</div>
							</Col>
						</Row>
						<Row justify-content-center>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`food-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={foodImage} alt={'food'} />
									</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`healthcare-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={healthcareImage} alt={'healthcare'} />
									</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`housing-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={housingImage} alt={'housing'} />
									</a>
								</div>
							</Col>
							<Col xs={6} sm={6}   md={3}>
								<div className={`categoryButton`}>
									<a id={`mentalhealth-link`} className={`d-flex justify-content-center`} href={'test.com'}>
										<img className={`category-image`} src={mentalhealthImage} alt={'mentalhealth'} />
									</a>
								</div>
							</Col>
						</Row>
					</Container>
				</Container>
			</div>
		</>
	)
};