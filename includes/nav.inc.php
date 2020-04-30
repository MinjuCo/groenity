<nav class="navbar navbar-expand-lg static-top">
    <div class="container-lg">
        <a class="navbar-brand" href="index.php">
            <img src="img/groenity-logo.svg" alt="logo-groenity">
        </a>
        <!--responsive button-->
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
            if (isset($_SESSION["user"])) {
                include_once('includes/nav-private.inc.php');
            } else {
                include_once("includes/nav-public.inc.php");
            } ?>
        </div>
    </div>
</nav>