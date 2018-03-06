<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= URL?>dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include APP.'Views/admin-view/general-stylesheets.php';include APP.'Views/admin-view/active-nav.php';
    ?>
</head>

<body>

<div class="wrapper">
    <?php $active1='active'; include APP.'Views/admin-view/sidebar.php';?>
    <div class="main-panel">
        <?php include APP.'Views/admin-view/top-nav.php';?>
        <div class="content">
            <div class="container-fluid">

                <?php
                if (\App\Handlers\Session::exists('home')){
                  echo '<span class="alert alert-success" >'.\App\Handlers\Session::flash('home').'</span>';
                }
                include APP.'Views/admin-view/graph-announcement.php';?>
                <?php
                $time= [];
                if ($this->_invent->timer()) {
                    $time = $this->_invent->_time;
                    if (date('Y-m-s H:i:s') >= $time['end']):
                        ?>
                        <div class="card button">
                            <a href="<?= URL ?>inventory/jax/<?= $time['id'] ?>">
                                <div class="content-menu-name col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="text-center">Start allocation </span>
                                </div>
                            </a>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="card button">
                            <a href="#">
                                <div class="content-menu-name col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <span class="text-center">Registration in Progress </span>
                                </div>
                            </a>
                        </div>
                    <?php endif;
                }else{
                    echo ' <div class="card button">
                            <a href="#">
                                <div class="content-menu-name col-lg-7 col-md-7 col-sm-7 col-xs-7   ">
                                    <span class="text-center">ALl Bedspace Allocated For this year </span>
                                </div>
                            </a>
                        </div>';
                }
                ?>

                <div class="row">

                </div>
            </div>
        </div>
<?php include APP.'Views/admin-view/footer.php';?>
    </div>
</span>


</body>
    <?php include APP.'Views/admin-view/general-js-scripts.php';?>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-smile',
            	message: "Welcome <b>Admin</b> - Start the day by having a view of bedspace allocations."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
