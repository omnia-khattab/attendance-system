<?php 
require_once 'required.php';
require_once 'email.php';
require_once 'number.php';
require_once 'password.php';
require_once 'string.php';
require_once 'max.php';
class validator{

    public $errors=[];

    public function checkValidation(ValidatationInterface $val){
        return $val->validate();
    }

    public function rules($name,$value,array $rules){

        foreach($rules as $rule){
            if($rule=='required'){
                $error=$this->checkValidation(new required($name,$value));
            }
            else if($rule=='email'){
                $error=$this->checkValidation(new Email($name,$value));
            }
            else if($rule=='password'){
                $error=$this->checkValidation(new Password($name,$value));
            }
            else if($rule=='string'){
                $error=$this->checkValidation(new IsString($name,$value));
            }
            
            else if($rule=='number'){
                $error=$this->checkValidation(new Number($name,$value));
            }
            else if($rule=='max'){
                $error=$this->checkValidation(new Max($name,$value));
            }
            else {
                $error='';
            }
            if($error !==''){
                array_push($this->errors,$error);
            }
        }

    }

}
?>