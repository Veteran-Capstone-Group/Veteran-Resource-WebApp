import React from "react";
//Homepage component bootstrap styling
import "../../index.css";
import 'bootstrap/dist/css/bootstrap.css';
import Col from "react-bootstrap/Col";
import Row from "react-bootstrap/Row";
import Container from "react-bootstrap/Container";
//IMAGES
import clothingImage from "../../shared/img/clothing.svg";
import disabilityImage from "../../shared/img/disability.svg";
import educationImage from "../../shared/img/education.svg";
import employmentImage from "../../shared/img/employment.svg";
//import foodImage from "../../shared/img/food.svg";
//TODO add food/clothing image
//import foodClothingImage from "../../shared/img/foodclothing.svg";
import healthcareImage from "../../shared/img/healthcare.svg";
import housingImage from "../../shared/img/housing.svg";
import mentalhealthImage from "../../shared/img/mentalhealth.svg";
import miscImg from "../../shared/img/misc.svg"
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
//TODO add misc image
//import miscImage from "../../shared/img/misc.svg";
//import miscImage from "../../shared/img/clothing.svg";

import Footer from "../../shared/components/main-nav/footer/footer"
import Slider from "../../shared/components/main-nav/slider/slider";

export const Home = () => {
	/*const categories = useSelector(state => state.categories);
	const dispatch = useDispatch();

	const effects = () => {
		dispatch(getAllCategories());
	};

	const inputs = [];

	useEffect(effects,inputs);
	*/
	const clothingAndFood = "501c7665-a4b1-47ab-a157-13d198f67d97";
	const disability = "b20fe0cd-43e4-4878-9d29-a4ecb57678a3";
	const education = "b2b19ae1-7c88-4f5d-baa2-b2ebf964cd2a";
	const employment = "faef9afc-61e2-4238-a634-b15164ebdbae";
	const mentalHealth = "0535ca67-9c12-4cc9-9450-e2faa89b91db";
	const healthcare = "34b09b0c-08a9-46a5-829b-0e5b7f385f5a";
	const housing = "8167caec-0d53-47c7-8a86-9b226a325eae";
	const miscellaneous = "a48077fe-3955-460d-9bb8-e04e48aad125";

	return (
		<>
			<div id="mainContent" className="d-lg-block d-flex align-items-center justify-content-center">
				<Slider className="pt-0"/>
				<div className={`categoryTray`} id="categoryTray">
					<Container className={`d-flex justify-content-around`}>
						<Container>
							<Row justify-content-center>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Food/Clothing</h2>
										<div className={`categoryButton`}>
											<a id={`clothing-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + clothingAndFood}>
												<img className={`category-image`} src={clothingImage} alt={'clothing'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Disability</h2>
										<div className={`categoryButton`}>
											<a id={`disability-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + disability}>
												<img className={`category-image`} src={disabilityImage} alt={'disability'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Education</h2>
										<div className={`categoryButton`}>
											<a id={`education-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + education}>
												<img className={`category-image`} src={educationImage} alt={'education'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Employment</h2>
										<div className={`categoryButton`}>
											<a id={`employment-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + employment}>
												<img className={`category-image`} src={employmentImage} alt={'employment'}/>
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
											<a id={`mentalhealth-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + mentalHealth}>
												<img className={`category-image`} src={mentalhealthImage} alt={'mentalhealth'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Healthcare</h2>
										<div className={`categoryButton`}>
											<a id={`healthcare-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + healthcare}>
												<img className={`category-image`} src={healthcareImage} alt={'healthcare'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Housing</h2>
										<div className={`categoryButton`}>
											<a id={`housing-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + housing}>
												<img className={`category-image`} src={housingImage} alt={'housing'}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>Miscellaneous</h2>
										<div className={`categoryButton`}>
											<a id={`miscellaneous-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + miscellaneous}>
												<img className={`category-image`} src={miscImg} alt={'miscellaneous'}/>
											</a>
										</div>
									</div>
								</Col>
							</Row>
						</Container>
					</Container>
				</div>
			</div>
			<Footer/>
		</>
	)
};