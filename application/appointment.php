<?php
    include_once(__DIR__."/../classes/User.php");
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
    }catch(\Throwable $th){
      $error = $th->getMessage();
      echo $error;
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
                  <div class="form-group">
                    <label for="bookingSubject">Onderwerp</label>
                    <input type="text" class="form-control" name="bookingSubject" id="bookingSubject">
                  </div>
                  <div class="form-group">
                    <label for="bookingTheme">Thema</label>
                    <select class="form-control" id="bookingTheme" name="bookingTheme">
                      <option>Energie</option>
                      <option>Water</option>
                      <option>Afval</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="bookingMessage">Wat wil je met de experts bespreken</label>
                    <textarea class="form-control" name="bookingMessage" id="bookingMessage" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="bookingEmail">Email</label>
                    <input type="email" class="form-control" name="bookingEmail" id="bookingEmail">
                  </div>
                  <div class="form-group">
                    <label for="bookingPhone">Telefoonnummer</label>
                    <input type="tel" class="form-control" name="bookingPhone" id="bookingPhone">
                  </div>
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