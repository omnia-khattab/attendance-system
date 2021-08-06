<?php 
session_start();
require_once ('../validation/validator.php');
require_once ('../Database/connection.php');

//initialize the connection
    $con=new Connection();
    $link=$con->connect();
//
if(isset($_POST['btn_submit'])){
    $name=mysqli_real_escape_string($link,$_POST['name']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $password=mysqli_real_escape_string($link,$_POST['password']);

    $val=new validator();
    $val->rules('name',$name,['required','string','max']);
    $val->rules('email',$email,['required','email']);
    $val->rules('password',$password,['required','password']);

    $errors=$val->errors;

    if(empty($errors)){
        $query="INSERT INTO admins (name,email,password)
        VALUES ('$name','$email','$password');";
        
        $result=$link->query($query);
        
        if($result==true)
        {
            header('location:../admin-view/index.php');
        }
    }
    //if there is an error
    else{
        $_SESSION['errors']=$errors;
        
        header('location:../admin-view/register.php');
    }
    }
    else{
        $_SESSION['errors']=$errors;
        header('location:../admin-view/register.php');
    }
    
    


?>