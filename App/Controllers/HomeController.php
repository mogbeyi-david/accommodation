<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/11/17
 * Time: 10:55 AM
 */
namespace App\Controllers;

use App\Models\Accomodation;

class HomeController{
    public function __construct()
    {
    }
    public function index(){
        $aco = new Accomodation('CSC/2012/021','female');
        $aco->accommodate('0023458GH','male');
        //var_dump($aco->_bed);
        var_dump($aco->_block);
        echo 'Hostel'.'&nbsp;'.$aco->_hostel['hostel'];
        echo '<br>Block   '.$aco->_block['block'];
        echo '<br> Room   '.$aco->_room['room'];
        echo '<br>Bed   '.$aco->_bed;

        //the bedspace id
        echo '<br>'.$aco->_bedspace['id'];

        //$aco->accommodate('CSC/2012/021','male');
    }
    public function find(){
        $acc = new Accomodation();
        echo '<pre>';
        print_r($acc->round());
        echo '</pre>';
        $item = $acc->round();
        foreach ($item as $value){
            if (!$acc->student($value['matric_number'])){
                $acc->accommodate($value['matric_number'],$value['gender']);
            }
        }
    }

}