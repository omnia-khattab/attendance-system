<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../Database/connection.php');
$conn=new Connection();
$link=$conn->connect();

$data=json_decode(file_get_contents("php://input"),true);

$emp_id=$data['id'];
$from=$data['from'];
$to=$data['to'];

//get the ideal employee
    $query="SELECT name FROM employees
        WHERE id IN(
        SELECT employee_id
        FROM attendance
        Group By employee_id
        HAVING 6<AVG(working_hours)<8;
        )";

$result=$link->query($query);
    if(mysqli_num_rows($result)>0)
    {
        while($row = $result->fetch_assoc() )
        {
            echo json_encode($row);
        }
    }
?>