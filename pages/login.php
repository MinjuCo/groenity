<?php
include_once("../classes/Db.php");
include_once("../classes/User.php");

$pageTitle = "Inloggen";

if (!empty($_POST)) {
  $user = new User();

  try {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->setEmail($email);
    $user->setPassword($password);

    $user->login();
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
  <div class="container-fluid login">
    <div class="col-md-6 m-auto">
      <h2 class="mb-2">Meld je aan om je dashboard te zien</h2>
      <?php if (isset($error)) : ?>
        <p class="form__error"> <?php echo $error; ?></p>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="email">E-mailadres</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-check">
              <input class="form-check-input" name="conditionAccepted" type="checkbox" id="checkCondition">
              <label class="form-check-label" for="checkCondition">
                Ingelogd blijven
              </label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <a href="forgotPassword.php" class="link-blue float-right">Wachtwoord vergeten?</a>
          </div>
        </div>
        <button type="submit" class="btn btn-block">Meld je aan</button>
      </form>
      <hr>
      <a href="#" class="btn btn-block">Meld je aan met Fluvius</a>
      <hr>
      <p class="text-center">Nog geen lid? <a class="link-gn" href="../index.php">Schrijf je in</a></p>
    </div>
  </div>
</body>

</html>