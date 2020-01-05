import React, {useEffect} from "react";
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
import {useDispatch, useSelector} from "react-redux";
import {getAllCategories} from "../../shared/actions/category";

export const Home = () => {
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
	if(categoryOne) {
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
	}
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
				<Slider itemOne="" itemTwo="" itemThree="" className="pt-0"/>
				<div className={`categoryTray`} id="categoryTray">
					<Container className={`d-flex justify-content-around`}>
						<Container>
							<Row justify-content-center>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryOneName}</h2>
										<div className={`categoryButton`}>
											<a id={`clothing-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryOneUuid}>
												<img className={`category-image`} src={clothingImage} alt={categoryOneName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryTwoName}</h2>
										<div className={`categoryButton`}>
											<a id={`disability-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryTwoUuid}>
												<img className={`category-image`} src={disabilityImage} alt={categoryTwoName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryThreeName}</h2>
										<div className={`categoryButton`}>
											<a id={`education-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryThreeUuid}>
												<img className={`category-image`} src={educationImage} alt={categoryThreeName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryFourName}</h2>
										<div className={`categoryButton`}>
											<a id={`employment-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryFourUuid}>
												<img className={`category-image`} src={employmentImage} alt={categoryFourName}/>
											</a>
										</div>
									</div>
								</Col>
							</Row>
							<Row justify-content-center>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryFiveName}</h2>
										<div className={`categoryButton`}>
											<a id={`mentalhealth-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryFiveUuid}>
												<img className={`category-image`} src={mentalhealthImage} alt={categoryFiveName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categorySixName}</h2>
										<div className={`categoryButton`}>
											<a id={`healthcare-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categorySixUuid}>
												<img className={`category-image`} src={healthcareImage} alt={categorySixName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categorySevenName}</h2>
										<div className={`categoryButton`}>
											<a id={`housing-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categorySevenUuid}>
												<img className={`category-image`} src={housingImage} alt={categorySevenName}/>
											</a>
										</div>
									</div>
								</Col>
								<Col xs={6} sm={6} md={6} lg={3}>
									<div className={`d-flex flex-column justify-content-center`}>
										<h2 className={`categoryTitle`}>{categoryEightName}</h2>
										<div className={`categoryButton`}>
											<a id={`miscellaneous-link`} className={`d-flex justify-content-center`}
												href={'/Category/' + categoryEightUuid}>
												<img className={`category-image`} src={miscImg} alt={categoryEightName}/>
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