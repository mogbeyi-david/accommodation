<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/24/17
 * Time: 10:08 AM
 */
namespace App\Core;
class Model{
    public $hall_student;
    public function __construct()
    {
        $this->_dbase= Database::getInstance();
    }

}