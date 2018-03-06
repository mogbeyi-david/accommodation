<?php
/**
 * Created by PhpStorm.
 * User: CHRISTADEL LAPTOP
 * Date: 4/8/2017
 * Time: 2:09 PM
 */
?>


<div class="container content">
    <div class="row">
        <div class="col-sm-12" style="">
            <h5 class="notice"><i class="fa fa-bullseye"></i> Welcome <b><?= $this->_profile['matric_number'] ?></b></h5>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 ">
            <div class="well mywell">
                <h4>Dashboard</h4>
                <p>Click on <i class="fa fa-building-o fa"> <b>Hostels</b></i> to view information about the hostel you would like
                    to choose before applying for an accommodation.</p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a id="boxesLink" href="#"><div class="text-center boxes-1" id="my-profile">
                        <h4><i class="fa fa-user fa-3x"></i></h4>
                        <p>My Profile</p>
                    </div></a>
                </div>

                <div class="col-sm-4">
                    <a class="boxesLink" href="#"><div class="text-center boxes-1" id="my-print-app">
                        <h4><i class="fa fa-print fa-3x"></i></h4>
                        <p>Print Application Slip</p>
                    </div></a>
                </div>
            </div>
            <?php
            $student = new \App\Models\Student();
            if ($student->allocationStatus()):
            ?>
            <div class="row">
                <div class="col-sm-4">
                    <a class="boxesLink" href="<?= URL?>student/status"><div class="text-center boxes-2" id="my-check-status">
                        <h4><i class="fa fa-check fa-3x"></i></h4>
                        <p>Check Accommodation Status</p>
                    </div></a>
                </div>
                <div class="col-sm-4">
                    <a class="boxesLink" href="#"><div class="text-center boxes-2" id="my-print-alloc">
                        <h4><i class="fa fa-print fa-3x"></i></h4>
                        <p>Print Accommodation Status</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <a class="boxesLink" href="<?= URL?>"><div class="text-center boxes-2" id="my-view">
                        <h4><i class="fa fa-building fa-3x"></i></h4>
                        <p>Hostels</p>
                    </div></a>
                </div>
            </div>
            <?php endif;?>
<!--            <div class="row">-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="well">-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="well">-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="well">-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                        <p>Text</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="row" style="visibility: hidden">
                <div class="col-sm-8">
                    <div class="well">
                        <p>Text</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>





