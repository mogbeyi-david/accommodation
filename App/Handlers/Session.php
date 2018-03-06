<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 1/22/17
 * Time: 8:49 AM
 */
namespace App\Handlers;
class Session{
    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
    }
    public static function put($name,$value){
        return $_SESSION[$name]= $value;
    }
    public static function get($name){
        return $_SESSION[$name];
    }
    public static function delete($name){
        if (self::exists($name)){
            unset($_SESSION[$name]);
        }
        }
    public static function flash($name,$string='null'){
        if (self::exists($name)){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }else{
            self::put($name,$string);
        }
    }
    public static function auth($log){
        if (self::exists($log)){
            if (self::get($log) == false){
                self::delete($log);
                Redirect::to(URL.'login');
                exit;
            }
        }
    }
}