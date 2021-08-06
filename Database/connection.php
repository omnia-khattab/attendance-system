<?php

class Connection{ 
    private $servername,$dbName,$dbPassword,$dbUsername;

    public function connect(){
        $this->servername='localhost';
        $this->dbUsername='root';
        $this->dbName='attendance_system';
        $this->dbPassword='';

        $con=new mysqli($this->servername, $this->dbUsername, $this->dbPassword, $this->dbName);
        // Check connection
        if($con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $con;
    }
}

?>