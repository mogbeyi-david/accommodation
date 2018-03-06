<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 5/16/17
 * Time: 11:34 PM
 */
namespace App\Controllers;

use App\Core\Validation;
use App\Handlers\Input;
use App\Handlers\Redirect;
use App\Handlers\Session;
use App\Handlers\Token;
use App\Models\Accomodation;
use App\Models\Admin;
use App\Models\Inventories;

class InventoryController{
    private $_user ;
    public $_invent;
    public function host(){
        $h = new Inventories();
        $hall = $h->hall();
        foreach ($hall as $item){
            echo $item['hostel'];
            echo $h->bedspace($item['id']).'&nbsp;';
            echo $h->bedSpaceFilled($item['id']).'<br>';
        }
    }
    public function __construct(){
        $user= new Admin;
        $this->_invent = new Inventories();
    }
    public function stime(){
        $time= $this->_invent->timer();
        echo date('Y-m-s H:i:s');
        if (date('Y-m-s H:i:s') >= $time['end']){
            echo 'starrt';
        }
    }
    public function la(){
      $host = $this->_invent->hall();
      $block = $this->_invent->getBLock(1);
      //var_dump($block);
        $re = $this->_invent->getRoom(1,1);
        //var_dump($re);
        foreach ($re as $it){
            //echo $it['room_id'];
        }
      foreach ($block as $name){
          //echo $name['block_id'];
          $room = $this->_invent->getRoom(1,$name['block_id']);
          foreach ($room  as $item) {
              echo $item['room_id'];
          }
      }

    }
    public function index(){
        require APP.'Views/admin-view/index.php';
    }
    public function invent($name= null,$block = null){
        $hostel_block = $this->_invent->getBLock($name);
        $block_room = $this->_invent->getRoom($name,$block);
        require APP.'Views/admin-view/inventory.php';
    }
    public function manage_hostel(){

        require APP.'Views/admin-view/manage-hostel.php';
    }
    public function reservation(){
        if (Input::exists()){
           if (isset($_POST['token'])){
               $valid = new Validation();
               $valid->check($_POST,[
                   'res-cat'=>['name'=>'Reservation Category','required'=>true],
                   'hostel'=>['name'=>'Hostel ', 'required'=>true],
                   'block'=>['name'=>'Block','required'=>true],
                   'room'=>['name'=>'Room','required'=>true],
                   'bedspace'=>['name'=>'Bed Space','required'=>true]
               ]);
               if ($valid->passed()){
                   try{
                       $this->_invent->reservation(Input::get('hostel'),
                           Input::get('block'),Input::get('room'),Input::get('bedspace'));
                       $this->_invent->save('reservation',[
                           'name'=>Input::get('res-cat'),
                           'bedspace_id'=>Input::get('bedspace'),
                           'room_id'=>Input::get('room'),
                           'block_id'=>Input::get('block'),
                           'hostel_id'=>Input::get('hostel')
                       ]);
                       echo 'reserve successfully';
                   }catch (\Exception $e){
                       die($e->getMessage());
                   }
               }else{
                   echo 'no passed';
               }
           }
        }
        $hostel = $this->_invent->hall();
        echo 'jskllsd';
        require APP.'Views/admin-view/reservation.php';
    }
    public function timer()
    {
        if (Input::exists()) {
            if (isset($_POST['token_end']) || $_POST['token_end'] == 'set_time') {
                $valid = new Validation();
                $valid->check($_POST, [
                    'sday' => ['name' => 'start day', 'required' => true], 'smonth' => ['name' => 'start month', 'required' => true],
                    'syear' => ['name' => 'start year', 'required' => true], 'shour' => ['name' => 'start hour', 'required' => true],
                    'smin' => ['name' => 'start minutes', 'required' => true], 'ssecond' => ['name' => 'start second', 'required' => true],
                    'eday' => ['name' => 'end day', 'required' => true], 'emonth' => ['name' => 'end month', 'required' => true],
                    'eyear' => ['name' => 'end year', 'required' => true], 'ehour' => ['name' => 'end hour', 'required' => true],
                    'emin' => ['name' => 'end minute', 'required' => true], 'esecond' => ['name' => 'end second', 'required' => true]
                ]);
                if ($valid->passed()) {
                    $state = $this->sm(Input::get('sday'),
                        Input::get('smonth'), Input::get('syear'), Input::get('shour'), Input::get('smin'),
                        Input::get('ssecond'));
                    $end = $this->sm(Input::get('eday'),
                        Input::get('emonth'), Input::get('eyear'), Input::get('ehour'), Input::get('emin'),
                        Input::get('esecond'));
                    $valid->_db->insert('timer',[
                        'start'=>$state,'end'=>$end ,'status'=>0
                    ]);
                    echo $state.'<br>';
                    echo $end;
                }
            }
        }


        require APP . 'Views/admin-view/timer.php';
    }
    private  function sm($d, $m, $y, $h, $mi, $s)
    {
        $j = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $mi . ':' . $s;
        return $j;
    }
    public function get(){
        $id = Input::get('id');
        if (Input::get('d') == 'block'){
            $block = $this->_invent->getBLock($id);
            if (count($block)>0){
                echo '<select name="block" class="form-control" id="block"> onchange="getRoom()"';
                foreach ($block as $name){
                    $block= $this->_invent->getBlockDetails($name['block_id']);
                    echo '<option value="'.$block['id'].'">Block '.$block['block'].'</option>';
                }
                echo '</select>';
            }
        }elseif(Input::get('d') == 'room'){
            $hostel = Input::get('hostel');
            $room = $this->_invent->getRoom($hostel,$id);
            if (count($room)>0){
                echo '<select name="room" class="form-control" id="room"> onchange="getBed()';
                foreach ($room as $value){
                    $room = $this->_invent->getRoomDetails($value['room_id']);
                    echo '<option value="'.$room['id'].'">Room '.$room['room'].'</option>';
                }
                echo '</select>';
            }
        }
    }
    public function getBedInRoom(){
         $hostel = Input::get('hostel').'<br>';
        $block = Input::get('block').'block <br>';
         $room = Input::get('room').'<br>';
        $bed = $this->_invent->bedSpaceInRoom($hostel,$block,$room);
        if (count($bed)>0){
            echo '<select name="bedspace" class="form-control" id="bed">';
            foreach ($bed as $value){
                $bd = $this->_invent->getBedDetails($value['bed_id']);
                echo '<option value="'.$bd['id'].'">Bed '.$bd['bed'].'</option>';
            }
            echo '</select>';
        }else{
            echo $hostel;
            echo $block;echo $room;
        }
    }
    public function start(){
        $acc= new Accomodation();
        $student= $acc->round();
        foreach ($student as $item){
            if (!$acc->student($item['matric_number'])){
                $acc->accommodate($item['matric_number'],$item['gender']);
            }
        }
        return $acc->status(0);
    }
    public function jax($id){
        if ($this->start()){
            try{
                $acc= new Accomodation();
                $acc->endAllocation($id);
              Session::flash('home','All Students Successfully Allocated');
            }catch (\Exception $ee){die("Sorry ".$ee->getMessage());}
        }else{
            Session::flash('home','No Accommodation yet');
        }
        Redirect::to(URL.'inventory');
    }
}