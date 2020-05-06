<?php
$pageTitle = "Eigen gegevens";
$_SESSION["user"] = "Test";
?>

<!DOCTYPE html>
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
    <?php
    //Navbar
    include_once(__DIR__ . "/../includes/nav.inc.php");
    ?>

    <div class="container application">
        <div class="row d-flex flex-column">
            <h2 class="mb-2">Eigen gegevens</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Real-time gegevens</h3>
                    </div>
                    <div class="col-mid-1 float-right">
                        <a href="#" class="btn btn-block">Bekijk milieu-impact</a>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content col-md-1 card shadow-sm" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-city" role="tabpanel" aria-labelledby="pills-city-tab">Energie</div>
                        <div class="tab-pane fade" id="pills-ex plore" role="tabpanel" aria-labelledby="pills-explore-tab">Water</div>
                        <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">Geluidsniveau</div>
                        <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">Afval</div>
                    </div>
                    <div class="col-md-3 card shadow-sm">
                        ...
                    </div>
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