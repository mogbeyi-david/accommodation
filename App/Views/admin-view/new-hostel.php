<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../../../Public/dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>New Hostel</title>

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

                <div class="row">
                    <form role="form" class="registration-form card">
                        <h3>New Hostel</h3>
                        <hr>

                        <!--Name-->
                        <div rel="tooltip" title="Name of Hostel">
                            <div>
                                <label>Name:</label>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                <input type="text" name="hostel-name" class="form-control" placeholder="Name of Hostel">
                            </div>
                        </div>

                        <div class="row">
                            <!--Blocks-->
                            <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Number of Blocks">
                                <div>
                                    <label>Number of Blocks:</label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                    <input type="number" name="number-blocks" class="form-control">
                                </div>
                            </div>

                            <!--Gender-->
                            <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Choose Gender">
                                <div>
                                    <label>Gender Type:</label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select name="gender" class="form-control">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
                            </div>
                        </div>
                            <hr>
                    </form>
                    <form role="form" class="registration-form card">
                        <!--Add Blocks-->
                        <div>
                            <h3>Add Blocks</h3>
                            <hr>

                            <!--Name-->
                            <div rel="tooltip" title="Name of Block">
                                <div>
                                    <label>Name:</label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                    <input type="text" class="form-control" name="block-name" placeholder="Name of Block">
                                </div>
                            </div>

                            <div class="row">
                                <!--Type of Building-->
                                <div class="col-lg-6 col-md-6 col-sm-6"rel="tooltip" title="Building Type">
                                    <div>
                                        <label>Building Type:</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span>
                                        <select name="building-type" class="form-control">
                                            <option>Bungalow</option>
                                            <option>1 Storey</option>
                                            <option>2 Storeys</option>
                                            <option>3 Storeys</option>
                                            <option>Other...</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Basement-->
                                <div class="col-lg-6 col-md-6 col-sm-6"rel="tooltip" title="Does building have basement?">
                                    <div>
                                        <label>Basement:</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                        <select name="building-type" class="form-control">
                                            <option value="">None</option>
                                            <option value="">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Blocks-->
                                <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Rooms per floor">
                                    <div>
                                        <label>Number of Rooms per floor:</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                        <input type="number" name="rooms-per-floor" class="form-control">
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            	message: "Welcome <b>Admin</b> - You can add a new Hostel now"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
