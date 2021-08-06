<?php 

session_start();
require_once('../Database/connection.php');
require_once ('../validation/validator.php');

if(!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}
//initialize connection
$con=new Connection();
$link=$con->connect();

if(isset($_POST['btn_submit'])){
    $id=$_GET['id'];
    $name=mysqli_real_escape_string($link,$_POST['name']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
    $address=mysqli_real_escape_string($link,$_POST['address']);
    $city=mysqli_real_escape_string($link,$_POST['city']);
    $country=mysqli_real_escape_string($link,$_POST['country']);
    $hireDate=mysqli_real_escape_string($link,$_POST['hireDate']);

    //validation 
    $val=new validator();
    $val->rules('name',$name,['required','string','max']);
    $val->rules('email',$email,['required','email']);
    $val->rules('mobile',$mobile,['required'.'number']);
    $val->rules('address',$address,['required','max']);
    $val->rules('city',$city,['required','max']);
    $val->rules('country',$country,['required','max']);
    $val->rules('hireDate',$hireDate,['required']);
    $errors=$val->errors;

    if(empty($errors)){

        $query="UPDATE employees
        SET name='$name',email='$email',mobile_no='$mobile',address='$address',
            city='$city',country='$country',hire_date='$hireDate'
        WHERE id=$id ;";

//var_dump($query);
        $result=$link->query($query);
//var_dump($result);   
        if($result==true){
            header('location:../admin-view/index.php');
        }
    
    }
    else{
        $_SESSION['errors']=$errors;
        header('location: ../admin-view/editEmployee.php?id='.$id);
    }
}
else{
    $_SESSION['errors']=$errors;
    header('location: ../admin-view/editEmployee.php?id='.$id);
}
?>