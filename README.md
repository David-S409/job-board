# Project: Cloud Jobs

This project was bootstrapped with [Create React App](https://github.com/facebook/create-react-app).

# Available API Endpoints:

## Create User: /api/create_user.php
-Requirements:
 "fName" : ,
 "lName" : ,
 "email" : ,
 "password" : ,
 "phone": ,
 "isEmployer": 

## Login: /api/login.php
-Requirements:
 “email" : ,
 "password" : 

## Add Employer Info: /api/employerInfo.php
-Requirements:
   "userId": ,
    "companyName": ,
    "companyPhone": ,
    "companyEmail": ,
    "hiringRoleId": ,
    "streetAddress": ,
    "state": ,
    "zipCode": 

## Add Employee Info: /api/employeeInfo.php
-Requirements:
"jwt”: ,
 "eduLevel": 

## Post Job: /api/postJob.php:
-Requirements:
"jwt”: ,
"desc": ,
"title": ,
"qualifications": ,
"responsibilities": ,
"education": ,
"type": ,
"experience": ,
"salary": ,
"benefits": ,
"endDate": 

## Get Jobs Postings: /api/getPosts.php/all, /api/getPosts.php/user?type=[applied, saved], /api/getPosts.php/employer
-Requirements: 
 "jwt”: ,

## Update Post Status: /api/update.php
-Requirements:
 "jwt”: ,
    "status": ,
    "postId": ,
    "employeeId":

## Apply to Post: /api/apply.php
-Requirements:
 "jwt”: ,
    "postID": 



## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in your browser.

The page will reload when you make changes.\
You may also see any lint errors in the console.

