# Resource API

#### API INFO
* What is our Resource API

#### ENDPOINTS
* Get All Resources
* Get Resource by Resource ID
* Get Resource by Category ID
* Get Resource by User ID
* Post new Resource

---

## Get All Resources

**Not Yet Implemented**

---

## Get Resource by Resource ID

This API returns a specific resource by it's individual resource ID.

**Endpoint:**   
`TODO Add Endpoint link`

**HTTP Method:** GET  

**Required Input:** `resourceId: $resourceId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

---

## Get Resources by Category Id

This API returns a set of resources under a single category.

**Endpoint:**   
`//TODO Add Endpoint link`

**HTTP Method:** GET  

**Required Input:** `resourceCategoryId: $categoryId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

---

## Get Resources by User Id

This API returns a set of resources that were posted by an individual user.

**Endpoint:**   
`//TODO Add Endpoint link`

**HTTP Method:** GET  

**Required Input:** `resourceUserId: $userId`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

---

## Post A New Resource

This API endpoint allows a user to post a new resource

**Endpoint:**   
`//TODO Add Endpoint link`

**HTTP Method:** POST  

**Required Input:**  
 XSRF Token  
 JWT Token  
`resourceCategoryId: $categoryId,`   
`resourceDescription: $resourceDescription, must be under 300 characters`  
`resourceTitle: $resourceTitle, must be under`   
`resourceUrl: $resourceUrl, must be under 255 characters`  

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  
* **Code: 401** - 'You must be signed in to post a resource, please sign in to continue.'

---