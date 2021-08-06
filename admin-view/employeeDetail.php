<?php
session_start();
if(isset($_SESSION['admin_email'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
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
<!-------------------------------------Table--------------------------------------------------------->
<?php 
    require_once ('../Database/connection.php');
    //initialize connection
    $con=new Connection();
    $link=$con->connect();
    $query="SELECT * FROM employees";
    $result=$link->query($query);
        $employees=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($employees, $row);
            }
        }
?>
<div class="mx-auto my-4" style="width: 200px;">
    <a href="addEmployee.php" class="btn btn-primary text-white">Add New Employee</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">hire date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php if($employees!==[]){
          foreach($employees as $employee){ ?>
                <tr>
                
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['mobile_no']; ?></td>
                <td><?php echo $employee['city']; ?></td>
                <td><?php echo $employee['hire_date']; ?></td>
                <td>
                <a href="editEmployee.php?id=<?php echo $employee['id']?>" class="btn btn-success text-white">Edit</a>
                <a href="../controller/deleteEmployee.php?id=<?php echo $employee['id']?>" class="btn btn-danger text-white">Delete</a>
                </td>
                </tr>
          <?php }}?>
  </tbody>
</table>

    
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