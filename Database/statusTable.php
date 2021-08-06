<?php 

require_once 'connection.php';

class Status extends Connection { 
    //Create Status Table
    public function create($link){
        $query="CREATE TABLE statuses(
            id INT AUTO_INCREMENT PRIMARY KEY,
            
            status VARCHAR(100) NOT NULL,
            
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
    
    
}
//initialize connction and connect it to the DB
    $con=new Connection();
    $link=$con->connect();
//create the table
    $status=new Status();
    $status->create($link);
?>