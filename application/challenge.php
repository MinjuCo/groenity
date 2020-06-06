<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Battle.php");

    $pageTitle = "Uitdaging";
    $_SESSION['user'] = "Test";
    $userId = 1;

    try{
      //$themes = Theme::getAllThemes();
      $todoChallenges = Challenge::getUserTodoChallenges($userId); //Challenges which user still has to do
      $onGoingChallenges = Challenge::getUserOngoingChallenges($userId); //All challenges that were accepted and are still going on
      $completedChallenges = Challenge::getUserCompletedChallenge($userId); //Challenges that user already completed

      $battleChallenges = Challenge::getUserCategorizedChallenges("battle", $userId); //Get user battles
      $singleChallenges = Challenge::getUserCategorizedChallenges("single", $userId); //Get user own challenges
      $queuedChallenges = Challenge::getUserCategorizedChallenges("queue", $userId); //Get user queued challenges
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
        <h2 class="mb-4">Uitdagingen</h2>
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active rounded-pill" id="pills-ongoingChallenges-tab" data-toggle="pill" href="#pills-ongoingChallenges" role="tab" aria-controls="pills-ongoingChallenges" aria-selected="true">Lopende uitdagingen</a>
          </li>
          <li class="nav-item">
              <a class="nav-link rounded-pill" id="pills-todoChallenges-tab" data-toggle="pill" href="#pills-todoChallenges" role="tab" aria-controls="pills-todoChallenges" aria-selected="false">Beschikbare uitdagingen</a>
          </li>
          <li class="nav-item">
              <a class="nav-link rounded-pill" id="pills-completedChallenges-tab" data-toggle="pill" href="#pills-completedChallenges" role="tab" aria-controls="pills-completedChallenges" aria-selected="false">Historiek</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-ongoingChallenges" role="tabpanel" aria-labelledby="pills-ongoing-tab">
              <ul class="nav nav-pills categories mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Alles</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-duel-tab" data-toggle="pill" href="#pills-duel" role="tab" aria-controls="pills-duel" aria-selected="false">Duel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-single-tab" data-toggle="pill" href="#pills-single" role="tab" aria-controls="pills-single" aria-selected="false">Zelfstandig</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-queue-tab" data-toggle="pill" href="#pills-queue" role="tab" aria-controls="pills-queue" aria-selected="false">In wacht</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                  <?php if(!empty($onGoingChallenges)):
                     foreach($onGoingChallenges as $onGoingChallenge):
                      $challenge = Challenge::getChallengeInfo($onGoingChallenge['challenge_id']);
                      $userInQueue = ($challenge['is_battle'] && Challenge::challengeAlreadyAccepted($userId, $challenge['id'], $challenge['is_battle']))? true:false;
                     ?>
                      <div class="row mb-3">
                        <div class="card col-12">
                          <div class="card-body">
                            <h4>
                              <?php echo htmlspecialchars($challenge["title"]);?>
                              <span class="ml-2 badge badge-<?php echo ($userInQueue)? "warning":"success"; ?>">
                                <?php echo ($userInQueue)? "In wacht":"Bezig"; ?>
                              </span>
                              <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
                            </h4>
                            <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                            <div class="action-buttons d-flex flex-row-reverse float-right">
                              <?php if($userInQueue):?>
                                <a href="#" class="btn ml-2">Annuleren</a>
                                <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn">Meer info</a>
                              <?php else: ?>
                                <a href="#" class="btn ml-2">Details</a>
                              <?php endif;?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;
                  endif; ?>
                </div>
                <div class="tab-pane fade" id="pills-duel" role="tabpanel" aria-labelledby="pills-duel-tab">
                  <?php if(!empty($battleChallenges)):
                     foreach($battleChallenges as $challenge):
                     ?>
                      <div class="row mb-3">
                        <div class="card col-12">
                          <div class="card-body">
                            <h4>
                              <?php echo htmlspecialchars($challenge["title"]);?>
                              <span class="ml-2 badge badge-success">
                                Bezig
                              </span>
                              <span class="badge float-right coins">
                                <?php echo htmlspecialchars($challenge["green_points"]);?>
                              </span>
                            </h4>
                            <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                            <div class="action-buttons d-flex flex-row-reverse float-right">
                                <a href="#" class="btn ml-2">Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;
                  else: ?>
                    <div class="card col-12 empty">
                      <div class="card-body">
                        <h3 class="text-center">U hebt nog geen duel uitdagingen aangegaan</h3>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="pills-single" role="tabpanel" aria-labelledby="pills-single-tab">
                  <?php if(!empty($singleChallenges)):
                     foreach($singleChallenges as $challenge):
                     ?>
                      <div class="row mb-3">
                        <div class="card col-12">
                          <div class="card-body">
                            <h4>
                              <?php echo htmlspecialchars($challenge["title"]);?>
                              <span class="ml-2 badge badge-success">
                                Bezig
                              </span>
                              <span class="badge float-right coins">
                                <?php echo htmlspecialchars($challenge["green_points"]);?>
                              </span>
                            </h4>
                            <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                            <div class="action-buttons d-flex flex-row-reverse float-right">
                                <a href="#" class="btn ml-2">Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;
                  else: ?>
                    <div class="card col-12 empty">
                      <div class="card-body">
                        <h3 class="text-center">U hebt nog geen zelfstandige uitdagingen aangegaan</h3>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="pills-queue" role="tabpanel" aria-labelledby="pills-queue-tab">
                  <?php if(!empty($queuedChallenges)):
                     foreach($queuedChallenges as $challenge):
                     ?>
                      <div class="row mb-3">
                        <div class="card col-12">
                          <div class="card-body">
                            <h4>
                              <?php echo htmlspecialchars($challenge["title"]);?>
                              <span class="ml-2 badge badge-warning">
                                In wacht
                              </span>
                              <span class="badge float-right coins">
                                <?php echo htmlspecialchars($challenge["green_points"]);?>
                              </span>
                            </h4>
                            <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                            <div class="action-buttons d-flex flex-row-reverse float-right">
                                <a href="#" class="btn ml-2">Annuleren</a>
                                <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn">Meer info</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;
                  else: ?>
                    <div class="card col-12 empty">
                      <div class="card-body">
                        <h3 class="text-center">U hebt nog geen uitdagingen in wachtlijst staan</h3>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-todoChallenges" role="tabpanel" aria-labelledby="pills-todoChallenges-tab">
              <?php foreach($todoChallenges as $challenge):?>
                <div class="row mb-3">
                  <div class="card col-12">
                    <div class="card-body">
                      <h4>
                        <?php echo htmlspecialchars($challenge["title"]);?>
                        <span class="badge float-right coins">
                          <?php echo htmlspecialchars($challenge["green_points"]);?>
                        </span>
                      </h4>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo ($challenge['is_battle'])? "1vs1 ": "Zelfstandig ";?>uitdaging</h6>
                      <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                      <div class="action-buttons d-flex flex-row-reverse float-right">
                        <button class="btn btn-participate ml-2" data-challengeid="<?php echo htmlspecialchars($challenge['id']);?>">Deelnemen</button>
                        <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn">Meer info</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="tab-pane fade" id="pills-completedChallenges" role="tabpanel" aria-labelledby="pills-completedChallenges-tab">
              <?php 
                if(!empty($completedChallenges)):
                  foreach($completedChallenges as $challenge):
              ?>
                <div class="row mb-3">
                  <div class="card col-12">
                    <div class="card-body">
                      <h4>
                        <?php echo htmlspecialchars($challenge["title"]);?>
                        <span class="badge float-right badge-pill badge-<?php echo (htmlspecialchars($challenge['isWinner']))? "success":"danger";?>">
                          <?php echo (htmlspecialchars($challenge['isWinner']))? "Gewonnen":"Verloren";?>
                        </span>
                      </h4>
                      <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
                      <div class="action-buttons d-flex flex-row-reverse float-right">
                        <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['challenge_id']);?>" class="btn">Bekijk details</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
                  endforeach; 
                endif;
              ?>
            </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>