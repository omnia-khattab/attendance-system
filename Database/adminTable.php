<?php 

require_once 'connection.php';

class Admin extends Connection { 
    //Create Admin Table
    public function create($link){
        $query="CREATE TABLE admins(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
            )";
        
        if(mysqli_query($link, $query)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }

    /*public function login($email,$password){
        $query="SELECT * FROM admins
                WHERE email='$email' AND password='$password;";

            $result=$link->query($query);
            $admin=null;

            if(mysqli_num_rows($result)==1){
                while($row=$result->fetch_assoc()){        
                    $admin=$row;
                }
            }
        return $admin;
    }*/
    
    
}
//initialize connction and connect it to the DB
    $con=new Connection();
    $link=$con->connect();
//create the table
    $admin=new Admin();
    $admin->create($link);
?>