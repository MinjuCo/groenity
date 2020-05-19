<?php
$pageTitle = "Instellingen";
$_SESSION['user'] = "Test";
$userId = 1;

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
        <div class="row d-flex flex-column">
            <h2 class="mb-4">Instellingen</h2>
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active rounded-pill" id="pills-algemeen-tab" data-toggle="pill" href="#pills-algemeen" role="tab" aria-controls="pills-algemeen" aria-selected="true">Algemeen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill" id="pills-meters-tab" data-toggle="pill" href="#pills-meters" role="tab" aria-controls="pills-meters" aria-selected="false">Meters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill" id="pills-gegevens-tab" data-toggle="pill" href="#pills-gegevens" role="tab" aria-controls="pills-gegevens" aria-selected="false">Gegevens importeren</a>
                </li>
            </ul>
        </div>
        <div class="tab-content col-md-10 card shadow-sm" id="pills-tabContent">

            <div id="pills-algemeen" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-algemeen-tab">
                <?php include_once(__DIR__ . "/../includes/instellingenAlgemeen.inc.php"); ?>
            </div>

            <div id="pills-meters" class="tab-pane fade" role="tabpanel" aria-labelledby="pills-meters-tab">
            
                <?php include_once(__DIR__ . "/../includes/instellingenMeters.inc.php"); ?>
            </div>
            
        </div>
    </div>
    </div>
    </div>
    <?php
    //Footer + scripts
    include_once(__DIR__ . "/../includes/footer.inc.php");
    ?>


    <script>
// display only active
$('#pills-tab a').on('click', function (e) {
  e.preventDefault();
  $('#pills-meters').tab('show');
console.log(this);

});
    </script>
</body>

</html>