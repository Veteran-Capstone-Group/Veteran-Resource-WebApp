import React from "react";
import Carousel from "react-bootstrap/Carousel";
import ResourceCard from "../../resource-card/ResourceCard";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {UseWindowWidth} from "../../../utils/UseWindowWidth";

const itemOne = {
	"resourceCategoryId": "a48077fe-3955-460d-9bb8-e04e48aad125",
	"resourceTitle": "Lifeline Program for Low-Income Consumers",
	"resourceOrganization": "Federal Communications Commission",
	"resourceDescription": "The Lifeline program has provided a discount on phone service for qualifying low-income consumers.",
	"resourceAddress": "",
	"resourcePhone": "1 (888) 225-5322",
	"resourceEmail": "Lifeline@fcc.gov",
	"resourceUrl": "https://www.fcc.gov/general/lifeline-program-low-income-consumers",
	"resourceImageUrl": "https://transition.fcc.gov/files/logos/fcc-logo_black-on-white.jpg"
};
const itemTwo = {
	"resourceId": "338a143c-a2bd-4ed3-a380-be0d12261d85",
	"resourceCategoryId": "501c7665-a4b1-47ab-a157-13d198f67d97",
	"resourceUserId": "ca38847b-1449-41b7-b794-6232ffcccc74",
	"resourceAddress": "13032 Central Ave SE",
	"resourceApprovalStatus": true,
	"resourceDescription": "The VIC believes in giving back and 85% of our donations are redistributed directly to the Veteran community we serve",
	"resourceEmail": "",
	"resourceImageUrl": "https:\/\/3j64pchzwf-flywheel.netdna-ssl.com\/wp-content\/uploads\/2019\/06\/New-VIC-Logo-200t.png",
	"resourceOrganization": "Veteran Integration Centers",
	"resourcePhone": "(505) 265-0512",
	"resourceTitle": "Free clothing and furniture for veterans",
	"resourceUrl": "https:\/\/nmvic.org\/"
};
const itemThree = {
	"resourceId": "058ee95f-b90d-45b4-83a2-7a4b0630e749",
	"resourceCategoryId": "b2b19ae1-7c88-4f5d-baa2-b2ebf964cd2a",
	"resourceUserId": "ca38847b-1449-41b7-b794-6232ffcccc74",
	"resourceAddress": "",
	"resourceApprovalStatus": true,
	"resourceDescription": "GI Bill benefits help you pay for college, graduate school, and training programs.",
	"resourceEmail": "",
	"resourceImageUrl": "",
	"resourceOrganization": "",
	"resourcePhone": "",
	"resourceTitle": "G.I. Bill",
	"resourceUrl": "https:\/\/www.va.gov\/education\/about-gi-bill-benefits\/"
};

export const Slider = () => {
	const width = UseWindowWidth();
	return (
		<>
			{width > 991 ? (
				<Carousel indicators={false} className="p-0" id="slider">
					<Carousel.Item className="p-0">
						<ResourceCard resource={itemOne} className="p-0"/>
					</Carousel.Item>
					<Carousel.Item className="p-0">
						<ResourceCard resource={itemTwo} className="p-0"/>
					</Carousel.Item>
					<Carousel.Item className="p-0">
						<ResourceCard resource={itemThree} className="p-0"/>
					</Carousel.Item>
				</Carousel>

			) : (
				<div id="mobileSlider">
						<ResourceCard resource={itemThree} className="p-0"/>
				</div>
				)}
		</>
	)
};
export default Slider;
