<?php
/**
 * Created by PhpStorm.
 * User: CHRISTADEL LAPTOP
 * Date: 4/9/2017
 * Time: 10:59 PM
 */?>
<?php include_once("../includes/head.php") ?>
<?php include_once("../includes/navbar.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <p class=" text-info">May 05,2014,03:00 pm </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">My Profile</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-12 col-lg-12 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Full name:</td>
                                    <td>ADENIJI Oluwatoba Temilola</td>
                                </tr>
                                <tr>
                                    <td>Matric number:</td>
                                    <td>CSC/2013/100</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>Male</td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Part:</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td>Computer Science and Engineering</td>
                                </tr>
                                <tr>
                                    <td>Faculty:</td>
                                    <td>Technology</td>
                                </tr>
                                <tr>
                                <td>Phone Number</td>
                                <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                </td>

                                </tr>

                                </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">My Sales Performance</a>
                            <a href="#" class="btn btn-primary">Team Sales Performance</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php include_once("../includes/footer.php") ?>