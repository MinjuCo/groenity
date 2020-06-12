<?php

$pageTitle = "Wachtwoord instellen";

if (!empty($_POST)) {
  
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
}

?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
  <?php include_once(__DIR__ . "/../includes/nav.inc.php"); ?>
  <div class="container-fluid newPassword">
    <div class="col-md-6 m-auto">
      <h2 class="mb-4">Wachtwoord instellen</h2>
      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
          <strong>Pas op!</strong> <?php echo $error; ?>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="password">Nieuwe wachtwoord</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Bevestig wachtwoord</label>
          <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
        </div>
        <button type="submit" class="btn btn-gresident btn-block">Stuur activatie code</button>
      </form>
    </div>
  </div>
  <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>

</html>