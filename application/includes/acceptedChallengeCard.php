<div class="col-12">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Doel</h4>
      <p class="card-text">
        <?php echo htmlspecialchars($challenge['goals']); ?>
      </p>
      <?php if($challenge['is_battle']):
          $battleInfo = Battle::getUserBattleChallenge($userId, $challenge['id']);
        ?>
        <div class="row text-center">
          <div class="col-5">
            <?php echo htmlspecialchars($battleInfo['participator_one']);?>
          </div>
          <div class="col-2">
            <h4>vs</h4>
          </div>
          <div class="col-5">
            <?php echo htmlspecialchars($battleInfo['participator_two']);?>
          </div>
        </div>
      <?php endif;?>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>