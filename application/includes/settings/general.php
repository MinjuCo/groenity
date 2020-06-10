<div class="card-header bg-darkblue">
  <h3 class="text-gresident-white mb-2">Algemeen instellingen</h3>
</div>
<form action="" method="post">
    <div class="card-body">
      <!-- User Referention -->
      <div class="usersReferention mb-3">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
            <h4 class="mb-0">Gebruikers met referentie</h4>
            <button class="btn btn-gresident">Gebruikers toevoegen</button>
        </div>

        <div class="d-flex flex-wrap mt-3">
          <div class="col-md-4 col-lg-3 mb-3">
            <div class="card rounded border-gresident-lightgreen">
              <div class="card-body p-2">
                <button type="button" class="close" data-toggle="modal" data-target="#confirm">
                  <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </button>
                <!-- Media block -->
                <div class="media">
                  <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                  <div class="media-body p-2">
                    <h6 class="mt-0">Marie Doe</h6>
                    <span class="role link-gn">Eigenaar<span>
                  </div>
                </div>
                <!-- /end Media block -->
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 mb-3">
            <div class="card rounded border-gresident-lightgreen">
              <div class="card-body p-2">
                <button type="button" class="close" data-toggle="modal" data-target="#confirm">
                  <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </button>
                <!-- Media block -->
                <div class="media">
                  <img src="../img/avatar/default.png" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                  <div class="media-body p-2">
                    <h6 class="mt-0">Marie Doe</h6>
                    <span class="role link-gn">Eigenaar<span>
                  </div>
                </div>
                <!-- /end Media block -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Construction year -->
      <div class="constructionYear mb-4">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
          <h4>Bouwjaar</h4>
          <input type="submit" name="submit_constructionYear" value="Aanpassen" class="btn btn-gresident">
        </div>
        <div class="form-group d-flex flex-column flex-md-row justify-content-center my-3">
          <div class="form-check form-check-inline col-md-2 col-xs-12 mb-3 mr-0 p-0 justify-content-center">
              <input class="form-check-input" type="radio" name="constructionYear" id="constructionYear1" value="< 1935">
              <label class="form-check-label" for="constructionYear1">Voor 1935</label>
          </div>
          <div class="form-check form-check-inline col-md-2 col-xs-12 mb-3 mr-0 p-0 justify-content-center">
              <input class="form-check-input" type="radio" name="constructionYear" id="constructionYear2" value="< 1965">
              <label class="form-check-label" for="constructionYear2">Voor 1965</label>
          </div>
          <div class="form-check form-check-inline col-md-2 col-xs-12 mb-3 mr-0 p-0 justify-content-center">
              <input class="form-check-input" type="radio" name="constructionYear" id="constructionYear3" value="< 2010">
              <label class="form-check-label" for="constructionYear3">Voor 2010</label>
          </div>
          <div class="form-check form-check-inline col-md-2 col-xs-12 mb-3 mr-0 p-0 justify-content-center">
              <input class="form-check-input" type="radio" name="constructionYear" id="constructionYear4" value="> 2010">
              <label class="form-check-label" for="constructionYear4">Na 2010</label>
          </div>
        </div>
      </div>
      <!-- TYPE residence -->
      <div class="residence mb-4">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
          <h4>Type woning</h4>
          <input type="submit" name="submit_residenceType" value="Aanpassen" class="btn btn-gresident">
        </div>
        <div class="form-group my-3">
          <div class="btn-group-toggle d-flex flex-column flex-md-row justify-content-center settings-toggle" data-toggle="buttons">
            <label class="btn font-weight-bold mx-5 active">
              <input type="radio" name="typeResidence" id="typeResidence1" value="apartement" checked>
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/apartment.svg"); ?>
              </div>
              Appartement
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeResidence" id="typeResidence2" value="closed_house">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/closed_house.svg"); ?>
              </div>
              Gesloten
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeResidence" id="typeResidence3" value="halfopen_house">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/halfopen_house.svg"); ?>
              </div>
              Half open
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeResidence" id="typeResidence4" value="open_house">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/home.svg"); ?>
              </div>
              Open
            </label>
          </div>
        </div>
      </div>
      <!-- Type verwarming -->
      <div class="heating mb-4">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
          <h4>Type verwarming</h4>
          <input type="submit" name="submit_headingType" value="Aanpassen" class="btn btn-gresident">
        </div>
        <div class="form-group my-2">
          <div class="btn-group-toggle d-flex flex-column flex-md-row justify-content-center settings-toggle" data-toggle="buttons">
            <label class="btn font-weight-bold mx-5 active">
              <input type="radio" name="typeHeating" id="typeHeating1" value="electricity" checked>
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M26 4L6 28H24L22 44L42 20H24L26 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              Elektriciteit
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeHeating" id="typeHeating2" value="gas">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/gas.svg"); ?>
              </div>
              Gas
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeHeating" id="typeHeating3" value="fuel_oil">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/fuel_oil.svg"); ?>
              </div>
              Stookolie
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeHeating" id="typeHeating4" value="heat_pump">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/heat_pump.svg"); ?>
              </div>
              Warmtepomp op elektriciteit
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeHeating" id="typeHeating5" value="other">
              <div class="btn-outline-gresident mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/heat.svg"); ?>
              </div>
              Op een andere manier
            </label>
          </div>
        </div>
      </div>
    </div> <!-- end card body -->
        <!-- Modal -->
    <div class="modal fade" id="confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-gresident">Understood</button>
          </div>
        </div>
      </div>
    </div>
</form>