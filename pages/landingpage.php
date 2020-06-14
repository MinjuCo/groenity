<section class="intro landingSection d-flex flex-column flex-md-row align-items-md-center" id="intro">
  <div class="container-xl">
    <div class="row d-flex">
      <div class="col-md-6 intro_text">
        <h1>Maak je stad nog groener</h1>
        <p>Jij betekent veel in onze strijd voor een ecologische samenleving! </p>
      </div>
      <div class="col-md-6 py-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4>Vul je thuisadres in</h4>
   
            <form action="api/setSession.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-9">
                  <label for="street">Straatnaam</label>
                  <input type="text" class="form-control" id="street" name="street">
                </div>
                <div class="form-group col-md-3">
                  <label for="streetNr">Nr</label>
                  <input type="text" class="form-control" id="streetNr" name="streetNr">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="city">Stad of gemeente</label>
                  <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group col-md-4 d-flex align-items-end">
                  <input type="button" class="btn btn-gresident form-control" id="findAddress" name="" value="Gratis deelnemen">
                </div>
              </div>
            </form>
            <!-- ERROR display -->
        
            <p class="form__error text-danger hidden" id="addressError">We hebben je adres niet teruggevonden. Gelieve het juiste adres in te geven.</p>
            <hr>
            <p class="text-center">Reeds lid? <a class="link-gn" href="pages/login.php">Meld je hier aan</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="landingSection d-flex flex-column flex-md-row align-items-md-center">
  <div class="container-xl">
    <div class="row d-flex">
      <div class="col-md-6">
        <img src="img/Visuals/environment_impact.svg" alt="Bewustzijn over milieu-impact">
      </div>
      <div class="col-md-6 align-self-center">
        <h2>Wat weet jij over jouw impact op het milieu?</h2>
        <p>
          Op Groenity krijg je informatie over de invloed dat je hebt op het milieu aan de hand van je gegevens en verbruik.
          Daarnaast worden er ook tips en inspiratie gegeven om je levensstijl ecologischer te maken en je kosten te verminderen.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="landingSection d-flex flex-column flex-md-row align-items-md-center">
  <div class="container-xl">
    <div class="row d-flex">
      <div class="col-md-6 align-self-center">
        <h2>Haalt jouw stad de eerste plaats?</h2>
        <p>
          Daag jezelf uit missies te volbrengen om Groenity coins te verdienen voor je stad.
          Groenity coins geven weer hoe ecologisch jouw stad is en kunnen later omgewisseld worden voor milieubewuste projecten.
        </p>
      </div>
      <div class="col-md-6">
        <img src="img/Visuals/winner.svg" alt="Winnaars">
      </div>
    </div>
  </div>
</section>
<section class="landingSection d-flex flex-column flex-md-row align-items-md-center">
  <div class="container-xl">
    <div class="row d-flex">
      <div class="col-md-6">
        <img src="img/Visuals/discussions.svg" alt="Gesprek met experts">
      </div>
      <div class="col-md-6 align-self-center">
        <h2>Heb je een geweldig idee of zit je met een vraag?</h2>
        <p>
          Bij Groenity krijgen de gebruikers de kans om hun vragen of ideeën te bespreken met milieuspecialisten.
          Geef een seintje dat je een deskundige nodig hebt en laat een berichtje met je contactgegevens achter.
          Een expert probeert dan zo snel mogelijk een gesprek met jou in te plannen.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="landingSection d-flex flex-column flex-md-row align-items-md-center">
  <div class="container-xl">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7 text-center">
        <h2>Zal je er in slagen om je stad aan de top te krijgen?</h2>
        <a href="#intro" class="btn btn-gresident">Deelnemen</a>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-7 text-center">
        <img class="img-fluid" src="img/Visuals/nature.svg" alt="Wandeling in de natuur">
      </div>
    </div>
  </div>
</section>
<div id="jsLoad"></div>