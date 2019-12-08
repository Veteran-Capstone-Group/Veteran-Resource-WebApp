import React from "react";
import {useSelector, useDispatch} from "react-redux";
import {getAllCategories} from "../../shared/actions/category";
//Homepage component bootstrap styling
import 'bootstrap/dist/css/bootstrap.css';
import Col from "react-bootstrap/Col";
import Row from "react-bootstrap/Row";
import Container from "react-bootstrap/Container";
//IMAGES
import clothingImage from "../../shared/img/clothing.svg";
import disabilityImage from "../../shared/img/disability.svg";
import educationImage from "../../shared/img/education.svg";
import employmentImage from "../../shared/img/employment.svg";
import foodImage from "../../shared/img/food.svg";
//TODO add food/clothing image
//import foodClothingImage from "../../shared/img/foodclothing.svg";
import healthcareImage from "../../shared/img/healthcare.svg";
import housingImage from "../../shared/img/housing.svg";
import mentalhealthImage from "../../shared/img/mentalhealth.svg";
//TODO add misc image
//import miscImage from "../../shared/img/misc.svg";
//import miscImage from "../../shared/img/clothing.svg";

import Footer from "../../shared/components/main-nav/footer/footer"
import ResourceCard from "../../shared/components/resource-card/ResourceCard"
import Stylesheet from "../../index.css"

export const Home = () => {
	/*const categories = useSelector(state => state.categories);
	const dispatch = useDispatch();

	const effects = () => {
		dispatch(getAllCategories());
	};

	const inputs = [];

	useEffect(effects,inputs);
	*/
	const testResource= {
			"resourceId": "02357c37-4310-4ebd-a124-69bf314339d9",
			"resourceCategoryId": "a48077fe-3955-460d-9bb8-e04e48aad125",
			"resourceUserId": "ca38847b-1449-41b7-b794-6232ffcccc74",
			"resourceAddress": "500 Gold Ave. SW, Suite 3104",
			"resourceApprovalStatus": true,
			"resourceDescription": "The program provides financial aid grants of up to $1,500 to assist with basic life needs in the form of a grant - not a loan - so no repayment is required.",
			"resourceEmail": "unmetneeds@vfw.org",
			"resourceImageUrl": "https:\/\/seeklogo.com\/images\/V\/VFW-logo-D1627FAE12-seeklogo.com.png",
			"resourceOrganization": "Veterans of Foreign Wars",
			"resourcePhone": "(505) 346-4881",
			"resourceTitle": "Financial Grants",
			"resourceUrl": "https:\/\/www.vfw.org\/assistance\/financial-grants"
		};
	return (
		<>
			<ResourceCard resource={testResource}/>
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