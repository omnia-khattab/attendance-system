<?php 

session_start();

require_once('../Database/connection.php');
//initialize connection
$con=new Connection();
$link=$con->connect();
//get the id from URL
$id=$_GET['id'];

$query="DELETE FROM employees WHERE id=$id";
$result=$link->query($query);
if($result==true){
    header('location:../admin-view/index.php');
}
else{
    var_dump($result);
}
?>