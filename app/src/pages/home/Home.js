import React from "react";
import {useSelector, useDispatch} from "react-redux";
import {getAllCategories} from "../../shared/actions/category";

export const Home = () => {
	const categories = useSelector(state => state.categories);
	const dispatch = useDispatch();

	const effects = () => {
		dispatch(getAllCategories());
	};

	const inputs = [];

	useEffect(effects,inputs);

	return (
		<>
			<h1>Home Test</h1>
			{categories.map(category => {
				return(
					<Div id={{homepageCategory}} key={category.categoryId}>
						<a id={`${category.categoryType}-link`} href={'test.com'}> /**/
							<img id={`${category.categoryType}-image`} src={`../../../../documentation/svg-icons/${category.categoryType}.svg`} alt={category.categoryType} />
						</a>
					</Div>
				)
			})}
		</>
	)
};