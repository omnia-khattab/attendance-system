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
    $from=$_POST['from'];
    $to=$_POST['to'];

    $val=new validator();
    $val->rules('emp_id',$emp_id,['required']);
    $val->rules('from',$from,['required']);
    $val->rules('to',$to,['required']);

    $errros=$val->errors;

    var_dump($emp_id);
    if(empty($errors)){
        /** not Working!! */
        $query="SELECT e.name,a.status,a.day 
        FROM attendace a JOIN employees e
        ON e.id=a.employee_id
        WHERE a.employee_id=$emp_id
        And a.day BETWEEN ('$from' AND '$to');";

        $result=$link->query($query);
        var_dump($result);
        $status=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($status, $row);
            }
        }
        var_dump($status);
        /*if($result==true){
            header('location: ../admin-view/index.php');
        }*/
    }
    /*else{
        $_SESSION['errors']=$errors;
        header('location: ../admin-view/addAttendance.php');
    }*/
}
?>