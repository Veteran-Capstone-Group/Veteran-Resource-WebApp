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
//import miscImage from "../../shared/img/misc.svg";
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
	
	return (
		<>
			<div className={`categoryTray`}>
				<Container className={`d-flex justify-content-around`}>
					<Container>
						<Row justify-content-center>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Food/Clothing</h2>
									<div className={`categoryButton`}>
											<a id={`clothing-link`} className={`d-flex justify-content-center`} href={'test.com'}>
												<img className={`category-image`} src={clothingImage} alt={'clothing'} />
											</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Disability</h2>
									<div className={`categoryButton`}>
										<a id={`disability-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={disabilityImage} alt={'disability'} />
										</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Education</h2>
									<div className={`categoryButton`}>
										<a id={`education-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={educationImage} alt={'education'} />
										</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Employment</h2>
									<div className={`categoryButton`}>
										<a id={`employment-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={employmentImage} alt={'employment'} />
										</a>
									</div>
								</div>
							</Col>
						</Row>
						<Row justify-content-center>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Mental Health</h2>
									<div className={`categoryButton`}>
										<a id={`mentalhealth-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={mentalhealthImage} alt={'mentalhealth'} />
										</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Healthcare</h2>
									<div className={`categoryButton`}>
										<a id={`healthcare-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={healthcareImage} alt={'healthcare'} />
										</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Housing</h2>
									<div className={`categoryButton`}>
										<a id={`housing-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={housingImage} alt={'housing'} />
										</a>
									</div>
								</div>
							</Col>
							<Col xs={6} sm={6} md={6} lg={3}>
								<div className={`d-flex flex-column justify-content-center`}>
									<h2 className={`categoryTitle`}>Miscellaneous</h2>
									<div className={`categoryButton`}>
										<a id={`mentalhealth-link`} className={`d-flex justify-content-center`} href={'test.com'}>
											<img className={`category-image`} src={mentalhealthImage} alt={'mentalhealth'} />
										</a>
									</div>
								</div>
							</Col>
						</Row>
					</Container>
				</Container>
			</div>
		</>
	)
};