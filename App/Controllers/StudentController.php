<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 5/16/17
 * Time: 2:31 PM
 */
namespace App\Controllers;

use App\Core\Validation;
use App\Handlers\Hash;
use App\Handlers\Input;
use App\Handlers\Redirect;
use App\Handlers\Session;
use App\Handlers\Token;
use App\Models\Accomodation;
use App\Models\Inventories;
use App\Models\Student;

class StudentController{
    private $_profile;
    private $_model;
    private $_student;
    public function __construct(){
        if (Session::exists('student')){

            $this->_student = new Student(Session::get('student'));
            $this->_profile= $this->_student->_student;
        }

    }
    public function te(){
        $sta = new Inventories();
    }
    public function register(){
        $mError= $sError=$pError=$cPError='';
        if (Input::exists()){
            if (isset($_POST['token'])){
                $valid = new Validation();
                $valid->check($_POST,[
                    'matric_number'=>['name'=>'Matriculation Number','required'=>true,'unique'=>'students'],
                    'password'=>['name'=>'Password','required'=>true],
                    'cPassword'=>['name'=>'Confirm Password','required'=>true,'matches'=>'password']
                ]);
                if ($valid->checkMatricNumber(Input::get('matric_number'))){
                    if ($valid->passed()){
                        $valid->register('students',[
                            'matric_number'=>Input::get('matric_number'),
                            'password'=>Hash::make(Input::get('password')),
                            'gender'=>Input::get('sex'),
                            'bedspace_id'=>0
                        ]);
                        Session::put('student',Input::get('matric_number'));
                        Redirect::to(URL.'student');
                    }else{
                        $mError= $valid->getError('matric_number');
                        $sError= $valid->getError('sex');
                        $pError= $valid->getError('password');
                        $cPError= $valid->getError('cPassword');
                    }
                }else{
                    $mError= $valid->getError('mat');
                }

            }
        }
        //var_dump($this->_student->allocationStatus());

        require APP.'Views/bedspace/php/register.php';
    }
    public function accomodate(){
        if (Session::exists('student')){
            $accomodate = new Accomodation();
            if (!$accomodate->student($this->_profile['matric_number'])){
                $accomodate->accommodate($this->_profile['matric_number'],$this->_profile['gender']);
                Redirect::to(URL.'student/status');
            }else{
                require APP.'Views/bedspace/head.php';
                echo '<span class="alert alert-danger"> You are on FIRE young '.Session::get('student').'! ';
            }
        }else{
            Redirect::to(URL.'student/login');
        }
    }
    public function tes(){
        $ac = new Accomodation();
        $ac->accommodate('csc/2012/090','female');
    }
    public function login(){
        $matricError= $sexError='';
        if (Input::exists()){
            if (isset($_POST['token'])){
                $valid = new Validation();
                $valid->check($_POST,[
                   'matric'=>['name'=>'Matriculation Number','required'=>true],
                    'password'=>['name'=>'Password','required'=>true]
                ]);
                if ($valid->passed()){
                    $login = new Student();
                    if ($login->login(Input::get('matric'),Input::get('password'))){
                        Redirect::to(URL.'student');
                    }else{
                        echo 'username or password not coorect';
                    }
                }
            }
        }
        require APP.'Views/bedspace/head.php';
        require APP.'Views/bedspace/php/apply.php';
        require APP.'Views/bedspace/footer.php';
    }
    public function index(){
        if (Session::exists('student')){
            require APP.'Views/bedspace/head.php';
            require APP.'Views/bedspace/php/dashboard.php';
            require APP.'Views/bedspace/footer.php';
        }else{
            Redirect::to(URL.'student/login');
        }
    }
    public function profile(){
        require APP.'Views/bedspace/head.php';
        require APP.'Views/bedspace/php/profile.php';
        require APP.'Views/bedspace/footer.php';
    }
    public function printSlip(){
        $ac = new Accomodation();
         $ac->bedSpacesId(998);
        var_dump($ac->_bedspace);
    }
    public function status(){
        if (Session::exists('student')){
            require APP.'Views/bedspace/head.php';
            $bed = new Accomodation();
            if ($bed->bedSpacesId($this->_profile['bedspace_id'])){
               // echo $this->_profile['gender'];

                require APP.'Views/bedspace/php/status.php';
            }else{
                echo '
                <div class="row">
        <div class="col-sm-8" style="padding-left: 0; padding-right: 10px; margin-left: 10px">
            <h5 class="notice"><b>No bedspace allocated to you yet.</b> Please check back some other time</h5>

        </div>
    </div>
                ';
            }
        }else{
            Redirect::to(URL.'student/login');
        }
    }
    public function logout(){
        Session::delete('student');
        Redirect::to(URL.'student/login');
    }
}