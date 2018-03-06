<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 5/7/17
 * Time: 7:06 AM
 */
namespace App\Core;
class Validation{
    private $_errors= [];
    private $_passed = false;
    public function __construct(){
        $this->_db=Database::getInstance();
    }
    public function checkMatricNumber($matric_number){
        if(!preg_match("/\w\w\w\/\d\d\d\d\/\d\d\d/" , $matric_number)){
            $this->addError('mat','Invalid Matric Number entered');
            return false;
        }else{
            $matric_number= explode("/", $matric_number);
            $department = $matric_number[0];
            $year = $matric_number[1];
            $number = $matric_number[2];
            $department = strtolower($department);
            if(is_numeric($department) or ( strlen($department)>3 and $department != 'fncs' )or strlen($department)<3 ){
                $this->addError('mat',"Invalid Matric Number depart");
                return false;
            }
            if(!preg_match('/20\d\d/' , $year) ){
                $this->addError('mat',"Invalid Matric Number year");
                return false;
            }
            if( !preg_match('/\d\d\d/' , $number)){
                $this->addError('mat',"Invalid Matric Number number");
                return false;
            }
        }

        return true;
    }
    public function check($source,$items){
        foreach ($items as $item=>$rules){
            foreach ($rules as $rule=>$rule_value){
                $value= $source[$item];
                if ($rule === 'required' && empty($value)){
                    $this->addError($item,"{$rules['name']} is required ");
                }elseif (!empty($value)){
                    if (($rule ==='num' && !ctype_digit($value))){
                        $this->addError($item,"{$rules['name']} must be a number");
                    }
                    if ($rule ==='alpha' && (!ctype_alpha($value) || !preg_match("/^[a-zA-Z ]*$/",$value))){
                        $this->addError($item,"{$rules['name']} must be alphabet only");
                    }
                    switch ($rule){
                        case 'min':
                            if (strlen($value) < $rule_value){
                                $this->addError($item,"{$rules['name']} must be minimum of {$rule_value}");
                            }
                            break;
                        case 'max':
                            if (strlen($value)> $rule_value){
                                $this->addError($item,"{$rules['name']} is too long");
                            }
                            break;
                        case 'matches':
                            if ($value !=$source[$rule_value]){
                                $this->addError($item, "{$rules['name']} do not  match {$rule_value}");
                            }
                            break;
                        case 'number':
                            if (!ctype_digit($value)){
                                $this->addError($item,"{$rules['name']} must be a number");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->select($rule_value,array($item=>$value));
                            if ($check->count()){
                                $this->addError($item,"{$rules['name']} already exists.");
                            }
                            break;
                    }
                }
            }
        }
        if (empty($this->_errors)){
            $this->_passed= true;
        }
    }
    private function addError($item,$error){
        return $this->_errors[$item] = $error;
    }
    public function passed(){
        return $this->_passed;
    }
    public function errors(){
        return $this->_errors;
    }
    public function setError($key,$value){
        $this->_errors[$key]= $value;
    }
    public function getError($key){
        return $this->_errors[$key];
    }
    public function register($table,$data){
        if (!$this->_db->insert($table,$data)){
            throw new \Exception("Unable to register student ");
        }
    }
}