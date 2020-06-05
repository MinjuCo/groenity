<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Battle.php");
    include_once(__DIR__."/../classes/User.php");

    $pageTitle = "Eigen gegevens";
    $_SESSION['user'] = "Test";
    $userId = 1;

    if(isset($_GET['p']) && !empty($_GET['p'])){
      $requestedContent = htmlspecialchars($_GET['p']);
    }else{
      $requestedContent = "realtime";
    }

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
        <div class="row mb-3">
          <div class="col-md-8">
            <?php 
              if($requestedContent == "impact"):
              
                include_once(__DIR__.'/includes/own/environmentImpact.php');
                
              else:
              
                include_once(__DIR__.'/includes/own/realtimeData.php');
                
              endif; 
            ?>
          </div>
          <div class="col-md-4">
            <div class="card shadow">
              <div class="card-body">
                <h3 class="card-title">Profiel</h3>
                <div class="media">
                  <img class="mr-3 avatar rounded-circle" src="../img/default.png" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0">[Naam gebruiker]</h5>
                    [locatie]
                  </div>
                </div>
              </div>
            </div>
            <?php if($requestedContent == "impact"):?>
              <a href="own.php" class="btn btn-block my-4">Volg real-time op</a>
            <?php else:?>
              <a href="?p=impact" class="btn btn-block my-4">Bekijk milieu-impact</a>
            <?php endif;?>
            <div class="card shadow">
              <div class="card-body">
                <h3 class="card-title">Prestaties</h3>
                <div class="media border mb-3 rounded text-center d-flex align-items-center">
                  <img class="mr-3 avatar rounded-circle" src="../img/default.png" alt="Icon">
                  <div class="media-body">
                    Voltooide uitdagingen
                    <h5>10</h5>
                  </div>
                </div>
                <a href="#meerPrestaties" class="btn btn-block btn-secondary">Toon meer prestaties</a>
                <a href="#voetafdruk" class="btn btn-block">Bereken voetafdruk</a>
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