<?php
  $pageTitle = "Registratie";
?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?>

<body>
  <?php include_once(__DIR__."/../includes/nav.inc.php"); ?>
  <div class="container-fluid registration">
    <div class="col-md-6 m-auto">
      <h2 class="mb-2">Neem deel aan de gemeenschap</h2>
      <p>
        Krijg toegang tot je eigen dashboard waar je het leven van je stadje mee kan opvolgen, 
        terwijl je uitdagingen of discussies aangaat.
      </p>

      <form action="" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="firtName">Voornaam</label>
            <input type="text" class="form-control" name="firstName" id="firstName">
          </div>
          <div class="form-group col-md-6">
            <label for="lastName">Achternaam</label>
            <input type="text" class="form-control" name="lastName" id="lastName">
          </div>
        </div>
        <div class="form-group">
          <label for="email">E-mailadres</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Bevestig wachtwoord</label>
          <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" name="conditionAccepted" type="checkbox" id="checkCondition">
            <label class="form-check-label" for="checkCondition">
              Ik heb de <a href="#"> algemene voorwaarden </a> en het <a href="#"> privacybeleid </a> gelezen en ga hiermee akkoord.
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-block">Schrijf je in</button>
      </form>
      <hr>
      <p class="text-center">Reeds lid? <a class="link-gn" href="login.php">Meld je hier aan</a></p>
    </div>
  </div>
</body>

</html>