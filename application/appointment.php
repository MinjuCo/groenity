<?php
    include_once(__DIR__."/../classes/Appointment.php");
    include_once(__DIR__."/functions/appFunctions.php");
    session_start();

    $pageTitle = "Afspraken";
    
    if(isset($_GET['content'])){
      $content = checkContent(htmlspecialchars($_GET['content']), "appointment");
    }else{
      $content = "pending-appointments";
    }
    

    try{
      include_once(__DIR__."/includes/userInfo.inc.php");
      $pendingAppointments = Appointment::getPendingAppointments($userId);
      $outstandingBalances = Appointment::getOutstandingBalance($userId);
      $appointmentHistory = Appointment::getHistory($userId);

      if(isset($_GET['searchSubject'])){
        $searchSubject = htmlspecialchars($_GET['searchSubject']);

        switch ($content) {
          case 'pending-appointments':
            $pendingAppointments = Appointment::searchAppointment($userId, $searchSubject);
            break;
          case 'outstanding-balance':
            $outstandingBalances = Appointment::searchAppointment($userId, $searchSubject);
            break;
          case 'history':
            $appointmentHistory = Appointment::searchAppointment($userId, $searchSubject);
            break;
        }
      }

      if(isset($_REQUEST['remove'])){
        $id = $_REQUEST['remove'];

        $result = Appointment::removeAppointment($userId, $id);
        if($result){
          header("Location: appointment.php");
        }
      }

      if(!empty($_POST)){
        $subject = $_POST['bookingSubject'];
        $theme = $_POST['bookingTheme'];
        $message = $_POST['bookingMessage'];
        $email = $_POST['bookingEmail'];
        $phone = $_POST['bookingPhone'];

        $newAppointment = new Appointment();
        $newAppointment->setUserId($userId);
        $newAppointment->setSubject($subject);
        $newAppointment->setThemeId($theme);
        $newAppointment->setMessage($message);
        $newAppointment->setEmail($email);
        $newAppointment->setPhone($phone);

        $result = $newAppointment->saveAppointment();

        if($result){
          $success = "U hebt succesvol een afspraak geboekt.";
        }
      }
    }catch(\Throwable $th){
      $error = $th->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__."/../includes/head.inc.php"); ?> 
<body>
    <?php
        //Navbar
        include_once(__DIR__."/../includes/nav.inc.php"); 
    ?>
    
    <div class="container application">
        <?php if (!empty($success)) : ?>
          <div class="alert alert-success" role="alert">
            <strong>Voltooid!</strong> <?php echo $success; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
          <strong>Pas op!</strong> <?php echo $error; ?>
        </div>
      <?php endif; ?>
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>
        <div class="content__tabs d-flex align-items-center justify-content-between mb-4">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "pending-appointments")? "active":"" ?>" href="?content=pending-appointments">Afwachtende afspraken</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "outstanding-balance")? "active":"" ?>" href="?content=outstanding-balance">Openstaande saldo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "history")? "active":"" ?>" href="?content=history">Geschiedenis</a>
            </li>
          </ul>
          <button type="button" class="btn btn-gresident px-4" data-toggle="modal" data-target="#makeABooking">
            Gesprek boeken
          </button>
        </div>
        <div class="card col-12 shadow mb-4 pb-3">
          <div class="card-body pb-4">
            <?php 
              if($content == "notFound"){
                include_once(__DIR__."/404.php");
              }else{
                include_once(__DIR__."/includes/appointment/$content.php");
              }
            ?>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="makeABooking" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header pt-2 pb-1 px-4 d-flex align-items-center">
                <h3 class="modal-title" id="staticBackdropLabel">Gesprek boeken</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </button>
              </div>
              <div class="modal-body px-4">
                <div class="modal-split">
                  <img class="w-50 d-block mx-auto" src="../img/Visuals/discussions.svg" alt="Discussies">
                  <p>Eén gesprek zal <span class="link-gn">€ 0,30</span> / minuut kosten en wordt gefactureerd na het gesprek. Je kan de facturen bekijken in de tab ‘Openstaande facturen’.</p>
                  <p>Deze prijs dient vooral om de kosten van de experts te dekken en deels de webapplicatie te kunnen onderhouden.</p>
                </div>
                <div class="modal-split">
                  <form action="" method="post" id="submitAppointment">
                    <div class="form-group">
                      <label for="bookingSubject">Onderwerp</label>
                      <input type="text" class="form-control" name="bookingSubject" id="bookingSubject">
                    </div>
                    <div class="form-group">
                      <label for="bookingTheme">Thema</label>
                      <select class="form-control" id="bookingTheme" name="bookingTheme">
                        <option value="1">Energie</option>
                        <option value="2">Water</option>
                        <option value="3">Afval</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="bookingMessage">Wat wil je met de experts bespreken</label>
                      <textarea class="form-control" name="bookingMessage" id="bookingMessage" form="submitAppointment" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="bookingEmail">Email</label>
                      <input type="email" class="form-control" name="bookingEmail" id="bookingEmail" value="<?php echo htmlspecialchars($userInfo['email']); ?>">
                    </div>
                    <div class="form-group">
                      <label for="bookingPhone">Telefoonnummer</label>
                      <input type="tel" class="form-control" name="bookingPhone" id="bookingPhone" value="<?php echo htmlspecialchars($userInfo['phone_number']); ?>">
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer px-4 pb-2">
              </div>
            </div>
          </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
    <script src="../js/multipleStepModal.js"></script>
</body>
</html>