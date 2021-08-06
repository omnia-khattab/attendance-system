<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../Database/connection.php');
$conn=new Connection();
$link=$conn->connect();

$data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];

$query="DELETE FROM employees
        WHERE id=".$id." ;";

        $result=$link->query($query);
        
        if($result==true){
            echo json_encode(array("message"=>"employee delete successfully","status"=>true));
        }
        else{
            echo json_encode(array("message"=>"Failed to delete employee","status"=>false));

        }
?>