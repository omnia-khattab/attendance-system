<?php 

require_once 'validationInterface.php';

class Password implements ValidatationInterface{

    public function  __construct($name,$value){
        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){

        if($this->value ===''|| !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$/", $this->value)){
            return $this->name." not valid , password should contain numbers,chars and more than 6 char";
        }

        return '';
    }
}

?>