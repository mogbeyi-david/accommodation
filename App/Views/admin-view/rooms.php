<?php
/**
 * Created by PhpStorm.
 * User: Opyetco
 * Date: 4/12/2017
 * Time: 11:07 AM
 */

?>

    <div class="row" style="padding: 20px; padding-top: 0px;">
        <div class="page-icon">
            <i class="fa fa-bank"></i>
        </div>
        <div class="page-name" style="margin-left: 20px;">
            <span class="text-center">ROOMS</span>
        </div>
    </div>
    <div>
        <ol class="breadcrumb" style="background-color: #fff !important;">
            <li>
                <i class="fa fa-hospital-o"></i>  <a href="<?= URL?>inventory/invent">Hostels [<?= $this->_invent->getHostelName($name);?>]</a>
            </li>
            <li class="active">
                <i class="fa fa-home"></i>  <a href="<?= URL?>inventory/invent/<?= $name?>">Blocks [<?= $this->_invent->getBlockDetails($block)['block']?>]</a>
            </li>

        </ol>
    </div>
    <div class="row">

            <?php
            $q=1;
            foreach ($block_room as $value):
                $rooms = $this->_invent->getRoomDetails($value['room_id']);
            ?>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <div class="card button">
                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="text-center">ROOM <?= $rooms['room'] ?></span>
                </div>
                <div class="footer text-center">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> <?= $this->_invent->bedSpaceFilled($name,$block,$rooms['id']); ?>
                        <i class="fa fa-circle text-danger"></i> <?= $this->_invent->bedSpaceNotFilled($name,$block,$rooms['id']); ?>
                    </div>
                </div>
            </div>
        </div>
            <?php
            if ($q%3 == 0){
                echo '</div><div class="row">';
            }
            endforeach;?>
    </div>
