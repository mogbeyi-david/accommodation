<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL?>apply/assets/css/bootstrap.min.css">
    <script src="<?= URL?>apply/assets/js/jquery-1.12.3.min.js"></script>
    <script src="<?= URL?>apply/assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= URL?>apply/assets/css/custom_stylesheet.css">
    <link rel="stylesheet" href="<?= URL?>apply/assets/css/testcss.css">
    <link href="<?= URL?>apply/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<style>

    /*.table-user-information > tbody > tr {*/
        /*border-top: 1px solid rgb(221, 221, 221);*/
    /*}*/

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }


    .table-user-information > tbody > tr > td {
        border-top: 0;
    }
    .toppad
    {margin-top:20px;
    }

</style>
</head>
<body>

<?php
require APP.'Views/bedspace/navbar.php';
?>
