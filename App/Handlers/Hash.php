<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 1/22/17
 * Time: 8:37 AM
 */
namespace App\Handlers;
class Hash{
    public static function make($string,$salt='kibb'){
        return hash('sha256',$string.$salt);
    }
    public static function salt($length){
        return mcrypt_create_iv($length);
    }
    public static function unique(){
        return self::make(uniqid());
    }
}