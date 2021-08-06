<?php 
session_start();

require_once('../Database/connection.php');
require_once('../validation/validator.php');

//initialize connection
$conn=new Connection();
$link=$conn->connect();

if(isset($_POST['btn_submit'])){
    //Validation
    $emp_id=$_POST['emp_id'];
    $status_id=$_POST['status_id'];
    $day=$_POST['day'];
    $working_hours=$_POST['working_hours'];

    
    $val=new validator();
    $val->rules('emp_id',$emp_id,['required']);
    $val->rules('status_is',$status_id,['required']);
    $val->rules('day',$day,['required']);
    $val->rules('working_hours',$working_hours,['required','number']);

    $errros=$val->errors;

    if(empty($errors)){
        $query="INSERT INTO attendance (employee_id,status_id,day,working_hours)
                VALUES ('$emp_id','$status_id','$day',$working_hours);";

        $result=$link->query($query);
        if($result==true){
            header('location: ../admin-view/index.php');
        }
    }
    else{
        $_SESSION['errors']=$errors;
        header('location: ../admin-view/addAttendance.php');
    }

}

?>