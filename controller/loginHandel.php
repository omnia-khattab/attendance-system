<?php 
session_start();
require_once ('../validation/validator.php');
require_once ('../Database/connection.php');

//initialize the connection
$con=new Connection();
$link=$con->connect();

if(isset($_POST['btn_submit'])){
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $password=mysqli_real_escape_string($link,$_POST['password']);
//Validation
    $val=new validator();
    $val->rules('email',$email,['required','email']);
    $val->rules('password',$password,['required','password']);


    if(empty($errors)){
        $query="SELECT id FROM admins 
        where email='$email' AND password='$password';";

        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      $count = mysqli_num_rows($result);
      // If result matched $email and $password, table row must be 1 row
      if($count == 1) {
         $_SESSION['admin_email'] = $email;
    
         header("location: ../index.php");
      }else {
        $_SESSION['errors'] = ["Your Login email or Password is invalid"];
        header('location:../admin-view/login.php');
      }
    }
}
else{
    header('location:../admin-view/login.php');
}
    
    


?>