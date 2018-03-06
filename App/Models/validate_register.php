<?php
/**
 * Created by PhpStorm.
 * User: Mogbeyi David
 * Date: 16/05/2017
 * Time: 17:38
 */
include 'Database.php';


class ValidateRegister extends Database{
    public $matric_number;
    public $password;
    public $confirm_password;
    public $gender;

    public function setMatricNumber($matric_number){
        $this->matric_number = $matric_number;
    }

    public function getMatricNumber(){
        return $this->matric_number;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setConfirmPassword($confirm_password){
        $this->confirm_password = $confirm_password;
    }

    public function getConfirmPassword(){
        return $this->confirm_password;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getGender(){
        return $this->gender;
    }

    public function checkMatricNumber($matric_number){
        $status = True;
        $message = "Matric Number OK";
        if(!preg_match("/\w\w\w\/\d\d\d\d\/\d\d\d/" , $matric_number)){
            $message = "Invalid Matric Number Entered";
            $status =  False;
        }else{
            $matric_number = explode("/", $matric_number);
            $department = $matric_number[0];
            $year = $matric_number[1];
            $number = $matric_number[2];
            $department = strtolower($department);
            if(is_numeric($department) or ( strlen($department)>3 and $department != 'fncs' )or strlen($department)<3 ){
                $message = "Invalid Matric Number Entered";
                $status =  False;
            }
            if(!preg_match('/20\d\d/' , $year) ){
                $message = "Invalid Matric Number";
                $status =  False;
            }
            if( !preg_match('/\d\d\d/' , $number)){
                $message = "Invalid Matric Number";
                $status =  False;
            }
        }

        return array($status ,  $message);
    }

    public function confirmPassword($password , $confirm_password){
        $status = True;
        $message = 'Passwords OK';
        if($password != $confirm_password){
            $status = False;
            $message = "Passwords Do Not Match!";
        }
        return array($status , $message);
    }
}


if(isset($_POST['register'])){
    $validateRegister = new ValidateRegister();
    $validateRegister->setMatricNumber($_POST['matric_number']);
    $validateRegister->setPassword($_POST['password']);
    $validateRegister->setGender($_POST['gender']);
    $validateRegister->setConfirmPassword($_POST['confirm_password']);
    $matric_number = $validateRegister->getMatricNumber();
    $password = $validateRegister->getPassword();
    $confirm_password = $validateRegister->getConfirmPassword();
    $gender = $validateRegister->getGender();

    $confirm_password = $validateRegister->confirmPassword($password , $confirm_password);
    $check_matric_number = $validateRegister->checkMatricNumber($matric_number);
    if($confirm_password[0] == 1 and $check_matric_number[0] ==1){
        header("location:profile.php");
    }else{
        print $check_matric_number[1];
        print "<br>";print"<br>";
        print $confirm_password[1];
    }
}
?>