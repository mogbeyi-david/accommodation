<?php
/**
 * Created by PhpStorm.
 * User: Opyetco
 * Date: 4/9/2017
 * Time: 11:21 PM
 */
?>
<div class="sidebar" data-color="azure" data-image="<?= URL?>dash/img/sidebar-2.jpg">

    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">ADMIN</a>
        </div>

        <ul class="nav">
            <li class="<?php echo $active1;?>">
                <a href="<?= URL;?>inventory">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="<?php echo $active2;?>">
                <a href="<?= URL?>inventory/invent">
                    <i class="pe-7s-note2"></i>
                    <p>Inventory</p>
                </a>
            </li>
            <li class="<?php echo $active3;?>">
                <a href="<?= URL?>inventory/manage_hostel">
                    <i class="pe-7s-home"></i>
                    <p>Manage Hostels</p>
                </a>
            </li>
            <li class="<?php echo $active4;?>">
                <a href="<?= URL?>inventory/reservation">
                    <i class="pe-7s-pen"></i>
                    <p>Bedspace Reservation</p>
                </a>
            </li>
<!--            <li>-->
<!--                <a href="maps.html">-->
<!--                    <i class="pe-7s-map-marker"></i>-->
<!--                    <p>Maps</p>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="user.html">-->
<!--                    <i class="pe-7s-user"></i>-->
<!--                    <p>User Profile</p>-->
<!--                </a>-->
<!--            </li>-->
            <li class="<?php echo $active5;?>">
                <a href="<?= URL?>inventory/timer">
                    <i class="pe-7s-bell"></i>
                    <p>Set Timer</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="#">
                    <i class="pe-7s-clock
                    "></i>
                    <p>10d 20h 35m 34s</p>
                </a>
            </li>
        </ul>
    </div>
</div>
