# attendance-system
# APIs
 - get all employees [GET] >> http://localhost/AttendanceSystem/API/employeeAPI.php
 
 - add new employee [POST]>>http://localhost/AttendanceSystem/API/createEmployeeAPI.php
 
  you will need to enter jsonData like this in the body>>
  
	{
    "name": "",
    "email": "",
    "mobile_no": "",
    "hire_date": "",
    "address": "",
    "city": "",
    "country": ""
  }

- Edit employee [PUT]: http://localhost/AttendanceSystem/API/editEmployeeAPI.php

  {
    "id": "",
    "name": "",
    "email": "",
    "mobile_no": "",
    "hire_date": "",
    "address": "",
    "city": "",
    "country": ""
  }

- Delete employee [DELETE]: http://localhost/AttendanceSystem/API/deleteEmployeeAPI.php

  {
    "id":""
  }

- Login API [POST]:http://localhost/AttendanceSystem/API/loginAPI.php

  {
    "email":"admin@gmail.com",
    "password":"1234@admin"
  }
  
- report [POST]:http://localhost/AttendanceSystem/API/reportAPI.php  

{
    "id":"6",
    "from":"2021-08-01",
    "to":"2021-08-04"
}

- employee of the month [GET]:http://localhost/AttendanceSystem/API/empMonthAPI.php
