<?php 

session_start();
require_once('../Database/connection.php');
require_once ('../validation/validator.php');

//initialize connection
$con=new Connection();
$link=$con->connect();

if(isset($_POST['btn_submit'])){
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

        $query="INSERT INTO employees (name,email,mobile_no,address,city,country,hire_date)
        VALUES('$name','$email','$mobile','$address','$city','$country','$hireDate');";

        $result=$link->query($query);
        
        if($result==true){
            header('location:../admin-view/index.php');
        }
    
    }
    else{
        $_SESSION['errors']=$errors;
        header('location: ../admin-view/addEmployee.php');
    }
}
else{
    $_SESSION['errors']=$errors;
    header('location: ../admin-view/addEmployee.php');
}
?>