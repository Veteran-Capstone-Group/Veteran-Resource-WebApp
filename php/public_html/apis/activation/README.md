# Activation API

#### API INFO
 
Our activation API utilizes the activation token emailed to the user after registering to activate their account for security purposes.
 
#### ENDPOINTS

* [Activate User Account]()

[<p align="right">(Back to Primary README)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#API-Documentation)

---

## Activate User Account

**Endpoint:**   
`https://abqveterans.com/Veteran-Capstone/php/public_html/apis/activation/`

**HTTP Method:** GET 

**Required Input:**  
`userActivationToken: $userActivationToken`

**Optional Input:** N/A 

**Expected Data:** 

//TODO Write expected data return

 
**Errors:**   
* **Code: 304** - 'Profile with this activation token does not exist.'
* **Code: 405** - 'Invalid HTTP method request'  
* **Code: 405** - 'Activation Token has incorrect length.'  
* **Code: 405** - 'Activation is empty or has non hexadecimal contents'  
* **Code: 400** - 'Input Required'  

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/activation#Activation-API)
