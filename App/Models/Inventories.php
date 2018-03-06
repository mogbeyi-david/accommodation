<?php
/**
 * Created by PhpStorm.
 * User: Mogbeyi David
 * Date: 16/05/2017
 * Time: 10:10
 */
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Inventories extends Model{
    public $_bedSpace;
    public $_time= [];
    public function timer(){
        $t = $this->_dbase->select('timer' ,['status'=>0]);
        if ($t->count()){
            $this->_time= $t->first();
            return true;
        }
        return false;
    }
    public function start(){
        $stu = $this->_dbase->select('students',['bedspace_id'=>0]);
        if ($stu->count()){
            foreach ($stu->results() as $name){
                array_push($this->hall_student, $name);
            }
        }
    }
    public function hall(){
        $h = $this->_dbase->get('hostels');
        if ($h->count()){
            return $h->results();
        }
        return [];
    }
    public function getName($name){
        $h = $this->_dbase->get($name);
        if ($h->count()){
            return $h->results();
        }
        return [];
    }
    public function bedspace($hostel){
        //bedspace in the hostel
        $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel]);
        if ($bed->count()){
            $this->_bedSpace= $bed->results();
            return $bed->count();
        }
        return [];
    }
    public function bedSpaceInBlock(){}
    public function bedSpaceInRoom($hostel,$block,$room){
        $bed= $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'block_id'=>$block,'room_id'=>$room]);
        if ($bed->count()){
            return $bed->results();
        }
        return 0;
    }
    public function bedSpaceFilled($hostel, $block= null, $room= null){
        $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'status'=>'True']);
        if ($block != null){
            $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'block_id'=>$block,'status'=>'True']);
        }
        if ($room != null){
            $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'block_id'=>$block,'room_id'=>$room,'status'=>'True']);
        }
        if ($bed->count()){
            return $bed->count();
        }
        return 0;
    }
    public function bedSpaceNotFilled($hostel, $block= null, $room= null){
        $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'status'=>'False']);
        if ($block != null){
            $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'block_id'=>$block,'status'=>'False']);
        }
        if ($room != null){
            $bed = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'block_id'=>$block,'room_id'=>$room,'status'=>'False']);
        }
        if ($bed->count()){
            return $bed->count();
        }
        return 0;
    }
    public function getBLock($hostel_id){
        $sql ="SELECT DISTINCT block_id FROM `bedspaces` WHERE hostel_id ={$hostel_id}";
        $result = $this->_dbase->others($sql);
        if($result->count()){
            return $result->results();
        }
        return 0;
    }
    public function getRoom($hostel,$block){
        $sql ="SELECT DISTINCT room_id FROM `bedspaces` WHERE hostel_id ={$hostel} AND block_id = {$block}";
        $result = $this->_dbase->others($sql);
        if($result->count()){
            return $result->results();
        }
        return [];
    }
    public function getBlockDetails($block_id){
        $result = $this->_dbase->select('blocks' , ['id'=>$block_id]);
        if($result->count()){
             return $result->first();

        }
    }
    public function getHostelName($id){
        $this->_dbase->select('hostels',['id'=>$id]);
        if ($this->_dbase->count()){
            return $this->_dbase->first()['hostel'];
        }
        return 'hostel not exist';
    }
    public function getRoomDetails($room_id){
        $result = $this->_dbase->select('rooms' , ['id'=>$room_id]);
        if($result->count()){
            $result = $result->first();
            return $result;
        }
    }
    public function getBedDetails($id){
        $this->_dbase->select('beds',['id'=>$id]);
        if ($this->_dbase->count()){
            return $this->_dbase->first();
        }
        return 0;
    }
    public function getBedName($bed_id){
        $result = $this->_dbase->select('beds', ['id' => $bed_id]);
        if ($result->count()) {
            $result = $result->first();
            print $result['bed'];
        }
    }
    public function reservation($hostel,$block,$room,$bed){
        if (!$this->_dbase->update('bedspaces',['status'=>'TRUE'],['hostel_id'=>$hostel,'block_id'=>$block,
            'room_id'=>$room,'bed_id'=>$bed])){
            throw new \Exception("Sorry Unable to reverse space");
        }
    }
    public function save($table,$data){
        if (!$this->_dbase->insert($table,$data)){
            throw new \Exception("Unable to save document");
        }
    }
    public function isHostelFull($hostel_id){
        // FIRST GET THE NAME OF THE HOSTEL FROM THE HOSTEL TABLE...
        $hostel = $this->getHostelName($hostel_id);

        //SELECT ALL BEDSPACES
        $all_beds = $this->_dbase->selectOne('id' , 'bedspaces' ,[
            'hostel_id'=>$hostel_id
        ]);
        $all_beds = $all_beds->count();

        //SELECT THE UNALLOCATED BEDSPACES
        $unallocated = $this->_dbase->selectOne('id' , 'bedspaces' , [
            'hostel_id'=>$hostel_id,
            'status'=>'False'
        ]);
        $unallocated = $unallocated->count();
        $allocated = $all_beds - $unallocated;


        return array($allocated , $unallocated);
    }

    public function isBlockFull($block_id , $hostel_id){

        // FIRST GET THE NAME OF THE HOSTEL FROM THE HOSTEL TABLE...
        $hostel = $this->getHostelName($hostel_id);

        // FIRST GET THE NAME OF THE BLOCK FROM THE HOSTEL TABLE...
        $block = $this->getBlockName($block_id);


        $all_blocks = $this->_dbase->selectOne('id' , 'bedspaces' ,[
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id
        ]);
        $all_blocks = $all_blocks->count();

        $unallocated_blocks = $this->_dbase->selectOne('id' , 'bedspaces' ,[
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id,
            'status'=>'False'
        ]);
        $unallocated_blocks = $unallocated_blocks->count();
        $allocated_blocks = $all_blocks - $unallocated_blocks;
        return array($allocated_blocks , $unallocated_blocks);
    }

    public function isRoomFull($hostel_id , $block_id , $room_id){
        $hostel = $this->getHostelName($hostel_id);
        $block = $this->getBlockName($block_id);
        $room = $this->getRoomName($room_id);

        //GET ALL THE BEDSPACES IN THE PARTICULAR ROOM
        $all_rooms = $this->_dbase->selectOne('id' , 'bedspaces' , [
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id,
            'room_id'=>$room_id
        ]);
        $all_rooms  = $all_rooms->count();

        $unallocated_rooms = $this->_dbase->selectOne('id' , 'bedspaces' , [
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id,
            'room_id'=>$room_id,
            'status'=> 'False'
        ]);
        $unallocated_rooms  = $unallocated_rooms->count();
        $allocated_rooms = $all_rooms - $unallocated_rooms;
        return array($allocated_rooms , $unallocated_rooms);
    }

    public function isBedspaceFull($hostel_id , $block_id , $room_id , $bedspace_id){
        $hostel = $this->getHostelName($hostel_id);
        $block = $this->getBlockName($block_id);
        $room = $this->getRoomName($room_id);
        $bedspace = $this->getBedspaceName($bedspace_id);

        $all_bedspaces = $this->db->selectOne('id' , 'bedspaces' , [
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id,
            'room_id'=>$room_id,
            'bedspace_id'=>$bedspace_id
        ]);

        $unallocated_bedspaces = $this->_dbase->selectOne('id' , 'bedspaces' , [
            'hostel_id'=>$hostel_id,
            'block_id'=>$block_id,
            'room_id'=>$room_id,
            'bedspace_id'=>$bedspace_id,
            'status'=>'False'
        ]);

        $allocated_bedspaces = $all_bedspaces - $unallocated_bedspaces;
        return array($allocated_bedspaces , $unallocated_bedspaces);
    }

}