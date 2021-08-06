<?php session_start() ?>

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
<!--=============================Register FORM==========================================-->
<div class="cont">
    <div class="form">
        <form action="../controller/addAdminHandel.php" method="POST">

                <?php if(isset($_SESSION['errors'])){ ?>
                    <div class="alert alert-danger">
                        <?php foreach($_SESSION['errors'] as $error){?> 
                            <p><?php echo $error ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']) ?>
                

        <div class="mb-3">
            <label for="exampleInputtext" class="form-label" >Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputtext">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password should contain numbers,chars and more than 6 char
            </div>
        </div>
        <!--<div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>-->
                
        <button type="submit" class="btn btn-primary" name="btn_submit">Register</button>
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
 unset($_SESSION['admin_email']);
?>
