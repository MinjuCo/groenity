<?php

$pageTitle = "Wachtwoord vergeten";

if (!empty($_POST)) {
  
  $email = $_POST['email'];
}

?>
<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>

<body>
  <?php include_once(__DIR__ . "/../includes/nav.inc.php"); ?>
  <div class="container-fluid password">
    <div class="col-md-6 m-auto">
      <h2 class="mb-4">Wachtwoord vergeten</h2>
      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
          <strong>Pas op!</strong> <?php echo $error; ?>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="email">Je e-mailadres</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <button type="submit" class="btn btn-gresident btn-block">Stuur me een link</button>
      </form>
    </div>
  </div>
  <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>

</html>