# Resource API

#### API INFO
* What is our Resource API

#### ENDPOINTS
* [Get All Resources](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#get-all-resources)
* [Get Resource by Resource ID](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#get-resource-by-resource-id)
* [Get Resource by Category ID](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#get-resources-by-category-id)
* [Get Resource by User ID](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#get-resources-by-user-id)
* [Post new Resource](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#post-a-new-resource)

[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#API-Documentation)

---

## Get All Resources

Not Yet Implemented

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#Resource-API)

---

## Get Resource by Resource ID

This API returns a specific resource by it's individual resource ID.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/resource/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token  
`resourceId: $resourceId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#Resource-API)

---

## Get Resources by Category Id

This API returns a set of resources under a single category.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/resource/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token  
`resourceCategoryId: $categoryId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#Resource-API)

---

## Get Resources by User Id

This API returns a set of resources that were posted by an individual user.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/resource/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token  
`resourceUserId: $userId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#Resource-API)

---

## Post A New Resource

This API endpoint allows a user to post a new resource

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/resource/`

**HTTP Method:** POST  

**Required Input:**  
 XSRF Token  
 JWT Token  
`resourceCategoryId: $categoryId,`   
`resourceDescription: $resourceDescription, //must be under 300 characters`  
`resourceTitle: $resourceTitle, //must be under 64 characters`   
`resourceUrl: $resourceUrl, //must be under 255 characters`  

**Optional Input:**  

//TODO Write optional inputs

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  
* **Code: 401** - 'You must be signed in to post a resource, please sign in to continue.'
* **Code: 403** - 'you must be logged in to post Resources'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource#Resource-API)

---