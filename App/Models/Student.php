<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 5/16/17
 * Time: 6:08 PM
 */
namespace App\Models;

use App\Core\Model;
use App\Handlers\Hash;
use App\Handlers\Session;

class Student extends Model {
    public $_student;
    public function __construct($student= null){
        parent::__construct();
        if ($student !=null){
            $this->_student= $this->student($student);
        }
    }
    public function start(){
        $stu = $this->_dbase->select('students',['bedspace_id'=>0]);
        if ($stu->count()){
            foreach ($stu->results() as $name){
                array_push($this->_student, $name);
            }
        }
    }
    public function student($mat){
        $st = $this->_dbase->select('students',['matric_number'=>$mat]);
        if ($st->count()){
            return $st->first();
        }
        return [];
    }
    private function find($mat){
        $da = $this->_dbase->select('students',['matric_number'=>$mat]);
        if ($da->count()){
            $this->_student = $da->first();
            return true;
        }
        return false;
    }
    public function login($matric, $pass){
        if ($this->find($matric)){
            if (Hash::make($pass) === $this->_student['password']){
                Session::put('student',$this->_student['matric_number']);
                Session::put('id',$this->_student['id']);
                return true;
            }
        }
        return false;
    }
    public function round(){
        $student = $this->_dbase->select('students',['bedspace_id'=>0]);
        if ($student->count()){
            return $student->results();
        }
        return [];
    }
    public function allocationStatus(){
        $time = $this->_dbase->select('timer',['status'=>0]);
        if ($time->count()){
            if (date('Y-m-s H:i:s')>= $time->first()['end']){
                return false;
            }
        }
        return true;
    }
}