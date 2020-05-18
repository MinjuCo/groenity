<?php 
    $pageTitle = "Stad";
    $_SESSION['user'] = "Test";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?> 
<body>
    <?php
        //Navbar
        include_once(__DIR__."/../includes/nav.inc.php"); 
    ?>
    
    <div class="container application">
        <div class="row d-flex flex-column">
            <h2 class="mb-2">Stad</h2>
            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active rounded-pill" id="pills-city-tab" data-toggle="pill" href="#pills-city" role="tab" aria-controls="pills-city" aria-selected="true">Mijn stad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-explore-tab" data-toggle="pill" href="#pills-explore" role="tab" aria-controls="pills-explore" aria-selected="false">Verkennen</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="tab-content col-md-9 card shadow-sm" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-city" role="tabpanel" aria-labelledby="pills-city-tab">...</div>
                <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">...</div>
            </div>
            <div class="col-md-3 card shadow-sm">
                ...
            </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>