<?php
include_once("../classes/User.php");
session_start();

$pageTitle = "Registratie";


if (!empty($_POST)) {

    try {
      $password = $_POST["password"];
      $repeatPassword = $_POST["confirmPassword"];
      $email = $_POST['email'];
      $firstname = $_POST['firstName'];
      $lastname = $_POST['lastName'];

      $user = new User();
      $user->setFirstName($_POST['firstName']);
      $user->setLastName($_POST['lastName']);
      $user->setEmail($_POST['email']);
      $user->setPassword($_POST['password']);
      $user->setStreet($_SESSION['street']);
      $user->setHouseNumber($_SESSION['houseNr']);
      $user->setZip($_SESSION['zip']);

      //email validation
      $emailExists = $user->emailExists();
      if ($emailExists == true) {
        throw new Exception("Dit e-mailadres is al in gebruik.");
      }

      //Password validation
      $user->validatePassword($repeatPassword);

      // check if user agreed to tearms
      if (!isset($_POST['conditionAccepted'])) {
        throw new Exception("Gelieve de algemene voorwaarden en privacy beleid te aanvaarden.");
      }

      if ($user->saveUser() && $user->sendValidationCode()) {
        $success = 'Een verificatie code is verzonden naar je e-mail.';
      }
      
    } catch (\Exception $e) {
      $error = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
  <?php include_once(__DIR__ . "/../includes/nav.inc.php"); ?>
  <div class="container-fluid registration">
    <div class="col-md-6 m-auto">
      <?php if(!empty($success)): ?>
        <h2 class="mb-2">Bevestig jouw gegevens</h2>
        <p>
          Er is een mail verzonden om jouw gegevens te bevestigen.
        </p>
        <a href="askCode.php" class="btn btn-gresident btn-block">Verificatie code invullen</a>
        <a href="#" class="btn btn-outline-gresident btn-block">Ik heb geen mail ontvangen</a>
      <?php else: ?>
        <h2 class="mb-2">Neem deel aan de gemeenschap</h2>
        <p>
          Krijg toegang tot je eigen dashboard waar je het leven van je stadje mee kan opvolgen,
          terwijl je uitdagingen of discussies aangaat.
        </p>
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger" role="alert">
            <strong>Pas op!</strong> <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firtName">Voornaam</label>
              <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo (isset($_POST["firstName"]))? $_POST["firstName"]:""; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Achternaam</label>
              <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo (isset($_POST["lastName"]))? $_POST["lastName"]:""; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset($_POST["email"]) && $user->emailExists() == false)? $_POST["email"]:""; ?>">
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
          <input type="submit" class="btn btn-gresident btn-block" name="submit-registration" placeholder="Schrijf je in">
        </form>
        <hr>
        <p class="text-center">Reeds lid? <a class="link-gn" href="login.php">Meld je hier aan</a></p>
        <?php endif; ?>
    </div>
  </div>
  <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>

</html>