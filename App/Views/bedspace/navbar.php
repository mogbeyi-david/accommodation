<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand school" href="<?= URL?>" style="margin-left: 10px" >Obafemi Awolowo University </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 28px">
<!--                <li class="dropdown">-->
<!--                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accommodation-->
<!--                        <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="#">Apply for accommodation</a></li>-->
<!--                        <li><a href="#">Check accommodation status</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="<?php echo $activelogout; ?>"><a href="<?=URL ?>student/status" class="right-link"><span class="glyphicon glyphicon-zoom-in" style="color: #EFBB28"></span> Check accommodation status</a></li>
                <li class="<?php echo $activelogout; ?>"><a href="<?=URL ?>student/logout" class="right-link"><span class="glyphicon glyphicon-off" style="color: #EFBB28"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>