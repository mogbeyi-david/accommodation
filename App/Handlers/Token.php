<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 1/22/17
 * Time: 8:54 AM
 */
namespace App\Handlers;
use  App\Handlers\Session;
use App\Config\Config;
class Token{
    public static function generate(){
        return Session::put(Config::tokenName,md5(uniqid()));
    }
    public static function check($token){
        $tokenName= Config::tokenName;
        if (Session::exists($tokenName) && $token ===Session::get($tokenName)){
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}