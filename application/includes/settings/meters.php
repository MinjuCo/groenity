<div class="card-header bg-darkblue">
  <h3 class="text-gresident-white mb-2">Meters</h3>
</div>
<form action="" method="post">
    <div class="card-body">
      <!-- TYPE Meter -->
      <div class="meter mb-4">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
          <h4>Over welk meters beschikt u?</h4>
        </div>
        <div class="form-group my-3">
          <div class="btn-group-toggle d-flex flex-column flex-md-row justify-content-center settings-toggle" data-toggle="buttons">
            <label class="btn font-weight-bold mx-5 active">
              <input type="radio" name="typeMeter" id="typeMeter1" value="digital" checked>
              <div class="mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/smart_meter.svg"); ?>
              </div>
              Digitale meter
            </label>
            <label class="btn font-weight-bold mx-5">
              <input type="radio" name="typeMeter" id="typeMeter2" value="mechanic">
              <div class="mx-auto mb-2 thumb-85 p-3 rounded-circle">
                <?php echo file_get_contents("../img/Icons/electric_meter.svg"); ?>
              </div>
              Elektromechanische meter
            </label>
          </div>
        </div>
      </div>
      <!-- Digital meter -->
      <div class="digitalMeter mb-3">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
            <h4 class="mb-0">Digitale meters</h4>
        </div>

        <div class="d-flex justify-content-between mt-3">
          <div class="col-md-6 d-flex flex-wrap">
            <div class="col-xs-12 col-lg-6 mb-3">
              <div class="card rounded border-gresident-lightgreen">
                <div class="card-body p-2">
                  <button type="button" class="close" data-toggle="modal" data-target="#confirm">
                    <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                  </button>
                  <!-- Media block -->
                  <div class="media">
                    <img src="../img/Icons/zap.svg" class="thumb-64 mr-3 rounded-circle" alt="avatar">
                    <div class="media-body p-2">
                      <h6 class="mt-0">Marie Doe</h6>
                      2300kWh
                    </div>
                  </div>
                  <!-- /end Media block -->
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-6 mb-3">
              <div class="card rounded border-gresident-lightgreen">
                <div class="card-body p-2">
                  <button type="button" class="close" data-toggle="modal" data-target="#confirm">
                    <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                  </button>
                  <!-- Media block -->
                  <div class="media">
                    <img src="../img/Icons/zap.svg" class="thumb-64 link-gn mr-3 rounded-circle" alt="avatar">
                    <div class="media-body p-2">
                      <h6 class="mt-0">Water</h6>
                      450 L
                    </div>
                  </div>
                  <!-- /end Media block -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="meterUse">Waarvoor?</label>
              <select class="form-control" id="meterUse" name="meterUse">
                <option>Elektriciteit</option>
                <option>Water</option>
                <option>Gas</option>
              </select>
            </div>
            <div class="form-group">
              <label for="meterReferenceNumber">Referentie nummer</label>
              <input type="text" class="form-control" name="meterReferenceNumber" id="meterReferenceNumber">
            </div>
            <input type="submit" class="btn btn-gresident" name="submit-digitalMeter" value="Toevoegen">
          </div>
        </div>
      </div>
      <!-- Electric meter -->
      <div class="electricMeter mb-3">
        <div class="d-flex pb-3 border-bottom justify-content-between align-items-center">
            <h4 class="mb-0">Elektromechanische meters</h4>
        </div>

        <div class="d-flex justify-content-between mt-3">
          <div class="col-md-4 d-flex flex-wrap">
            <div class="form-group">
              <label for="meterDataImport">Gegevens importeren</label>
              <input type="file" name="meterDataImport" id="meterDataImport">
            </div>
            <input type="submit" class="btn btn-gresident pull-right" name="submit-electricMeter" value="Gegevens importeren">
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <p>Als u overschakkelt naar een digitale meter, dan betaalt u enkel voor wat u echt hebt gebruikt. Weet u wat dat kan betekenen voor u? U kan tot €300 besparen.</p>
          </div>
        </div>
      </div>
    </div> <!-- end card body -->
</form>