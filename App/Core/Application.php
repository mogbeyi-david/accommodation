<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/7/17
 * Time: 11:17 AM
 * this class get the url and slit it
 * load the appropriate controller if available
 */
namespace App\Core;

use App\Controllers\HomeController;
use App\Controllers\StudentController;
use App\Handlers\Redirect;

class Application{
    /*
     * xample url = www.accomodation.com/login/index
     * _controller = LoginController
     * _action = index()
     * _param = $password, $matricNo
     */
    private $_controller ; //the controller url.//
    private $_action ; //the method to load the view
    private $_params =[]; // parameter if available
    public function __construct(){
        $this->splitURL();
        if (!$this->_controller){
            $home = new StudentController();
            $home->index();
        }elseif (file_exists(APP.'Controllers/'.ucfirst($this->_controller).'Controller.php')){
            $controller = "\\App\\Controllers\\".ucfirst($this->_controller).'Controller';
            $this->_controller= new $controller();
            $this->_controller= new $this->_controller();
            if (method_exists($this->_controller,$this->_action)){
                if (!empty($this->_params)){
                    call_user_func_array(array($this->_controller,$this->_action),$this->_params);
                }else{
                    $this->_controller->{$this->_action}();
                }
            }else{
                if (strlen($this->_action) == 0){
                    $this->_controller->index();
                }else{
                    Redirect::to(URL.'problem');
                }
            }
        }else{
            Redirect::to(URL.'problem/notfound');
        }
    }

    private function splitURL(){
        if (isset($_GET['url'])){
            $url = trim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode('/',$url);
            $this->_controller =isset($url[0])? $url[0]: null;
            $this->_action= isset($url[1])? $url[1]: null;
            unset($url[0],$url[1]);
            $this->_params= array_values($url);
        }
    }

}