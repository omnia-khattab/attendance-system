<?php 

session_start();
session_destroy();
header('Location: ../admin-view/login.php ');


?>