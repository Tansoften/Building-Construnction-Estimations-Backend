# API Documentation

# Auth

**Registration**
- URI:address/api/register
- HTTP METHOD: POST
- BODY SAMPLE: {
    "first_name": "Peter",
    "last_name" : "John",
    "gender" : "M",
    "phone" : "0762167110",
    "email": myemail@gmail.com,
    "password": "123456",
}
**Login**
- URI:address/api/login
- HTTP METHOD: POST
- BODY SAMPLE: {
    "email": "myemail@gmail.com",
    "password": "123456",
}

**Update**
- URI:address/api/user/update
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "first_name": "Peter",
    "last_name" : "John",
    "gender" : "M",
    "phone" : "0762167110",
    "email": myemail@gmail.com,
}
**Change password**
- URI:address/api/user/changepassword
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "password": "123456",
    "new_password": "1234567",
    "old_password": "1234567"
}

# Building

**List All Buildings**
- URI:address/api/building
- HTTP METHOD: GET


**Create New Buildng**
- URI:address/api/building/new
- HTTP METHOD: POST
- BODY SAMPLE: {
    "width": 5,
    "length": 4,
    "height": 5
}


**View Specific Building**
- URI:address/api/building/view/1
- HTTP METHOD: GET


**Update Building**
- URI:address/api/building/update/1
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "width": 5,
    "length": 5,
    "height": 4
}


# Doors of a specific building

**List all Doors**
- URI:address/api/api/doors/building/2
- HTTP METHOD: GET


**New Door(s)**
- URI:address/api/api/doors/building/2/new
- HTTP METHOD: POST
- BODY SAMPLE: {
    "width": 500,
    "length": 200,
    "count": 4
}


**View Specific Door**
- URI:address/api/api/doors/view/2
- HTTP METHOD: GET


**Update Door**
- URI:address/api/api/doors/update/3
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "width": 500,
    "length": 200,
    "count": 4
}


 # Windows of Specific building

 **List All**
 - URI:address/api/api/windows/building/2
- HTTP METHOD: GET

**New Window(s)**
- URI:address/api/api/window/building/2/new
- HTTP METHOD: POST
- BODY SAMPLE: {
    "width": 500,
    "length": 200,
    "count": 4
}


**View Specific Window**
- URI:address/api/api/window/view/2
- HTTP METHOD: GET

**Update Window**
- URI:address/api/api/window/update/3
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "width": 5,
    "length": 2,
    "count": 4
}

# Construction Material Estimations

**View Estimations**
- URI:address/api/api/estimation/building/2
- HTTP METHOD: GET

