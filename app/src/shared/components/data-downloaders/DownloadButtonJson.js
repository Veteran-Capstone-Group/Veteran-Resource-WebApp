import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import React from "react";

function downloadResourcesAsJson(exportList, exportName) {
	//prepends datatype to export list
	const dataStr = "data:text/json;charset=utf-8,"+encodeURIComponent(JSON.stringify(exportList).split(',').join(',\r\n'));
	//creates element to download json
	let downloadAnchorNode = document.createElement('a');
	//sets attributes of element to allow us to target our dataset and download it
	downloadAnchorNode.setAttribute("href", dataStr);
	downloadAnchorNode.setAttribute("download", exportName+".json");
	//appends element to the document (required for use
	document.body.appendChild(downloadAnchorNode);
	downloadAnchorNode.click();
	downloadAnchorNode.remove();
}