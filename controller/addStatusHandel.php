<?php

session_start();

require_once('../Database/connection.php');
require_once('../validation/validator.php');

//initialize connection
$conn=new Connection();
$link=$conn->connect();

if(isset($_POST['btn_submit'])){
    $status=mysqli_real_escape_string($link,$_POST['status']);

    $val=new validator();
    $val->rules('status',$status,['required','string','max']);

    //if there's error found add it to $error
    $errors=$val->errors;
    
    if(empty($errors)){

        $query="INSERT INTO statuses (status) VALUES ('$status');";
        $result=$link->query($query);
        if($result==true){
            echo "row inserted successfully";
        }
    }
    else{
        $_SESSION['errors']=$errors;
        header('location:../admin-view/addStatus.php');
    }
}
else{
    header('location:../admin-view/addStatus.php');
}
?>