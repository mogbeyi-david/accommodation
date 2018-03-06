<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= URL?>dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Manage Hostels</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include 'general-stylesheets.php';include 'active-nav.php';
    ?>

</head>
<body>

<div class="wrapper">
    <?php $active3='active'; include 'sidebar.php';?>
    <div class="main-panel">
        <?php include 'top-nav.php';?>
        <div class="content">
            <div class="container-fluid">
<!--                --><?php //include 'graph-announcement.php';?>

                <!--  NECESSARY STUFF FOR DASHBOARD-->
                <div class="manage-hostels">
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
                                <i class="fa fa-hospital-o"></i>  <a href="hostels.php">Hostels</a>
                            </li>
                        </ol>
                    </div>
                    <h4>Select Hostel</h4>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">MOREMI</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">ALUMNI</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">MOZAMBIQUE</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">AKINTOLA</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">AWOLOWO</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">FAJUYI</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">ETF</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                            <div class="card button">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="hostel-name text-center">ANGOLA</span>
                                </div>
                                <div class="stats text-center">
                                    <div class="options">
                                        <button type="button" rel="tooltip" title="Edit Hostel" class="edit-hostel-name btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="remove-hostel btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="new-hostel.php">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4" style="">
                            <div class="card button" rel="tooltip" title="Add new Hostel" style="background-color: #1DC7EA;">
                                <div class="content-menu-name col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <i class="fa fa-plus-square text-center" style="font-size: 40px !important;color:#fff !important;"></i>
                                </div>
                                <div class="stats col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <div class="options">
                                        <span class="text-center" style="position:relative;top:10px;color:#fff !important;font-size: 20px !important;">ADD&nbsp;NEW</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>
                </div>

                <div class="row">
                </div>
            </div>
        </div>
<?php include 'footer.php';?>
    </div>
</div>


</body>
    <?php include 'general-js-scripts.php';?>
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-home',
            	message: "Now's time to add new data or edit existing"

            },{
                type: 'info',
                timer: 4000
            });

    	});

        $(".edit-hostel-name").click(function(){
            this.value = ;
        });
        $(".remove-hostel").click(function(){

        });
	</script>

</html>
