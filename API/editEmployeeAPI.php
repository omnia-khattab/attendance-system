<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../Database/connection.php');
$conn=new Connection();
$link=$conn->connect();

$data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];
$name=$data['name'];
$email=$data['email'];
$mobile=$data['mobile_no'];
$hireDate=$data['hire_date'];
$address=$data['address'];
$city=$data['city'];
$country=$data['country'];

$query="UPDATE employees
        SET name='".$name."',email='".$email."',mobile_no='".$mobile."',address='".$address."',
            city='".$city."',country='".$country."',hire_date='".$hireDate."'
        WHERE id=".$id." ;";

        $result=$link->query($query);
        echo($result);
        if($result==true){
            echo json_encode(array("message"=>"employee updated successfully","status"=>true));
        }
        else{
            echo json_encode(array("message"=>"Failed to update employee","status"=>false));

        }
?>