<?php
$pageTitle = "Live kaart";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
    <?php
    //Navbar
    include_once(__DIR__ . "/../includes/nav.inc.php");
    ?>
    <div class="container application">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4 card shadow-sm mb-4" id="">
                <div class="card-body">
                    <form action="post" class="form-inline justify-content-center">
                        <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="Bv 2800 of Mechelen ">
                        <input type="submit" value="Zoeken" class="btn form-control ">
                    </form>
                    <div class="row mt-2">
                        <h3 class="mb-2">Leaderboard</h3>
                    </div>
                    <div class="row mt-0 d-flex justify-content-between ">
                        <div class="col-2 mb-0">
                            <p>#</p>
                        </div>
                        <div class="col-3 mb-0">
                            <p>ZIP</p>
                        </div>
                        <div class="col-4 mb-0">
                            <p>STAD</p>
                        </div>
                        <div class="col-3 mb-0">
                            <img src="../img/g_coins.svg" alt="coin" class="mr-3 ml-3">
                        </div>
                    </div>
                    <!-- Leaderboard -->
                    <?php for ($i = 1; $i < 17; $i++) { ?>
                        <div class="row mt-0 d-flex justify-content-between">
                            <div class="col-2 mb-1">
                                <p class="font-weight-bold mb-1"><?php echo $i; ?></p>
                            </div>
                            <div class="col-3 mb-1">
                                <p class="mb-1">1000</p>
                            </div>
                            <div class="col-4 mb-1">
                                <p class="mb-1">Voorbeeld</p>
                            </div>
                            <div class="col-3">
                                <p class="mb-1 live-kaart-p">1000</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 card shadow-sm mb-4">
                <div class="card-body d-flex justify-content-center align-items-center">
                        <?php include_once(__DIR__ . "/../includes/live-map.inc.php") ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    //Footer + scripts
    include_once(__DIR__ . "/../includes/footer.inc.php");
    ?>
</body>

</html>