<div class="col-12">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="font-weight-bold">Doel</h4>
      <ul>
        <li class="card-text">
          <?php echo htmlspecialchars($challengeGoals); ?>
        </li>
      </ul>
      <?php if($challengeCompleted['isWinner']):?>
      <div class="d-flex w-50 flex-column justify-content-center m-auto">
        <img src="../img/Visuals/winner.svg" alt="Winnaar" class="w-100 my-3">
        <h4 class="text-center font-weight-bold"><?php echo ($challenge['is_battle'])? "Je hebt gewonnen":"Je hebt de uitdaging voltooid"; ?></h4>
      </div>
      <?php endif;?>
      <div class="form-group">
        <label for="giveTips">Geef een tip voor je succes</label>
        <div class="input-group mb-4">
          <input type="text" class="form-control" name="giveTips" id="giveTips" aria-describedby="button-giveTips">
          <div class="input-group-append">
            <button class="btn btn-gresident" type="button" id="button-giveTips">Verzenden</button>
          </div>
        </div>
      </div>
      <h4>Tips</h4>
      <hr class="w-100">
      <div class="media">
        <img src="../img/avatar/elsJanssens.svg" class="mr-3 avatar rounded-circle" alt="Els Janssens avatar">
        <div class="media-body">
          <h5 class="mt-0 font-weight-bold">Els Janssens</h5>
          Laad het overdag.
        </div>
      </div>
    </div>
  </div>
</div>