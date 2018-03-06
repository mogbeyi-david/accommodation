<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 5/15/17
 * Time: 11:17 PM
 */
namespace App\Models;
use App\Core\Model;
class Accomodation extends Model{
    private $matric_no;
    private $sex;
    public $hall_bed=[];
    public $_student = [];
    public $_room;
    public $_bed,$_bedspace;
    public $_hostel;
    public $_block;
    public $_id;
    public $_length;
    public function __construct( $matric_no=null, $sex=null){
        parent::__construct();
        if ($matric_no != null && $sex != null) {
            $this->matric_no = $matric_no;
            $this->sex = $sex;
        }
    }
    public function student($matric){
        $data = $this->_dbase->select('students',['matric_number'=>$matric]);
        if ($data->count()){
            return ($data->first()['bedspace_id']>=1)? true : false;
        }
    }
    public function timer(){
        $t = $this->_dbase->select('timer' ,['id'=>1]);
        if ($t->count()){
            return $t->first();
        }
        return [];
    }
    public function start(){
        $stu = $this->_dbase->select('students',['bedspace_id'=>0]);
        if ($stu->count()){
            foreach ($stu->results() as $name){
                array_push($this->_student, $name);
            }
        }
    }
    public function endAllocation($id){
        if (!$this->_dbase->update('timer',['status'=>1],['id'=>$id])){
            throw new \Exception("Unable to end allocation of student");
        }
    }
    public function status($space){
        $this->_dbase->select('students',['bedspace_id'=>$space]);
        if ($this->_dbase->count()){
            return true;
        }
        return false;
    }
    public function getSex($sex){
        switch (strtolower($sex)) {
            case 'male' :
                $s = 1;
                break;
            case 'female';
                $s = 2;
                break;
        }
        return $s;
    }
    public function generateRandomNumber($length, $start = 0) {
        return  rand($start, $length - 1);
    }
    public function isFresher($matric_no)
    {
        $this->matric_no = $matric_no;
        if (is_numeric($matric_no[0]) == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function checkStatus( $id){
        $status = $this->_dbase->select('bedspaces',['hostel_id'=>$id,'status'=>'True']);
        if ($status->count()){
            return true;
        }

        return false;
    }
    public function setStatus( $table_name, $id){
        if (!$this->_dbase->update($table_name,['status'=>'True'],['id'=>$id])){
            throw new \Exception("Unable to update");
        }
    }
    public function checkHostelAvailability( $sex){
        $this->sex =  $sex;
        $sex_id = $this->getSex($sex);
        $hostel = $this->_dbase->select('hostels',['gender_id'=>$sex_id,'status'=>'False']);
        if ($hostel->count() > 1){
            return true;
        }
        return false;
    }
    public function hostelName($id){
        $name = $this->_dbase->select('hostels',['id'=>$id]);
        if ($name->count()){
            return $name->first();
        }
        return [];
    }
    public function hostel($id ){
            $hostl = $this->_dbase->select('hostels',['id'=>$id,'status'=>'False']);
            if ($hostl->count()){
                return $hostl->first();
            }
    }
    public function bedSpace($hostel){
        $d = $this->_dbase->select('bedspaces',['hostel_id'=>$hostel,'status'=>'False']);
        if ($d->count()){
            foreach ($d->results() as $result) {
                array_push($this->hall_bed,$result);
            }
            $this->_length= $d->count();
            return true;
        }
        return false;
    }
    public function bedSpacesId($id){
        $sb = $this->_dbase->select('bedspaces',['id'=>$id]);
        if ($sb->count()){
            $this->_bedspace= $sb->first();
            return true;
        }
    }
    public function room($id){
        $room = $this->_dbase->select('rooms',['id'=>$id]);
        if ($room->count()){
            return $room->first();
        }
    }
    public function block($id){
        $dd= $this->_dbase->select('blocks',['id'=>$id]);
        if ($dd->count()){
            return $dd->first();
        }
        return false;
    }
    public function accommodate($matric,$sex){
        $this->matric_no = $matric;
        $this->sex= $sex;
        $sex_id = $this->getSex($sex);
        if ($this->checkHostelAvailability($sex)){
            $length= 0;
            //select hostels for the sex
            $hs= $this->_dbase->select('hostels',['gender_id'=>$sex_id,'status'=>'False']);
            //if not full
            if ($hs->count()){
                $length= $hs->count();
                if ($this->isFresher($matric) == true){
                    $hostel_id = $this->generateRandomNumber($length)+1;
                }else{
                    $hostel_id = $this->generateRandomNumber($length,1)+1;
                }
                if ($sex_id == 2){
                    $hostel_id +=4;
                }
                //hostel name;
                $this->_hostel= $this->hostel($hostel_id);
                //select bed space available for the this hostel
                if ($this->bedSpace($hostel_id)){
                    for ($i=0; $i<=$this->_length; $i++){

                    }
                    $rand= $this->generateRandomNumber($this->_length);
                    $bedSpace_id = $this->hall_bed[$rand]['id'];
                    //the bedspace available
                    $this->bedSpacesId($bedSpace_id);
                    $this->_block =$this->block($this->_bedspace['block_id']);// block details
                    $this->_room= $this->room($this->_bedspace['room_id']);// room details
                    $this->_bed= $this->_bedspace['bed_id'];// bed
                    $this->setStatus('bedspaces',$bedSpace_id);
                    $this->_dbase->update('students',['bedspace_id'=>$this->_bedspace['id']],['matric_number'=>$matric]);
                    if ($this->checkStatus($hostel_id)){
                        $this->setStatus('hostels',$hostel_id);
                    }
                }
            }else{
                //no more hostel available
            }
        }else{
            return false;
        }
    }
    public function round(){
        $name = [];
        $data = $this->_dbase->select('students',['bedspace_id'=>0]);
        if ($data->count()){
              return $data->results();
        }
        return [];
    }

}