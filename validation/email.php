<?php 

require_once 'validationInterface.php';

class Email implements ValidatationInterface{

    public function  __construct($name,$value){
        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){

        if($this->value ===''|| !preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $this->value)){
            return $this->name." not valid Email";
        }

        return '';
    }
}

?>