<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/7/17
 * Time: 11:49 AM
 *
 * this class handles all the request to/ from the database
 * select. insert, update delete
 */
namespace App\Core;
use App\Config\Config;
use PDO;
use PDOException;
class Database{
    private static $_instance; // create database instance
    private $_pdo,$_query,
        $_error = false,$_results, $_count;
    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.Config::HOST.';dbname='.Config::DBName,
                Config::User,Config::Password);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public static  function getInstance(){
        //to avoid multiple db instances
       if (!isset(self::$_instance)){
           self::$_instance = new Database();
       }
       return self::$_instance;
    }
    /*
     * @query(); bind the sql query with the params
     *
     */
    public function query($sql, $value= array()){
        // sql = 'SELECT FROM table WHERE student_id = ? AND part = ?
        // param = [2, 4];
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)){
            $xx =1 ;
            if (count($value)){
                foreach ($value as $key=>$param){
                    $this->_query->bindValue(":$key",$param);
                    $xx++;
                }
            }
            if ($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count= $this->_query->rowCount();
            }else{
                $this->_error = true;
            }
        }
        return $this;
    }
    /*
     * action (); construct the sql, and pass it to query
     * param = action , table and conition
     */
    public function action($action, $table, $where = []){
        $sql = "{$action}  FROM {$table} WHERE ";
        $xx= 1;
        foreach ($where as $key=>$value){
            $sql.= "$key = :$key ";
            if ($xx < count($where)){
                $sql.= "AND ";
            }
            $xx++;
        }
        if (!$this->query($sql,$where)->error()){
            return $this;
        }
        return false;
    }
    /*
     * insert(); insert into the table specified,
     * bind the fields with value using the array key value pair
     * $table= name of table to insert into
     * field = column as key and value as value;
     * e.g ['first_name'=>'Akeeb', 'last_name'=>'Ismail'];
     */
    public function insert($table, $field = array()){
        $keys= array_keys($field);
        $values = null;
        $xx= 1;
        foreach ($field as $key=>$item) {
            $values .= ":$key";
            if ($xx < count($field)) {
                $values .= ", ";
            }
            $xx++;
        }
        $sql = "INSERT INTO {$table} (`".implode('`, `',$keys). "`) VALUES ({$values})";
        if (!$this->query($sql,$field)->error()){
            return true;
        }
        return false;
    }
    /*
     * update ();
     * $table, $id ,fields ;
     * same as insert() but action is different
     *
     */
    public function update($table,$field,$where){
        $set = '';
        $name= null;
        $xx=1;
        foreach ($field as $key=>$item) {
            $set.="{$key} = :$key";
            if ($xx <count($field)){
                $set.=", ";
            }
            $xx++;
        }
        $xx= 1;
        foreach ($where as $key=>$value){
            $name.= "$key = '$value'";
            if ($xx <count($where)){
                $name.=" AND ";
            }
            $xx++;
        }
        $sql = "UPDATE {$table} SET {$set} WHERE {$name}";
        if (!$this->query($sql,$field)->error()){
            return true;
        }
        return false;
    }
    public function get($table){
        $this->_error= false;
        $sql = "SELECT * FROM {$table}";
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute()){
            $this->_results= $this->_query->fetchAll(PDO::FETCH_ASSOC);
            $this->_count= $this->_query->rowCount();
        }else{
            $this->_error = true;
        }
        return $this;
    }
    /*
     * handling the actions as per request
     */
    public function others($sql){
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute()){
            $this->_results= $this->_query->fetchAll(PDO::FETCH_ASSOC);
            $this->_count= $this->_query->rowCount();
        }else{
            $this->_error = true;
        }
        return $this;
    }
    public function selectOne($one,$table,$where){
        return $this->action('SELECT '.$one,$table,$where);
    }
    public function delete($table,$where = []){
        return $this->action('DELETE ',$table,$where);
    }
    public function select($table,$where= []){
        return $this->action('SELECT * ',$table,$where );
    }
    //the return methods for the private properties
    public function results(){
        return $this->_results;
    }
    public function first(){
        $data = $this->results();
        return $data[0];
    }
    public function count(){
        return $this->_count;
    }
    public  function error(){
        return $this->_error;
    }
}