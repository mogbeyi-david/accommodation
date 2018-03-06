<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= URL?>dash/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bedspace Reservation</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include 'general-stylesheets.php';include 'active-nav.php';
    ?>

</head>
<body>
<script>
    function getBlock() {
        var hostel= document.getElementById('hostel').value;

        var block = document.getElementById('block');
        var url = document.getElementById('url').value;
        xxx= new XMLHttpRequest();
        xxx.onreadystatechange= function () {
            if (xxx.readyState == 4 && xxx.status== 200){
                block.innerHTML= xxx.responseText;
            }
        };
        xxx.open('GET',url+'block&id='+hostel,true);
        xxx.send();
    }
    function getRoom() {
        var hostel= document.getElementById('hostel').value;
        var block = document.getElementById('block').value;
        var room  = document.getElementById('room');
        var url = document.getElementById('url').value;

        xxx= new XMLHttpRequest();
        xxx.onreadystatechange= function () {
            if (xxx.readyState == 4 && xxx.status== 200){
                room.innerHTML= xxx.responseText;
            }
        };
        xxx.open('GET',url+'room&id='+block+'&hostel='+hostel,true);
        xxx.send();
    }
    function getBed() {
        var hostel= document.getElementById('hostel').value;
        var block = document.getElementById('block').value;
        var room  = document.getElementById('room').value;
        var  bed = document.getElementById('bed');
        var url = document.getElementById('bed_url').value;
        xxx= new XMLHttpRequest();
        xxx.onreadystatechange= function () {
            if (xxx.readyState == 4 && xxx.status== 200){
                bed.innerHTML= xxx.responseText;
            }
        };
        xxx.open('GET',url+'hostel='+hostel+'&block='+block+'&room='+room,true);
        xxx.send();
    }
</script>
<div class="wrapper">
    <input type="hidden" id="url" value="<?= URL?>inventory/get?d=">
    <input type="hidden" id="bed_url" value="<?= URL?>inventory/getBedInRoom?">
    <?php $active4='active'; include 'sidebar.php';?>
    <div class="main-panel">
        <?php include APP.'Views/admin-view/top-nav.php';?>
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div role="form" class="registration-form card">
                        <h3>Select Student</h3>
                        <hr>

                        <!--Search student for selection-->
                        <div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input rel="tooltip" title="Search student" type="text" name="matric-number" class="form-control" placeholder="Enter matric number of student">
                            </div>

                            <div class="row col-lg-12 col-md-12 col-sm-12">
                                <button id="search" type="submit" class="btn btn-info btn-fill pull-right">Search</button>
                            </div>

                            <!-- Table showing search results -->
                            <div id="searchResults" style="display: none;">
                                <div class="header">
                                    <h4 class="title">Search Results...</h4>
                                    <p class="category">Please select student from search list.</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Matric No</th>
                                        <th>Level</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Dakota Rice</td>
                                            <td>LAW/2013/104</td>
                                            <td>500</td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info btn-fill">Select</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Minerva Hooper</td>
                                            <td>CLI/2012/151</td>
                                            <td>500</td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info btn-fill">Select</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sage Rodriguez</td>
                                            <td>REL/2014/120</td>
                                            <td>300</td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info btn-fill">Select</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Philip Chaney</td>
                                            <td>ACC/2013/079</td>
                                            <td>400</td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info btn-fill">Select</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Doris Greene</td>
                                            <td>ANS/2013/081</td>
                                            <td>500</td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info btn-fill">Select</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        </div>
                    </div>
                    <form role="form" class="registration-form card" method="post" action="<?= URL?>inventory/reservation">
                        <!--Add Blocks-->
                        <div>
                            <h3>Bedspace Allocation</h3><hr>

                            <div class="row">
                                <!--Reservation Category-->
                                <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Reservation Category">
                                    <div>
                                        <label>Reservation Category:</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span>
                                        <select name="res-cat" class="form-control">
                                            <option value="">Select Student</option>
                                            <option value="union">Student Union</option>
                                            <option value="hall">Hall Executive/Block Rep</option>
                                            <option value="physical_challenge">Physically Challenged</option>
                                            <option value="others">Other1...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="">
                                    <!--Hostel-->
                                    <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Select Hostel">
                                        <div>
                                            <label>Hostel:</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span>
                                            <select name="hostel" class="form-control" onchange="getBlock()" id="hostel">
                                                <option value="">[select - hostel]</option>
                                                <?php
                                                foreach ($hostel as $name):
                                                ?>

                                                <option value="<?= $name['id']?>"><?= $name['hostel']?></option>
                                                <?php endforeach;?>

                                            </select>
                                        </div>
                                    </div>

                                    <!--Block-->
                                    <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Select Block">
                                        <div>
                                            <label>Block:</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <select name="block" class="form-control" id="block" onchange="getRoom()">
                                                <option value="">[select - hostel]</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Room-->
                                    <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Select Room">
                                        <div>
                                            <label>Rooms:</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <select name="room" class="form-control" id="room" onchange="getBed()">
                                                <option value="">[Select - Block]</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Bedspace-->
                                    <div class="col-lg-6 col-md-6 col-sm-6" rel="tooltip" title="Select Bedspace">
                                        <div>
                                            <label>Bedspace:</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <select name="bedspace" class="form-control" id="bed"">
                                                <option value="">[select - Room]</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row col-lg-12 col-md-12 col-sm-12">
                                        <input type="hidden" name="token" value="<?= \App\Handlers\Token::generate()?>>">
                                        <input type="submit" class="btn btn-info btn-fill pull-right" value="Allocate">
                                    </div>
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
            	icon: 'pe-7s-users',
            	message: "Welcome <b>Admin</b> - You can now reserve a bedspace"

            },{
                type: 'info',
                timer: 4000
            });

    	});


        $("#search").click(function(){
           $("#searchResults").show(500);
        });
	</script>

</html>
