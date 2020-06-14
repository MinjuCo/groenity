<?php 
  if(!empty($challenges)):
    foreach($challenges as $challenge):
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
          <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['challenge_id']);?>" class="btn btn-gresident">Bekijk resultaat</a>
        </div>
      </div>
    </div>
  </div>
<?php 
    endforeach;
  else: ?>
    <div class="card col-12 mb-3">
      <div class="card-body text-center">
        <img src="../img/Visuals/winner.svg" alt="Accepteer uitdagingen" class="col-md-3 col-sm-6">
        <h3 class="text-center">U hebt nog geen uitdagingen voltooid</h3>
        <a href="?content=onGoing" class="btn btn-gresident my-3">Mijn lopende uitdagingen bekijken</a>
      </div>
    </div>
<?php endif; ?>