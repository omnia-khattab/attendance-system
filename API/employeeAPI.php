<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../Database/connection.php');
$conn=new Connection();
$link=$conn->connect();

$query="SELECT * FROM employees;";

$result=$link->query($query);
    if(mysqli_num_rows($result)>0)
    {
        while($row = $result->fetch_assoc() )
        {
            echo json_encode($row);
        }
    }
?>