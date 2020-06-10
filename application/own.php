<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Battle.php");
    session_start();

    $pageTitle = "Eigen gegevens";

    if(isset($_GET['p']) && !empty($_GET['p'])){
      $requestedContent = htmlspecialchars($_GET['p']);
    }else{
      $requestedContent = "realtime";
    }

    try{
      include_once(__DIR__."/includes/userInfo.inc.php");
      //$themes = Theme::getAllThemes();
      $completedChallenges = Challenge::getUserCompletedChallenge($userId); //Challenges that user already completed
    }catch(\Throwable $th){
      $error = $th->getMessage();
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
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger" role="alert">
            <strong>Pas op!</strong> <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <h2 class="mb-4">Eigen gegevens</h2>
        <div class="row mb-3">
          <div class="col-md-8 order-2 order-md-1">
            <?php 
              if($requestedContent == "impact"):
              
                include_once(__DIR__.'/includes/own/environmentImpact.php');
                
              else:
              
                include_once(__DIR__.'/includes/own/realtimeData.php');
                
              endif; 
            ?>
          </div>
          <div class="col-md-4 mb-3 order-1">
            <div class="card shadow mb-4">
              <div class="card-body">
                <h3 class="card-title">Profiel</h3>
                <div class="media">
                  <img class="mr-3 avatar rounded-circle" src="../img/avatar/default.png" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0"><?php echo (!empty($fullName))? $fullName: "[Naam gebruiker]"; ?></h5>
                    <?php echo (!empty($userCityInfo))? ucfirst(strtolower($userCityInfo['name'])): "[locatie]"; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow">
              <div class="card-body">
                <h3 class="card-title">Prestaties</h3>
                <div class="media border mb-3 rounded text-center d-flex align-items-center">
                  <img class="mr-3 avatar rounded-circle" src="../img/avatar/default.png" alt="Icon">
                  <div class="media-body">
                    Voltooide uitdagingen
                    <h5>10</h5>
                  </div>
                </div>
                <a href="#meerPrestaties" class="btn btn-block btn-outline-gresident">Toon meer prestaties</a>
                <a href="#voetafdruk" class="btn btn-gresident btn-block">Bereken voetafdruk</a>
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