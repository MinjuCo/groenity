<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Battle.php");
    include_once(__DIR__."/../classes/User.php");

    $pageTitle = "Eigen gegevens";
    $_SESSION['user'] = "Test";
    $userId = 1;

    try{
      //$themes = Theme::getAllThemes();
      $completedChallenges = Challenge::getUserCompletedChallenge($userId); //Challenges that user already completed
    }catch(\Throwable $th){
      $error = $th->getMessage();
      echo $error;
    }
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
        <h2 class="mb-4">Eigen gegevens</h2>
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active rounded-pill" id="pills-impact-tab" data-toggle="pill" href="#pills-impact" role="tab" aria-controls="pills-impact" aria-selected="true">Bekijk milieu-impact</a>
          </li>
        </ul>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Real-time gegevens</h3>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active rounded-pill" id="pills-energy-tab" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-energy" aria-selected="true">Energie</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link rounded-pill" id="pills-water-tab" data-toggle="pill" href="#pills-water" role="tab" aria-controls="pills-water" aria-selected="false">Water</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link rounded-pill disabled" id="pills-soundlevel-tab" data-toggle="pill" href="#pills-level" role="tab" aria-controls="pills-soundlevel" aria-selected="false">Geluidsniveau</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link rounded-pill disabled" id="pills-waste-tab" data-toggle="pill" href="#pills-waste" role="tab" aria-controls="pills-waste" aria-selected="false">Afval</a>
                  </li>
                </ul>
                <div class="tab-content" id="themeContent">
                  <div class="tab-pane fade show active" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab">
                    <?php include_once(__DIR__."/includes/own/energyCategory.php"); ?>
                  </div>
                  <div class="tab-pane fade" id="pills-water" role="tabpanel" aria-labelledby="pills-water-tab">...</div>
                  <div class="tab-pane fade" id="pills-soundlevel" role="tabpanel" aria-labelledby="pills-soundlevel-tab">...</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Profiel</h3>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>