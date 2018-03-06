<?php
/**
 * Created by PhpStorm.
 * User: CHRISTADEL LAPTOP
 * Date: 4/8/2017
 * Time: 2:09 PM
 */
use App\Handler\Input;
?>

<div class="container content">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3 toppad">
            <h5 class="notice">You can apply for accommodation only once</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
            <div class="panel">
                <div class="panel-heading" style="background-color: #332F2F; color: #efbb28 ">
                    <h4 class="panel-title">Student Login</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-12 col-lg-12">
                            <form class="form-horizontal" action="<?= URL ?>student/login" method="post">
                                <label class="col-lg-5 col-md-5 col-sm-4 control-label">Student Details:</label>
                                <div class="form-group">

                                    <div class="col-md-7 col-lg-7 col-sm-8">
                                        <span class="alert-danger"><?= $matricError;?></span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-black-tie"></i> </span>
                                            <input class="form-control"  type="text" name="matric" placeholder="Enter Matric    No">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-8">
                                        <span class="alert-danger"><?= $sexError;?></span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" type="password" name="password" placeholder="Enter Password">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-lg-offset-5 col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-4">
                                    <input type="hidden" name="token" value="">
                                    <input type="submit" class="btn" value="Submit">
                                </div>
                            </form>
                            <a href="<?= URL?>student/register" class="btn btn-primary">Apply</a>
                            <a href="" class="btn btn-primary" style="visibility: hidden">Check Status</a>
                        </div>
                    </div>
                </div>
                <!--                    <div class="panel-footer">-->
                <!--                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>-->
                <!--                        <span class="pull-right">-->
                <!--                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>-->
                <!--                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>-->
                <!--                        </span>-->
                <!--                    </div>-->

            </div>
<!--            <div class="biodata">-->
<!--                <p class="title row">Accommodation application form</p>-->
<!--                <div class="row">-->
<!--                    <form class="form-horizontal">-->
<!--                        <div class="form-group">-->
<!--                            <label class="col-lg-5 col-md-5 col-sm-4 control-label">Hall of Residence:</label>-->
<!--                            <div class="col-lg-7 col-md-7 col-sm-8">-->
<!--                                <div class="input-group">-->
<!--        <!--                            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>-->
<!--                                    <select name="hall-choice" class="form-control selectpicker" required>-->
<!--                                        <option value=" " >Choose hall of choice</option>-->
<!--                                        <option value="Fajuyi">Fajuyi (Male)</option>-->
<!--                                        <option value="Awolowo">Awolowo (Male)</option>-->
<!--                                        <option value="Angola">Angola (Male)</option>-->
<!--                                        <option value="ETF">ETF (Male)</option>-->
<!--                                        <option value="Akintola">Akintola (Female)</option>-->
<!--                                        <option value="Moremi">Moremi (Female)</option>-->
<!--                                        <option value="Moz">Mozambique (Female)</option>-->
<!---->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group" style="margin-left: 10px">-->
<!--                            <label class="col-lg-5 col-md-4 col-sm-4 control-label"></label>-->
<!--                            <div class="col-lg-7 col-md-8 col-sm-8">-->
<!--                                <button type="submit" class="btn">Submit</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!--            </div>-->
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3 toppad well mywell">
            <p>
                <a href="#">
                    <button type="button" class="btn btn-sm">
                        <span class="glyphicon glyphicon-zoom-in" style="color: rgba(43, 11, 96, 0.8)"></span> Check accommodation status
                    </button>
                </a>
            </p>
        </div>

    </div><br><br><br>

</div><br><br><br>


