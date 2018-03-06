<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../../../Public/dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Set Timer</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include 'general-stylesheets.php';include 'active-nav.php';
    ?>

</head>
<body>

<div class="wrapper">
    <?php  $active5='active';include 'sidebar.php';?>
    <div class="main-panel">
        <?php include 'top-nav.php';?>
        <div class="content">
            <div class="container-fluid">
                <form action="<?= URL?>inventory/timer" method="post" enctype="multipart/form-data">
                    <div class="card" style="padding-bottom: 25px;">
                        <div class="header">
                            <h3 class="title">Start  date</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="col-md-3 col-sm-3 col-sm-3">
                                    <h5>DAY</h5>
                                    <input type="number" name="sday" placeholder="DD" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3 col-sm-3">
                                    <h5>MONTH</h5>
                                    <input type="number" name="smonth" placeholder="MM" class="form-control">
                                </div>
                                <div class="col-md-4 col-sm-4 col-sm-4">
                                    <h5>YEAR</h5>
                                    <input type="number" name="syear" placeholder="YYYY" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="padding-bottom: 25px;">
                        <div class="header">
                            <h3 class="title">Start Time</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <div class="col-md-3 col-sm-3 col-sm-3">
                                    <h5>HOUR</h5>
                                    <input type="number" name="shour" placeholder="HH" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3 col-sm-3">
                                    <h5>MINUTE</h5>
                                    <input type="number" name="smin" placeholder="MM" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3 col-sm-3">
                                    <h5>SECONDS</h5>
                                    <input type="number" name="ssecond" placeholder="SS" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                <div class="card" style="padding-bottom: 25px;">
                    <div class="header">
                        <h3 class="title">End  date</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="col-md-3 col-sm-3 col-sm-3">
                                <h5>DAY</h5>
                                <input type="number" name="eday" placeholder="DD" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-3 col-sm-3">
                                <h5>MONTH</h5>
                                <input type="number" name="emonth" placeholder="MM" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-4 col-sm-4">
                                <h5>YEAR</h5>
                                <input type="number" name="eyear" placeholder="YYYY" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding-bottom: 25px;">
                    <div class="header">
                        <h3 class="title">End  Time</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="col-md-3 col-sm-3 col-sm-3">
                                <h5>HOUR</h5>
                                <input type="number" name="ehour" placeholder="HH" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-3 col-sm-3">
                                <h5>MINUTE</h5>
                                <input type="number" name="emin" placeholder="MM" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-3 col-sm-3">
                                <h5>SECONDS</h5>
                                <input type="number" name="esecond" placeholder="SS" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="" style="margin-top: 40px;">
                                <input name="token_end" type="hidden" value="set_time">
                                <input type="submit" class="btn btn-info btn-fill pull-left" value="Set DateTime">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
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
            	icon: 'pe-7s-bell',
            	message: "You can now set deadline for application"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
