# ABQ Veterans

This repository is for the construction of a Veteran's Resource application for the local Albuquerque area(and a toolkit to allow others to quickly deploy similar webapps for their local area), it shall included information on social services and employment to help ease veterans into civilian life and combat homelessness, drug addiction, and suicide rates among the Veteran population of the local Albuquerque area.

Authors: Timothy Beck & John Johnson-Rodgers  
[Visit our Live App](http://www.abqveterans.com)  

---
### Table of Contents

* [Application Description](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Application-Description)
* [Feature List](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Feature-List)
* [Upcoming Features and Changes](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Upcoming-Features-and-Changes)
* [Demo](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Demo)
* [Security Implementation](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Security-Implementations)
* [Code Coverage and Code Examples](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Code-Coverage-and-Code-Excerpts)
* [API Documentation](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#API-Documentation)
* [Datasets Documentation](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Free-Open-Dataset-Documentation)
* [Cloning and Deployment Instructions](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Cloning-and-Deploying-Instructions)
* [Links to resources for further development](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#Resources-for-Further-Development)
* [How to Contribute](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#How-to-contribute-to-this-Application)
* [About Us](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#About-Us)
---
 
![ABQ Veterans Logo](https://raw.githubusercontent.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/integration/app/src/shared/img/flagofcodewithlogo.png)

---
## Application Description

The ABQ Veterans team recognized a problem within our community of our veteran population having more than twice the rates of suicide and homelessness as the general population, despite resources being publicly available. We also recognize that there is no repository of social services provided to veterans who are trying to integrate back into society. 

As several of our family members are veterans, and we are very passionate towards the concept of serving those who’ve served us, we aim to improve our community by creating an application that combats these issues. ABQ Veteran’s is an application where users can submit social services and rank those services based on how helpful they are. Our goal is to create an expansive library of resources available to veterans who may need assistance and provide those resources to them packaged in this mobile-friendly and Free and Open Source Software. We also plan to provide developers with APIs and Open Datasets and to encourage them to use our data for free to better their communities.

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Feature List

* Find local social resources by predesignated categories
* Useful (similarly to 'Like') resources to rank them by most useful
* Sign up and log into your account
* Submit resources to our database, to benifit the community and help individuals get their needs met


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Upcoming Features and Changes

* Change Icons for categories to cleaner more professional icons
* Dynamically export our resource dataset, on a scheduled basis, as JSON and CSV file formats and provide them as free open data
* Secure our API and provide public documentation for others to access it
* Create a carousel for homepage displaying most useful'd resources in a better UI/UX format
* Add a moderator trait giving users the ability to be moderators that can change the approval status or resources
* Add search capabilities to filter through our dataset as it grows
* Add a user profile, logging and allowing users to quickly find resources they have useful'd or submitted

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Demo

//TODO add Demo

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Security Implementations

We've included security minded implementations at every level of our codebase, making sure not to stare any sensitive user data and to sanitize all user input at every level of our application in order to make sure that our user's data is secure at every point.

**Front-End security -**

We utilize sanitization in all fields on our front end to make certain that the information our users are giving us is expected, not malicious in intent, and meets the proper requirements for those fields.

**API security -**

We utilize sanitization in our APIs to make certain that the information we recieve from the front-end or end user and what we give to our back-end interface is not malicious in intent and is what we are excpecting our users to be giving us.

**Back-End security -**

We utilize sanitization and prepared statements with every user interaction in our PHP and MySQL calls to ascertain that the user can not give us data we are not expecting or inject data into our database by making sure that every data base call is made using exactly the information we expect to be using. We have also utilized argon2i hashing to securely utilize sensitive user data through one way encryption without having to store that data in our database, allowing user passwords to never actually be saved in our database. 

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---

## Code-Coverage and Code Excerpts

//TODO add code coverage and examples of some fun and interesting code we wrote

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## API Documentation

ABQ Veteran's utilizes REST APIs to communicate between our servers and externally with the end user. We have numerous end points for account management and web interactions that developers can utilize to interact with our web app and database.

 * [Account Activation API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/activation)
 * [Account Sign In API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-in)
 * [Account Sign Up API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/sign-up)
 * [Resource Category API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/category)
 * [Resource API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/resource)
 * [Useful API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/useful)
 * [User Account API](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/tree/master/php/public_html/apis/user)



[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Free Open Dataset Documentation

At a future release iteration we will be making our dataset public for download and free to use and will be providing it as datasets in JSON and CSV formats. 

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## Cloning and Deploying Instructions

//TODO create instructions and supporting documents for cloning our repo, application, and starting this project for another region.

[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## How to contribute to this Application

Until February, Pull requests won't be considered as we are participating in a contest with this application.  

1. Establish a point of contact with the primary developers of this project and discuss the changes you wish to make, either on github or through email or slack.

2. Ensure any install or build dependencies are removed before submitting a request. Likewise, remove any and all sensitive data, any merge containing commits with sensitive data will be declined.

3. Update the README.md with details of all changes to the interface.

4. Document your code, every couple of lines, to ensure we can read through what your code is doing at a reasonable speed without having to decipher every line.

5. After making your changes contact the primary developers for this project and discuss all the changes you've made, letting them know you are ready for a code review and merge.


[Click here to view our Contribution Guidelines](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/blob/master/contributing.md) [<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---

## Resources for Further Development

Tools, Libraries, and Frameworks:
* [npm](https://docs.npmjs.com/)
* [React](https://reactjs.org/docs/getting-started.html)
* [Bootstrap](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [React-Bootstrap](https://react-bootstrap.github.io/getting-started/introduction) 
* [Axios](https://www.npmjs.com/package/axios)
* [Redux](https://redux.js.org/introduction/getting-started)
* [React-Redux](https://react-redux.js.org/introduction/quick-start)
* [Composer](https://getcomposer.org/doc/)
* [PHPUnit](https://phpunit.readthedocs.io/en/8.5/)
* [ramsey/uuid](https://github.com/ramsey/uuid)

Languages:
* [Javascript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
* [PHP](https://www.php.net/docs.php)
* [MySQL](https://dev.mysql.com/doc/)


[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)

---
## About Us

Timothy Beck and John Johnson-Rodgers at the time of writing this are students at CNM Ingenuity's Deep Dive Coding bootcamp intensively studying Web Development. As developers we are creating this application as practice to improve our proficiency with a number of languages and frameworks to make ourselves more desirable developers in the programming industry. As members of this community, we are developing this resourceful application to make life easier for others and to improve the local community we are a part of and love.

### Timothy Beck
Email: Dev@TimothyBeck.com  
Website: https://www.timothybeck.com  
LinkedIn: https://www.linkedin.com/in/timothymbeck/  

### John Johnson-Rodgers
Email: John@JohnThe.dev  
Website: https://www.JohnThe.dev  
LinkedIn: https://www.linkedin.com/in/johnthe-dev/  

![Picture of Timothy Beck and John Johnson-Rodgers celebrating their graduation](https://raw.githubusercontent.com/Veteran-Capstone-Group/Veteran-Resource-WebApp/integration/documentation/IMG_18161.jpg)




[<p align="right">(Back to Top)</p>](https://github.com/Veteran-Capstone-Group/Veteran-Resource-WebApp#ABQ-Veterans)















