<div class="row mb-4">
  <div class="col-md-8">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="card-title d-flex align-items-center justify-content-between">
          Real-time gegevens
          <a href="?content=impact" class="btn btn-gresident">Bekijk milieu-impact</a>
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
                <a class="nav-link" id="pills-monthly-tab" data-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="false">Maandelijks</a>
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
                <canvas id="myChart" width="400" height="200"></canvas>
              </div>
              <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
                <h4>Jaarlijks energieverbruik</h4>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-water" role="tabpanel" aria-labelledby="pills-water-tab">Coming soon</div>
          <div class="tab-pane fade" id="pills-soundlevel" role="tabpanel" aria-labelledby="pills-soundlevel-tab">Coming soon</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="card-title">Prestaties</h3>
        <div class="row mb-3">
          <div class="col-6">
              <div class="d-flex flex-column rounded align-items-center border-gresident-lightgreen p-2">
                <div class="thumb-48 p-1">
                  <?php echo file_get_contents("../img/g_coins.svg"); ?>
                </div>
                <span>Groene punten</span>
                <h5 class="font-weight-bold link-gn">2000</h5>
              </div>
          </div>
          <div class="col-6">
              <div class="d-flex flex-column rounded align-items-center border-gresident-lightgreen p-2">
                <div class="link-gn">
                  <?php echo file_get_contents("../img/Icons/48/trending-up.svg"); ?>
                </div>
                <span>Verbetering</span>
                <h5 class="font-weight-bold link-gn">5%</h5>
              </div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center border-gresident-lightgreen rounded p-2">
              <div class="link-gn w-25 d-flex justify-content-center mx-4">
                <?php echo file_get_contents("../img/Icons/48/leaderboard.svg"); ?>
              </div>
              <div class="w-75">
                  <span>Leaderboard</span>
                  <h5 class="font-weight-bold link-gn">12</h5>
              </div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center border-gresident-lightgreen rounded p-2">
              <div class="link-gn w-25 d-flex justify-content-center mx-4">
                <?php echo file_get_contents("../img/Icons/48/users.svg"); ?>
              </div>
              <div class="w-75">
                  <span>Aantal inwoners</span>
                  <h5 class="font-weight-bold link-gn">12</h5>
                  <span>Actieve inwoners</span>
                  <h5 class="font-weight-bold link-gn">12</h5>
              </div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center border-gresident-lightgreen rounded p-2">
              <div class="link-gn w-25 d-flex justify-content-center mx-4">
                <?php echo file_get_contents("../img/Icons/48/award.svg"); ?>
              </div>
              <div class="w-75">
                  <span>Voltooide uitdagingen</span>
                  <h5 class="font-weight-bold link-gn">1200</h5>
              </div>
          </div>
        </div>

        <a href="#" class="btn btn-outline-gresident btn-block">Toon meer</a>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="card-title">Top Gresidents</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card rounded border-gresident-lightgreen">
                      <div class="card-body p-2">
                        <!-- Media block -->
                        <div class="media">
                          <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                          <div class="media-body p-2">
                            <h6 class="mt-0">Marie</h6>
                            <span class="link-gn">Antwerpen<span>
                          </div>
                        </div>
                        <!-- /end Media block -->
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <a href="#" class="align-self-center btn btn-outline-gresident btn-block py-5"><h4>9 +</h4> Laad meer</a>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>
