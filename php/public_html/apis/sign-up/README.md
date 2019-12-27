# Sign-Up API

#### API INFO
Our Sign-Up API provides endpoints that handle account sign-up so that users can securely to interact with our webapp.

#### ENDPOINTS
* [Sign-Up](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-up#Sign-Up)

[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#API-Documentation)

---

## Sign-Up  

This API registers a user account with our webapp

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/sign-up/`

**HTTP Method:** POST 

**Required Input:**    
XSRF Token  
`userEmail: $userEmail,`  
`userPassword: $userPassword,` //must be greater and 8 characters  
`userPasswordConfirm: $userPasswordConfirm,` //must match password  
`userName: $userName,` //This is the user's real name  
`userUsername: $userUsername` //This is the user's Username / Login Name       

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 405** - 'No email entered.'
* **Code: 405** - 'A valid password is required.'
* **Code: 405** - 'Please confirm your password.'
* **Code: 405** - 'No name entered.'
* **Code: 405** - 'No username entered.'
* **Code: 405** - 'Passwords entered do not match!'
* **Code: 405** - 'Invalid HTTP method request'  


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-up#Sign-Up-API)

---