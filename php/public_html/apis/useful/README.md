# Useful API

#### API INFO
Our useful API manages interactions with our useful feature.

#### ENDPOINTS
* [Get Number of Usefuls for a Resource](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Get-Number-of-Usefuls-for-a-Resource)
* [Add Useful to Resource](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Add-Useful-to-Resource)
* [Remove Useful from Resource](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Remove-Useful-from-Resource)


[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---

## Get Number of Usefuls for a Resource  

This API returns the number of times a resource has been useful'd by users.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/useful/`

**HTTP Method:** GET   

**Required Input:**    
`usefulResourceId: $resourceId`        

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 404** - 'incorrect search parameters'  
* **Code: 405** - 'Invalid HTTP method request'  


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Useful-API)

---

## Add Useful to Resource  

This API adds a useful to the resource.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/useful/`

**HTTP Method:** POST   

**Required Input:**  
XSRF Token    
JWT Token  
`usefulResourceId: $resourceId`        

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 403** - 'you must be logged in to useful resources'    
* **Code: 405** - 'Invalid HTTP method request'  


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Useful-API)

---

## Remove Useful from Resource  

This API removes a useful from the resource.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/useful/`

**HTTP Method:** PUT   

**Required Input:**    
XSRF Token  
JWT Token  
`usefulResourceId: $resourceId`        

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 401** - 'You must be signed in to delete your useful'  
* **Code: 404** - 'Useful Does Not Exist'  
* **Code: 405** - 'No User for this Useful'  
* **Code: 405** - 'No Resource for this Useful'
* **Code: 405** - 'Invalid HTTP method request'  


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful#Useful-API)

---