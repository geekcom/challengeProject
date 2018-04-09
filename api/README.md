#API

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

**Authorization Bearer + token generated in auth route**

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

**HEADERS**

**Authorization Bearer + token generated in auth route**