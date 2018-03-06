<?php
/**
 * Created by PhpStorm.
 * User: CHRISTADEL LAPTOP
 * Date: 4/8/2017
 * Time: 2:09 PM
 */
?>
<div id="area">

<div class="container content" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3 toppad">
            <h5 class="notice"><b>Congratulations!</b> You have been allocated a bedspace in one of the halls of residence. Check below for details</h5>

        </div>
    </div>
    <div class="row" id="area1">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading" style="background-color: #332F2F; color: #efbb28 ">
                    <h4 class="panel-title">Accommodation Status</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-12 col-lg-12 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Hall of Residence:</td>
                                    <td><?= $bed->hostelName($bed->_bedspace['hostel_id'])['hostel'];?></td>
                                </tr>
                                <tr>
                                    <td>Building Label:</td>
                                    <td>Block   <?= $bed->block($bed->_bedspace['block_id'])['block'];?></td>
                                </tr>
                                <tr>
                                    <td>Room Number:</td>
                                    <td><?= $bed->room($bed->_bedspace['room_id'])['room'];?></td>
                                </tr>
                                <tr>
                                    <td>Bed Space :</td>
                                    <td><?=
                                        $bed->_bedspace['bed_id'];?></td>
                                </tr>
                                </tbody>
                            </table>

<!--                            <button class="btn" onclick="printPageArea('area1')"><i class="fa fa-print"></i> Print</button>-->
                            <a href="#" class="btn btn-primary" style="visibility: hidden">Check Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xs-offset-0 col-sm-offset-8 col-md-offset-7 col-lg-offset-7" onclick="printPageArea('area1')"><i class="fa fa-print"></i> Print</button>

<!--    ####### ELSE IF NO ACCOMMODATION HAS BEEN GIVEN THIS USER#######-->
<!--
    <div class="row">
        <div class="col-sm-8" style="padding-left: 0; padding-right: 10px; margin-left: 10px">
            <h5 class="notice"><b>No bedspace allocated to you yet.</b> Please check back some other time</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 biodata" style="margin-left: 10px; margin-right: 10px">
            <p class="title row">Accommodation status</p>
            <div class="row">
                <div class="col-xs-4 text-right labels"><p>Hall of Residence:</p></div>
                <div class="col-xs-8"><p>-</p></div>
            </div>
            <div class="row">
                <div class="col-xs-4 text-right labels"><p>Building Label:</p></div>
                <div class="col-xs-8"><p>-</p></div>
            </div>
            <div class="row">
                <div class="col-xs-4 text-right labels"><p>Room Number:</p></div>
                <div class="col-xs-8"><p>-</p></div>
            </div>

        </div>
    </div><br><br>
-->
<!--#######-----------------------END-------------------------------########-->




<script>
    function printPageArea(areaID){
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>

</div>