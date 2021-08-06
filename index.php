<?php
session_start();
//check if the admin loggin
if(isset($_SESSION['admin_email'])){

    require_once ('Database/connection.php');
    //initialize connection
    $con=new Connection();
    $link=$con->connect();
    //get the ideal employee
    $query="SELECT name FROM employees
          WHERE id IN(
            SELECT employee_id
            FROM attendance
            Group By employee_id
            HAVING 6<AVG(working_hours)<8;
          )";
          /** not working! */
    /*$result=$link->query($query);
        $employees=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($employees, $row);
            }
        }*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Attendance</title>
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet"> 
    <!-- ICONS -->
    
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="admin-view/assets/css/bootstrap.min.css">
    <!--Style-->
    <link rel="stylesheet" href="admin-view/assets/css/style.css">
</head>
<body>
<!--=============================Admin Dashboard==========================================-->

<!-------------------------------------Navbar------------------------------------------------------>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin-view/employeeDetail.php">Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-view/addAttendance.php">Attendence</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-view/addStatus.php">Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-view/report.php">Status Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="controller/logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-------------------------------------Ideal Employee--------------------------------------------------------->
<div class="container">

</div>

    
<script src="admin-view/assets/js/jquery-3.4.1.min.js"></script>
<script src="admin-view/assets/js//popper.min.js"></script>
<script src="admin-view/assets/js/bootstrap.min.js"></script>
<script src="admin-view/assets/js/index.js"></script>
</body>
</html>

<?php 
}
else{
    header('location:admin-view/login.php');
    }
?>