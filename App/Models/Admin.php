<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/24/17
 * Time: 10:24 AM
 */
namespace App\Models;

use App\Core\Model;
use App\Handlers\Hash;
use App\Handlers\Session;

class Admin extends Model{
    public $_admin;
    public function __construct($admin = null){
        parent::__construct();
        if ($admin != null){
             $this->admin($admin);
        }
    }
    private function admin($username){
        $ad = $this->_dbase->select('admin',['username'=>$username]);
        if ($ad->count()){
            $this->_admin=$ad->first();
            return true;
        }
    }
    public function login($username ,$password){
        if ($this->admin($username)){
            if (Hash::make($password) === $this->_admin['password']){
                Session::put('admin',$this->_admin['username']);
                Session::put('id',$this->_admin['id']);
                return true;
            }
        }
        return false;
    }
}