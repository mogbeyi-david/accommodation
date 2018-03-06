<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= URL ?>dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Inventory</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include APP.'Views/admin-view/general-stylesheets.php';include APP.'Views/admin-view/active-nav.php';
    ?>

</head>
<body>

<div class="wrapper">
    <?php  $active2='active';include APP.'Views/admin-view/sidebar.php';?>
    <div class="main-panel">
        <?php include APP.'Views/admin-view/top-nav.php';?>
        <div class="content">
            <div class="container-fluid">
<!--        NECESSARY STUFF FOR DASHBOARD-->

                <!--Hostels Container-->
                <?php
                if ($name == null):
                ?>
                <div>
                    <div>
                        <?php include APP.'Views/admin-view/hostels.php';?>
                    </div>
                </div>
                <?php endif;?>
                <!-- Blocks Container-->
                <div>
                    <?php
                    if ($block == null){
                        include APP.'Views/admin-view/blocks.php';
                    }else{
                        include APP.'Views/admin-view/rooms.php';
                    }


                    ?>
                </div>
                <!-- Blocks Container-->
            </div>
        </div>
<?php include APP.'Views/admin-view/footer.php';?>
    </div>
</div>


</body>
    <?php include APP.'Views/admin-view/general-js-scripts.php';?>
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-note2',
            	message: "Manage Accommodation Inventory right from your desk"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
