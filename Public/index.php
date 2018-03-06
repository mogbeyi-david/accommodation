<?php
/**
 * Created by PhpStorm.
 * User: Mogbeyi David
 * Date: 05/04/2017
 * Time: 11:02
 */
session_start();
define('ROOT',dirname(__DIR__).DIRECTORY_SEPARATOR);
define('APP',ROOT.'App'.DIRECTORY_SEPARATOR);
if(file_exists(ROOT.'vendor/autoload.php')){
    require ROOT.'vendor/autoload.php';
}
include APP.'Config/constant.php';
//include "test.php";
$app = new \App\Core\Application();
