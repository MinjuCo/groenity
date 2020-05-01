<nav class="navbar navbar-expand-md fixed-top d-flex flex-row align-items-center">
    <div class="container-xl">
    <a class="navbar-brand" href="<?php echo ($currentPage == "index")? "index.php": "../index.php";?>">
        <img src="<?php echo ($currentPage == "index")? "img/": "../img/";?>groenity-logo.svg" alt="logo-groenity">
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