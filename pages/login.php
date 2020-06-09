<?php
include_once("../classes/Db.php");
include_once("../classes/User.php");

$pageTitle = "Inloggen";

if (!empty($_POST)) {
  $user = new User();
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  try {
    $user->setEmail($email);
    $user->setPassword($password);

    if($user->login()){
      session_start();
      $_SESSION['user'] = $email;
      header("Location: profil.php");
    }
  } catch (\Throwable $e) {
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
      <?php if (!empty($error)) : ?>
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
          <div class="form-group">
            <a href="forgotPassword.php" class="link-blue">Wachtwoord vergeten?</a>
          </div>
        </div>
        <button type="submit" class="btn btn-gresident btn-block">Meld je aan</button>
      </form>
      <hr>
      <a href="#" class="btn btn-gresident btn-block">Meld je aan met Fluvius</a>
      <hr>
      <p class="text-center">Nog geen lid? <a class="link-gn" href="../index.php">Schrijf je in</a></p>
    </div>
  </div>
  <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>

</html>