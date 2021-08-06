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
$email=$data['email'];
$password=$data['password'];

$query="SELECT * FROM admins
        WHERE email='$email' AND password='$password' ;";


$result=$link->query($query);

    if(mysqli_num_rows($result)==1)
    {
        
        while($row = $result->fetch_assoc() )
        {
            /*if($row['token']==NULL){
                $row['token']=random_bytes(64);
                $token=$row['token'];
                $emaill=$row['email'];
                $query2="INSERT INTO admins (token) VALUES ('$token') WHERE email=$emaill ;";
                $result=$link->query($query);
                echo json_encode($row);
            }*/
            echo json_encode($row);
            
        }
    }
?>