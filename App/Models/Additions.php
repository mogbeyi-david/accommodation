<?php

/**
 * Created by PhpStorm.
 * User: Mogbeyi David
 * Date: 05/05/2017
 * Time: 14:10
 */
namespace App\Models;
class Additions extends Database
{
    public function addNewHostel($hostel_name){
        $query = "INSERT INTO hostels(hostel) VALUES('$hostel_name')";
        $result = mysqli_query($this->connection , $query);
        if($result){
            print ("Hostel Added Successfully!");
        }else{
            print "Hostel Not Added Successfully";
        }
    }

    public function addNewBlock($block_name){
        $query = "INSERT INTO blocks(block) VALUES('$block_name')";
        $result = mysqli_query($this->connection , $query);
        if($result){
            print ("Block Added Successfully!");
        }else{
            print ("Block Not Added Successfully");
        }
    }

    public function addNewRoom($room_number){
        $query = "INSERT INTO rooms(room) VALUES('$room_number')";
        $result = mysqli_query($this->connection , $query);
        if($result){
            print ("Room Added Successfully!");
        }else{
            print ("Room Not Added Successfully");
        }
    }

    public function addNewBedspace($bedspace){
        $query = "INSERT INTO bedspaces(bedspace) VALUES('$bedspace')";
        $result = mysqli_query($this->connection , $query);
        if($result){
            print ("Bedspace Added Successfully!");
        }else{
            print ("Bedspace Not Added Successfully");
        }
    }

    public function addNewBed($hostel_id , $block_id , $room_id ,$bedspace_id){
        $query = "INSERT INTO beds(hostel_id , block_id , room_id , bedspace_id)
        VALUES('$hostel_id' , '$block_id' , '$room_id' , '$bedspace_id')";
        $result = mysqli_query($this->connection , $query);
        if($result){
            print ("Bedspace Added Successfully!");
        }else{
            print ("Bedspace Not Added Successfully");
        }
    }

}