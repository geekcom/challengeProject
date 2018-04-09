# API Laravel + WebAPP Laravel + Docker

### About
This is a generic REST API + WebApp for upload XML File and Auth user.

---
## How to install?
* Install git
* Clone the repository
* Download and install docker

##### API
* Uploading Application container  
    * **docker-compose up**
* Copying the configuration example file
    * **docker exec -it api cp .env.example .env**
* Install dependencies
    * **docker exec -it api composer install**
* Generate key
    * **docker exec -it api php artisan key:generate**
* Stop all containers
    * **docker stop $(docker ps -aq)**
* Start all containers
    * **docker-compose up**
* Make migrations
    * **docker exec -it api php artisan migrate**

##### WebAPP
* Copying the configuration example file
    * **docker exec -it app cp .env.example .env**
* Edit .env file with your **local IP Address** 
* Install dependencies
    * **docker exec -it app composer install**
* Generate key
    * **docker exec -it app php artisan key:generate**
* Information of new containers
    * **docker ps -a**
* Create a user for access WebApp in the API

#### Access WebApp

http://localhost:9000


#### Access API

* Use Postman and import 
    * **API.postman_collection.json**
    
#### TESTS API
* **docker exec -it api vendor/bin/phpunit**

---

## API Docs

### About
This is a generic REST API for upload XML File and Auth user.

---
## How to use?


## Authentication
#### Auth - User Authentication 
`POST`
```sh
http://localhost:8000/api/v1/auth
```

**BODY**

**email**   example@email.com

**password**    **********

---



## Users
#### Users - Create a new User 

`POST`
```sh
http://localhost:8000/api/v1/users
```

**HEADERS**

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********

#### Users - Show User data 

`GET`
```sh
http://localhost:8000/api/v1/users/{id}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

### Users - Update a User's data
`PUT`

```sh
http://localhost:8000/api/v1/users/{id}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**Content-Type**   application/json

**BODY**

**name**   exampleName

**email**   example@email.com

**password**    **********


### Users - Delete a User
`DELETE`

```sh
http://localhost:8000/api/v1/users/{id}
```

**HEADERS**

**Authorization Bearer + token generated in auth route**



## XML
#### XML - Process XML

`POST`
```sh
http://localhost:8000/api/v1/xml
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

**BODY**

**xml**   invoice.xml

#### XML - List all XML Data
`GET`

```sh
http://localhost:8000/api/v1/xml
```

**HEADERS**

**Authorization Bearer + token generated in auth route**

#### XML - Show unique XML Data
`GET`

```sh
http://localhost:8000/api/v1/xml/{id}
```
