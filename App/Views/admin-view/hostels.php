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
            <i class="fa fa-hospital-o"></i>
        </div>
        <div class="page-name" style="margin-left: 20px;">
            <span class="text-center">HOSTELS</span>
        </div>
    </div>
    <div>
        <ol class="breadcrumb" style="background-color: #fff !important;">
            <li class="active">
                <i class="fa fa-hospital-o"></i>  <a href="#">Hostels</a>
            </li>
        </ol>
    </div>
<div class="row">
<?php
$hostel = $this->_invent->hall();
foreach ($hostel as $item):
?>

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
        <div class="card button">
            <a href="<?= URL?>inventory/invent/<?= $item['id']?>">
                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="text-center"><?= strtoupper($item['hostel']) ?></span>
                </div>
                <div class="footer text-center">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i> <?= $this->_invent->bedSpaceFilled($item['id'])?>
                        <i class="fa fa-circle text-danger"></i> <?= $this->_invent->bedSpaceNotFilled($item['id'])?>
                    </div>
                </div>
            </a>

        </div>
    </div>
<?php endforeach;?>

    </div>
