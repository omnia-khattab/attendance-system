<?php 
require_once 'connection.php';

class Employee extends Connection{

    //create Employee Table
        public function create($link){
            $query="CREATE TABLE employees(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                mobile_no VARCHAR(13) NOT NULL,
                hire_date DATE  NOT NULL,
                address VARCHAR(100) NOT NULL,
                city VARCHAR(100) NOT NULL,
                country VARCHAR(100) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            if(mysqli_query($link,$query)){
                echo "Table created successfully.";
            } else{
                echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
            }

            //Close Connection
            mysqli_close($link); 
        }
    }

    //initialize connction and connect it to the DB
    $con=new Connection();
    $link=$con->connect();

    //create the table
    $employee=new Employee();
    $employee->create($link);
?>


