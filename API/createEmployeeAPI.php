<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../Database/connection.php');
$conn=new Connection();
$link=$conn->connect();

$data=json_decode(file_get_contents("php://input"),true);

$name=$data['name'];
$email=$data['email'];
$mobile=$data['mobile_no'];
$hireDate=$data['hire_date'];
$address=$data['address'];
$city=$data['city'];
$country=$data['country'];

$query="INSERT INTO employees
         (name,email,mobile_no,address,city,country,hire_date)
        VALUES
        ('$name','$email','$mobile','$address','$city','$country','$hireDate')  ;";

        $result=$link->query($query);
        
        if($result==true){
            echo json_encode(array("message"=>"employee inserted successfully","status"=>true));
        }
        else{
            echo json_encode(array("message"=>"Failed to insert employee","status"=>false));

        }
?>