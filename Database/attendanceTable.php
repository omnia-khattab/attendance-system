<?php 

require_once 'connection.php';

class Attendance extends Connection { 
    //Create attendance Table
    public function create($link){
        $query="CREATE TABLE attendance(
            id INT AUTO_INCREMENT PRIMARY KEY,
            employee_id INT,
            status_id INT,
            FOREIGN KEY (employee_id) REFERENCES  employees(id) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (status_id)  REFERENCES  statuses(id) ON DELETE CASCADE ON UPDATE CASCADE,
            day DATE NOT NULL,

            working_hours DOUBLE NOT NULL,
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
    $attend=new Attendance();
    $attend->create($link);
?>