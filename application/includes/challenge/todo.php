<?php foreach($challenges as $challenge):?>
  <div class="row mb-3">
    <div class="card col-12">
      <div class="card-body">
        <h4>
          <?php echo htmlspecialchars($challenge["title"]);?>
          <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
        </h4>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo ($challenge['is_battle'])? "1vs1 ": "Zelfstandig ";?>uitdaging</h6>
        <p><?php echo substr(htmlspecialchars($challenge["description"]),0,300)."...";?></p>
        <div class="action-buttons d-flex flex-row-reverse float-right">
          <button class="btn btn-gresident btn-participate ml-2" data-challengeid="<?php echo htmlspecialchars($challenge['id']);?>">Deelnemen</button>
          <a href="challengeInfo.php?challenge=<?php echo htmlspecialchars($challenge['id']);?>" class="btn btn-gresident">Meer info</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>