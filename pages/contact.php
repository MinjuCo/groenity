<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?>
<body>
  <?php include_once(__DIR__ . "/../includes/nav.inc.php"); ?>
  <div class="container contact">
    <h2 class="mb-4">Contacteer ons</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex flex-column">
          <div class="my-2 d-flex align-items-center">
            <svg class="bi bi-envelope link-gn mr-2" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
              <path d="M.05 3.555C.017 3.698 0 3.847 0 4v.697l5.803 3.546L0 11.801V12c0 .306.069.596.192.856l6.57-4.027L8 9.586l1.239-.757 6.57 4.027c.122-.26.191-.55.191-.856v-.2l-5.803-3.557L16 4.697V4c0-.153-.017-.302-.05-.445L8 8.414.05 3.555z"/>
            </svg>
            <a class="text-dark-blue" href="mailto:contact@gresident.be">contact@gresident.be</a>
          </div>
          <div class="my-2 d-flex align-items-center">
            <svg class="link-gn mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <a href="tel:+32474092014" class="text-dark-blue">+32 474 09 20 14</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger" role="alert">
            <strong>Pas op!</strong> <?php echo $error; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
          <div class="alert alert-success" role="alert">
            <strong>Pas op!</strong> <?php echo $success; ?>
          </div>
        <?php endif; ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
            <label for="subject">Onderwerp</label>
            <input type="text" class="form-control" name="subject" id="subject">
          </div>
          <div class="form-group">
            <label for="message">Uw bericht</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-gresident btn-block">Contacteer ons</button>
        </form>
      </div>
    </div>
  </div>
  <?php include_once(__DIR__ . "/../includes/footer.inc.php"); ?>
</body>
</html>