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
            <i class="fa fa-home"></i>
        </div>
        <div class="page-name" style="margin-left: 20px;">
            <span class="text-center">BLOCKS</span>
        </div>
    </div>
    <div>
        <ol class="breadcrumb" style="background-color: #fff !important;">
            <li class="active">
                <i class="fa fa-hospital-o"></i>  <a href="<?= URL?>inventory/invent">Hostels [<?= $this->_invent->getHostelName($name);?>]</a>
            </li>
        </ol>
    </div>
    <div class="row">
        <?php
        $i =1;
        foreach ($hostel_block as $item):
            $block= $this->_invent->getBlockDetails($item['block_id']);
        ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="card button">
                <a href="<?= URL?>inventory/invent/<?= $name ?>/<?=$block['id']?>">
                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="text-center">BLOCK <?= $block['block']?></span>
                </div>
                <div class="footer text-center">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> <?=$this->_invent->bedSpaceFilled($name,$block['id'])?>
                        <i class="fa fa-circle text-danger"></i> <?=$this->_invent->bedSpaceNotFilled($name,$block['id'])?>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <?php
        if (  $i%3==0){
            echo '</div><div class="row"> ';
        }
        $i++;
        endforeach;
        ?>
    </div>
