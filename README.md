# content-api


This is an online content management system that allow signed up users to upload images in a web server remotely through an API

## About the software
This software is a restful API, That allow users to sign up and upload images to a server. Is only signed up users that can upload, edit and delete. then users who are not signed up can view and rate the uploaded images


### Prerequisites for testing the API
In order to run a comprehensive text of these API, the tester has to install POSTMAN
from here https://www.getpostman.com/apps
composer is used to text the various api urls

Postman is used to text the various api urls

1) Login: Verb:POST, URL:http://localhost:8000/api/login

2) Register: Verb:POST, URL:http://localhost:8000/api/register

3) List All Contents posted by an authenticated users: Verb:GET, URL:http://localhost:8000/api/contents passing the following headers
‘headers’ => [
‘Accept’ => ‘application/json’,
‘Authorization’ => ‘Bearer ‘.$accessToken,

]

4) Create: Verb:POST, URL:http://localhost:8000/api/contents passing the following header 
‘headers’ => [
‘Accept’ => ‘application/json’,
‘Authorization’ => ‘Bearer ‘.$accessToken,
 
 And the body parameters are as follows 
 name =>""
 description=>""
 file => 

]

5) Show: Verb:GET, URL:http://localhost:8000/api/contents/{id}

6) Update: Verb:PUT, URL:http://localhost:8000/api/contents/{id}

7) Delete: Verb:DELETE, URL:http://localhost:8000/api/contents/{id}

The Url for all users to view the whole contents
View All  Verb:GET, URL:http://localhost:8000/api/viewAllImages

```

```


