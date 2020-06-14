<div class="col-md-8">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Beschrijving</h4>
      <p class="card-text">
        <?php echo htmlspecialchars($challenge['description']); ?>
      </p>
      <h4>Doel</h4>
      <ul class="card-text">
        <li><?php echo $challengeGoals; ?></li>
      </ul>
      <h4>Meer info</h4>
      <p class="card-text">
        <a href="<?php echo htmlspecialchars($challenge['extra_info']); ?>"><?php echo htmlspecialchars($challenge['extra_info']); ?></a>
      </p>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4>Beloning</h4>
      <p>
        <?php foreach($rewards as $reward){
          if($reward == 1){
            echo '<div class="mb-3">
            <div class="d-flex flex-column rounded align-items-center border-gresident-lightgreen p-2">
              <div class="link-gn">'.file_get_contents("../img/Icons/48/zap.svg").'
              </div>
              <span>Daling energieverbruik</span>
              <h5 class="font-weight-bold link-gn">Tot 150kW</h5>
            </div>
        </div>';
          }

          if($reward == 2){
            echo '<div class="mb-3">
            <div class="d-flex flex-column rounded align-items-center border-gresident-lightgreen p-2">
              <div class="link-gn">'.file_get_contents("../img/Icons/48/dollar-sign.svg").'
              </div>
              <span>Geld besparing</span>
              <h5 class="font-weight-bold link-gn">€ 120 per jaar</h5>
            </div>
        </div>';
          }
        } ?>
      </p>
    </div>
  </div>
</div>