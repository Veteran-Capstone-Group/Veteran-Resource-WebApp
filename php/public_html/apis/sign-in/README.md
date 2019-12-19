# Sign-In API

#### API INFO
//TODO write What is our Sign-In API

#### ENDPOINTS
* [Sign-In](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-in#Sign-In)

[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---

## Sign-In  

This API signs a user into their account so they can interact with our webapp

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/sign-in/`

**HTTP Method:** POST  

**Required Input:**    
XSRF Token   
`userUsername: $userUsername,`   
`userPassword: $userPassword`   

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 401** - 'Password or Username is incorrect.'
* **Code: 401** - 'Invalid Username'
* **Code: 401** - 'Please enter a password'
* **Code: 401** - 'Please provide your username'
* **Code: 405** - 'Invalid HTTP method request'  


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-in#Sign-In-API)

---