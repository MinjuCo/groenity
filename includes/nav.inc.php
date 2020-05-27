<div class="fixed-top">
    <nav class="navbar navbar-expand-md shadow d-flex flex-row align-items-center">
        <div class="container-xl">
            <a class="navbar-brand" href="<?php echo ($currentPage == "index")? "index.php": "../index.php";?>">
                <img src="<?php echo ($currentPage == "index")? "img/": "../img/";?>gresident-logo.svg" alt="logo-groenity">
            </a>
            <!--responsive button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
                    <?php
                    if (isset($_SESSION["user"])) {
                        include_once(__DIR__."/../includes/nav-private.inc.php");
                    } else {
                        include_once(__DIR__."/../includes/nav-public.inc.php");
                    } ?>
            </div>
        </div>
    </nav>

    <?php 
        //if user is logged in show the app navigation
        if(isset($_SESSION["user"])):
    ?>

    <nav class="navbar shadow-sm navbar-expand-md navbar--app">
        <div class="container-fluid">
            <!--responsive button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarApplication" aria-controls="navbarApplication" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarApplication">
                <ul class="navbar-nav navbar-nav--app d-flex justify-content-between container-fluid text-center">
                    <li class="nav-item active col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "city")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/activity.svg"); ?>
                            Stad
                        </a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "ownusage")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/bar-chart-2.svg"); ?>
                            Eigen gegevens
                        </a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "challenge" || $currentPage == "challengeInfo")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/award.svg"); ?>
                            Uitdagingen
                        </a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "discussion")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/message-square.svg"); ?>
                            Gesprek
                        </a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "shop")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/shopping-bag.svg"); ?>
                            Winkel
                        </a>
                    </li>
                    <li class="nav-item col-2">
                        <a class="nav-link d-flex flex-column align-items-center subnav--icon <?php echo ($currentPage == "usagesettings")? "active": "";?>" href="#">
                            <?php echo file_get_contents("../img/Icons/36/settings.svg"); ?>
                            Instellingen
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php endif;?>
</div>