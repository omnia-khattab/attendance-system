<?php

session_start();
//check if the admin already loggin
if(isset($_SESSION['admin_email'])){


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
<!--=============================status FORM==========================================-->
<div class="cont">
    <div class="form">
        <form action="../controller/addStatusHandel.php" method="POST">

                <?php if(isset($_SESSION['errors'])){ ?>
                    <div class="alert alert-danger">
                        <?php foreach($_SESSION['errors'] as $error){?> 
                            <p><?php echo $error ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']) ?>
                

        <div class="mb-3">
            <label for="exampleInputtext" class="form-label" >Status</label>
            <input type="text" class="form-control" name="status" id="exampleInputtext">
        </div>
        
        <button type="submit" class="btn btn-primary" name="btn_submit">Add status</button>
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