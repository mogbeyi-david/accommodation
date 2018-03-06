<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/7/17
 * Time: 10:44 PM
 */
use App\Core\Database;
$db = Database::getInstance();
//$db->insert('apply',['name'=>'Ayodeji Samuel','part'=>3,'faculty'=>'Sciences']);
//$db->update('apply',['name'=>'Tolani Lawal','part'=>5],['faculty'=>'Agriculture','part'=>1]);
//$db->delete('apply',['faculty'=>'Technology']);

$db->selectOne('id','rooms',['id'=>1]);
var_dump($db->first());