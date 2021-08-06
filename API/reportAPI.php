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

$emp_id=$data['id'];
$from=$data['from'];
$to=$data['to'];

$query="SELECT e.name,a.status,a.day 
        FROM attendace a JOIN employees e
        ON e.id=a.employee_id
        WHERE a.employee_id=$emp_id
        And a.day BETWEEN ('$from' AND '$to');";

$result=$link->query($query);
    if(mysqli_num_rows($result)>0)
    {
        while($row = $result->fetch_assoc() )
        {
            echo json_encode($row);
        }
    }
?>