import {useState, useEffect} from "react";
/**
 * set a event listener to update screen width on screen resizing, useful when you want to show diferent elements
 * depending on screen size.
 */
export const UseWindowWidth=() => {
	const [width, setWidth] = useState(window.innerWidth);
	useEffect(() => {
		const handleResize = () => setWidth(window.innerWidth);
		window.addEventListener('resize', handleResize);
		return () => {
			window.removeEventListener('resize', handleResize);
		};
	});
	return width;
};

