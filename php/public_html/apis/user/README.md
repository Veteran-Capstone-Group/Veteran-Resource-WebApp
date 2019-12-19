# User API

#### API INFO
//TODO add What is our User API

#### ENDPOINTS
* [Get User by Username]()
* [Get User by UserId]()
* [Get User by User Activation Token]()
* [Update User Information]()
* [Delete User]()



[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---

## Get User by Username

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/user/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token   
`userUsername: $userUsername`  

**Optional Input:** N/A 

**Expected Data:** 
  
 //TODO write expected data
 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category#Category-API)

---

## Get User by UserId

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/user/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token   
`userId: $userId`  

**Optional Input:** N/A 

**Expected Data:** 
  
 //TODO write expected data
 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category#Category-API)

---

## Get User by User Activation Token

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/user/`

**HTTP Method:** GET  

**Required Input:**  
XSRF Token   
`userActivationToken: $userActivationToken`  //after activation this becomes null

**Optional Input:** N/A 

**Expected Data:** 
  
 //TODO write expected data
 
**Errors:**   
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category#Category-API)

---

## Update User Info

This API allows the user to update their personal information in our database.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/user/`

**HTTP Method:** PUT    

**Required Input:**  
XSRF Token   
JWT Token  
`userId: $userId`      

**Optional Input:** N/A 

**Expected Data:** 
  
 //TODO write expected data
 
**Errors:**   
 
* **Code: 400** - 'Input Required'  
* **Code: 401** - 'You must be signed in to post a resource, please sign in to continue.'
* **Code: 403** - 'You must be logged in to post Resources.'  
* **Code: 404** - 'Profile does not exist'   
* **Code: 405** - 'Invalid HTTP method request'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category#Category-API)

---

## Delete User

This api allows the User to delete their account. The user must be logged in.   
**Warning:** This API will not ask for confirmation.

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/user/`

**HTTP Method:** DELETE  

**Required Input:**  
XSRF Token   
JWT Token  
`userId: $userId`          

**Optional Input:** N/A 

**Expected Data:** 
  
 //TODO write expected data
 
**Errors:**   
   
 * **Code: 401** - 'You better check yourself, before you wreck yourself. (not logged in)'
 * **Code: 404** - 'Profile does not exist'   
 * **Code: 405** - 'Invalid HTTP method request' 

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category#Category-API)

---
