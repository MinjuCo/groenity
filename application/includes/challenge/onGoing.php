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
    <?php if(!empty($challenges)):
        foreach($challenges as $challenge):
        $challengeInfo = Challenge::getChallengeInfo($challenge['challenge_id']);
        $userInQueue = ($challengeInfo['is_battle'] && Challenge::challengeAlreadyAccepted($userId, $challengeInfo['id'], $challengeInfo['is_battle']))? true:false;
        ?>
        <div class="row mb-3">
          <div class="card col-12">
            <div class="card-body">
              <h4>
                <?php echo htmlspecialchars($challengeInfo["title"]);?>
                <span class="ml-2 badge badge-<?php echo ($userInQueue)? "warning":"success"; ?>">
                  <?php echo ($userInQueue)? "In wacht":"Bezig"; ?>
                </span>
                <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challengeInfo["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
              </h4>
              <p><?php echo substr(htmlspecialchars($challengeInfo["description"]),0,300)."...";?></p>
              <div class="action-buttons d-flex flex-row-reverse float-right">
                <?php if($userInQueue):?>
                  <a href="#" class="btn btn-gresident ml-2">Annuleren</a>
                  <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challengeInfo['id']);?>" class="btn btn-gresident">Meer info</a>
                <?php else: 
                  if($challengeInfo['is_battle'] == false):
                ?>
                  <form action="" method="post">
                    <input type="hidden" name="challenge" value="<?php echo $challengeInfo['id'] ?>">
                    <input type="submit" value="Voltooien" class="btn btn-gresident ml-2">
                  </form>
                <?php endif; ?>
                  <a href="challengeInfo.php?challenge=<?php echo $challengeInfo['id']; ?>" class="btn btn-gresident ml-2">Details</a>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
      else: ?>
      <div class="card col-12 mb-3">
        <div class="card-body text-center">
          <img src="../img/Visuals/discussions.svg" alt="Accepteer uitdagingen" class="col-md-3 col-sm-6">
          <h3 class="text-center">U hebt nog geen uitdagingen aangegaan</h3>
          <a href="?content=todo" class="btn btn-gresident my-3">Voer uitdagingen uit</a>
        </div>
      </div>
    <?php endif; ?>
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
                <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
              </h4>
              <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
              <div class="action-buttons d-flex flex-row-reverse float-right">
                  <a href="#" class="btn btn-gresident ml-2">Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
    else: ?>
      <div class="card col-12 mb-3">
        <div class="card-body text-center">
          <img src="../img/Visuals/discussions.svg" alt="Accepteer uitdagingen" class="col-md-3 col-sm-6">
          <h3 class="text-center">U hebt nog geen 1vs1 uitdagingen aangegaan</h3>
          <a href="?content=todo" class="btn btn-gresident my-3">Voer uitdagingen uit</a>
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
                <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
              </h4>
              <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
              <div class="action-buttons d-flex flex-row-reverse float-right">
                  <a href="#" class="btn btn-gresident ml-2">Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
    else: ?>
      <div class="card col-12 mb-3">
        <div class="card-body text-center">
          <img src="../img/Visuals/discussions.svg" alt="Accepteer uitdagingen" class="col-md-3 col-sm-6">
          <h3 class="text-center">U hebt nog geen zelfstandig uitdagingen aangegaan</h3>
          <a href="?content=todo" class="btn btn-gresident my-3">Voer uitdagingen uit</a>
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
                <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
              </h4>
              <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
              <div class="action-buttons d-flex flex-row-reverse float-right">
                  <a href="#" class="btn btn-gresident ml-2">Annuleren</a>
                  <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn btn-gresident">Meer info</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
    else: ?>
      <div class="card col-12 mb-3">
        <div class="card-body text-center">
          <img src="../img/Visuals/discussions.svg" alt="Accepteer uitdagingen" class="col-md-3 col-sm-6">
          <h3 class="text-center">U hebt nog geen uitdagingen in wachtlijst staan</h3>
          <a href="?content=todo" class="btn btn-gresident my-3">Voer uitdagingen uit</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>