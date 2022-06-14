# API Documentation

# Building

**List All Buildings**
- URI:address/api/building
- HTTP METHOD: GET


**Create New Buildng**
- URI:address/api/building/new
- HTTP METHOD: POST
- BODY SAMPLE: {
    "width": 500,
    "length": 200,
    "height": 300
}


**View Specific Building**
- URI:address/api/building/view/1
- HTTP METHOD: GET


**Update Building**
- URI:address/api/building/update/1
- HTTP METHOD: PUT
- BODY SAMPLE: {
    "width": 500,
    "length": 200,
    "height": 300
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
    "width": 500,
    "length": 200,
    "count": 4
}



