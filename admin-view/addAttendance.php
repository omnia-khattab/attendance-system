<?php

session_start();
require_once ('../Database/connection.php');

    //initialize connection
    $con=new Connection();
    $link=$con->connect();

//check if the admin already loggin
if(isset($_SESSION['admin_email'])){

/****************SELECT All employees************ */
$query="SELECT * FROM employees;";
$emp = mysqli_query($link,$query);

$employees=[];
if(mysqli_num_rows($emp)>0)
    {
    while($row = $emp->fetch_assoc() )
    {
    array_push($employees, $row);
    }
}
/****************SELECT All Status************ */
$query2="SELECT * FROM statuses;";
$statu=mysqli_query($link,$query2);
$status=[];
if(mysqli_num_rows($statu)>0)
    {
    while($row = $statu->fetch_assoc() )
    {
    array_push($status, $row);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet"> 
    <!-- ICONS -->
    
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Style-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="employeeDetail.php">Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addAttendance.php">Attendence</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addStatus.php">Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report.php">status report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--=============================Attendance FORM==========================================-->
<div class="cont">
    <div class="form">
        <form action="../controller/addAttendHandel.php" method="POST">

                <?php if(isset($_SESSION['errors'])){ ?>
                    <div class="alert alert-danger">
                        <?php foreach($_SESSION['errors'] as $error){?> 
                            <p><?php echo $error ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']) ?>
                

        
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Employees</label>
            <select class="form-select" name="emp_id" id="inputGroupSelect01">
                <option selected disabled="disabled">Choose...</option>
                <?php if($employees !==[]){
                    foreach($employees as $employee){ 
                 ?>
                <option value="<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></option>

                <?php } }?>
            </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Status</label>
            <select class="form-select" name="status_id" id="inputGroupSelect01">
                <option selected disabled="disabled">Choose...</option>
                <?php if($status !==[]){
                    foreach($status as $statu){ 
                 ?>
                <option value="<?php echo $statu['id'] ?>"><?php echo $statu['status'] ?></option>

                <?php } }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Day</label>
            <input type="date" class="form-control" name="day">
        </div>
    
        <div class="mb-3">
            <label for="exampleInputtext" class="form-label" >Working Hours</label>
            <input type="number" class="form-control" name="working_hours"">
        </div>
                
        <button type="submit" class="btn btn-primary" name="btn_submit">Add Attendance</button>
        </form>
    </div>
</div>



    
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js//popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>

<?php 
}
else{
    header('location:login.php');
    }
?>