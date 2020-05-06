<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Theme.php");

    $pageTitle = "Uitdaging";
    $_SESSION['user'] = "Test";
    $userId = 1;

    try{
      //$themes = Theme::getAllThemes();
      $allChallenges = Challenge::getAllChallenges();
      $userActiveChallenges = Challenge::getUserActiveChallenges($userId);
      $userParticipation = Challenge::getUserParticipations($userId);
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
        <h2 class="mb-4">Uitdaging</h2>
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <?php if(!empty($userActiveChallenges) || !empty($userParticipation)):?>

          <li class="nav-item">
              <a class="nav-link active rounded-pill" id="pills-ownChallenges-tab" data-toggle="pill" href="#pills-ownChallenges" role="tab" aria-controls="pills-ownChallenges" aria-selected="true">Mijn uitdagingen</a>
          </li>

          <?php endif;?>

          <?php if(!empty($allChallenges)):?>
          
          <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo (!empty($userActiveChallenges) || !empty($userParticipation))? "":"active";?>" id="pills-allChallenges-tab" data-toggle="pill" href="#pills-allChallenges" role="tab" aria-controls="pills-allChallenges" aria-selected="false">Alle uitdagingen</a>
          </li>

          <?php endif;?>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php if(!empty($userActiveChallenges) || !empty($userParticipation)):?>

            <div class="tab-pane fade show active" id="pills-ownChallenges" role="tabpanel" aria-labelledby="pills-ownChallenges-tab">
              
                <?php
                  /* Theme pills + div
                  
                    <ul class="nav nav-pills mb-3" id="pills-tab-themes" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Alles</a>
                      </li>

                      <?php 
                        //If themes are not empty show them as nav tabs
                        if(!empty($themes)): 
                          foreach($themes as $theme):
                      ?>

                      <li class="nav-item">
                        <a class="nav-link" id="pills-<?php echo $theme['name']; ?>-tab" data-toggle="pill" href="#pills-<?php echo $theme['name']; ?>" role="tab" aria-controls="pills-<?php echo $theme['name']; ?>" aria-selected="false"><?php echo $theme['name']; ?></a>
                      </li>

                      <?php 
                          endforeach;
                        endif;
                      ?>

                    </ul>
                    
                    <div class="tab-content" id="pills-tabContentThemes">
                      <div class="tab-pane fade show active p-3" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                      
                      </div>

                      <?php 
                        //If themes are not empty show them as nav tabs
                        if(!empty($themes)): 
                          foreach($themes as $theme):
                      ?>

                      <div class="tab-pane fade shadow-sm p-3" id="pills-<?php echo $theme['name']; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $theme['name']; ?>-tab">
                        ...
                      </div>

                      <?php 
                          endforeach;
                        endif;
                      ?>
                    </div>
                  */
                ?>
              <?php foreach($userActiveChallenges as $activeChallenge):?>
                <div class="row mb-3">
                  <div class="card col-12">
                    <div class="card-body">
                      <h4>
                        <?php echo htmlspecialchars($activeChallenge["title"]);?>
                        <span class="badge float-right coins">
                          <?php echo htmlspecialchars($activeChallenge["green_points"]);?>
                        </span>
                      </h4>
                      <p><?php echo substr(htmlspecialchars($activeChallenge["description"]),0,300)."...";?></p>
                      <div class="action-buttons d-flex flex-row-reverse float-right">
                        <a href="#" class="btn ml-2">Lopend</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

              <?php foreach($userParticipation as $participation):?>
                <div class="row mb-3">
                  <div class="card col-12">
                    <div class="card-body">
                      <h4>
                        <?php echo htmlspecialchars($participation["title"]);?>
                        <span class="badge float-right coins">
                          <?php echo htmlspecialchars($participation["green_points"]);?>
                        </span>
                      </h4>
                      <p><?php echo substr(htmlspecialchars($participation["description"]),0,300)."...";?></p>
                      <div class="action-buttons d-flex flex-row-reverse float-right">
                        <a href="#" class="btn ml-2 btn-warning">In wacht</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
                        
            </div>

            <?php endif;?>

            <?php if(!empty($allChallenges)):?>
            <div class="tab-pane fade <?php echo (!empty($userActiveChallenges) || !empty($userParticipation))? "":"show active";?>" id="pills-allChallenges" role="tabpanel" aria-labelledby="pills-allChallenges-tab">
              <?php foreach($allChallenges as $challenge):?>
                <div class="row mb-3">
                  <div class="card col-12">
                    <div class="card-body">
                      <h4>
                        <?php echo htmlspecialchars($challenge["title"]);?>
                        <span class="badge float-right coins">
                          <?php echo htmlspecialchars($challenge["green_points"]);?>
                        </span>
                      </h4>
                      <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                      <div class="action-buttons d-flex flex-row-reverse float-right">
                        <a href="#" class="btn ml-2">Deelnemen</a>
                        <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn">Meer info</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?php endif;?>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>