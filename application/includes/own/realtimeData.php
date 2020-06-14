<div class="card shadow">
  <div class="card-body">
    <h3 class="card-title d-flex align-items-center justify-content-between">
      Real-time gegevens
      <a href="?p=impact" class="btn btn-gresident">Bekijk milieu-impact</a>
    </h3>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active rounded-pill" id="pills-energy-tab" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-energy" aria-selected="true">Energie</a>
      </li>
      <li class="nav-item">
          <a class="nav-link rounded-pill disabled" id="pills-water-tab" data-toggle="pill" href="#pills-water" role="tab" aria-controls="pills-water" aria-selected="false">Water</a>
      </li>
      <li class="nav-item">
          <a class="nav-link rounded-pill disabled" id="pills-soundlevel-tab" data-toggle="pill" href="#pills-level" role="tab" aria-controls="pills-soundlevel" aria-selected="false">Geluidsniveau</a>
      </li>
      <li class="nav-item">
          <a class="nav-link rounded-pill disabled" id="pills-waste-tab" data-toggle="pill" href="#pills-waste" role="tab" aria-controls="pills-waste" aria-selected="false">Afval</a>
      </li>
    </ul>
    <div class="tab-content" id="themeContent">
      <div class="tab-pane fade show active" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab">
        <ul class="nav nav-pills categories mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-daily-tab" data-toggle="pill" href="#pills-daily" role="tab" aria-controls="pills-daily" aria-selected="true">Dagelijks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="pills-weekly-tab" data-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-weekly" aria-selected="false">Wekelijks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="pills-monthly-tab" data-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="false">Maandelijks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="pills-yearly-tab" data-toggle="pill" href="#pills-yearly" role="tab" aria-controls="pills-yearly" aria-selected="false">Jaarlijks</a>
          </li>
        </ul>
        <div class="tab-content" id="timeContent">
          <div class="tab-pane fade show active" id="pills-daily" role="tabpanel" aria-labelledby="pills-daily-tab">
            <h4>Dagelijks energieverbruik</h4>
            <div id="visualization">(grafiek)</div>
          </div>
          <div class="tab-pane fade" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
            <h4>Wekelijks energieverbruik</h4>
          </div>
          <div class="tab-pane fade" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
            <h4>Maandelijks energieverbruik</h4>
          </div>
          <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
            <h4>Jaarlijks energieverbruik</h4>
          </div>
        </div>
        <h4>Limiet instellen</h4>
        <p>Wanneer je een limiet insteld verschijnt er een rode lijn op de hoogte van je ingestelde maximum verbruik. 
          Indien er kans is dat je verbruik bijna de maximum grens bereikt, zal je een notificatie krijgen.</p>
        <form action="" method="post">
          <div class="form-group">
            <label for="maxLimit">Maximum verbruik</label>
            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="Geef het maximum verbruik in waarbij je verwittigd wilt worden" id="maxLimit" name="maxLimit">
              <div class="input-group-append">
                <input type="submit" class="btn btn-gresident" value="Stel verbruik in" name="submitLimitEnergy">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="pills-water" role="tabpanel" aria-labelledby="pills-water-tab">...</div>
      <div class="tab-pane fade" id="pills-soundlevel" role="tabpanel" aria-labelledby="pills-soundlevel-tab">...</div>
    </div>
  </div>
</div>