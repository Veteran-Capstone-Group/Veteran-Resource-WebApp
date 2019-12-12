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
import healthcareImage from "../../shared/img/healthcare.svg";
import housingImage from "../../shared/img/housing.svg";
import mentalhealthImage from "../../shared/img/mentalhealth.svg";
import miscImg from "../../shared/img/misc.svg";

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
	const clothingAndFood = "777640f1-dac4-4ae1-9c31-ac9fd3f70e35";
	const disability = "9993a0c5-2247-4654-8f84-79daa9a8ef93";
	const education = "bdf8061d-f359-4ece-b782-07b50ac9b015";
	const employment = "c8a2c629-fc51-4a38-9eac-d75cd5685f58";
	const mentalHealth = "100c162d-9a5e-4d51-ab75-75ccd3bd3253";
	const healthcare = "60ea99d3-07d2-4284-a641-2ab39e1e708a";
	const housing = "7e94b87a-4ee9-48c6-bd44-b0cb9ef218ad";
	const miscellaneous = "3a55391b-fea6-4772-99b3-93e7cb6f4730";

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
										<h2 className={`categoryTitle`}>Food and Clothing</h2>
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