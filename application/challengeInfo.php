<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/Theme.php");

    if(isset($_GET['challenge']) && !empty($_GET['challenge'])){
      $challegeId = htmlspecialchars($_GET['challenge']);
    }

    try{
      $challenge = Challenge::getChallengeInfo($challegeId);
    }catch(\Throwable $th){
      $error = $th->getMessage();
    }

    $pageTitle = htmlspecialchars($challenge['title']);
    $_SESSION['user'] = "Test";
    $userId = 1;
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
        <div class="challenge-header row">
          <div class="col-md-9">
            <h2 class="mb-4">
              <a href="challenge.php">
              <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.5 18H7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18 28.5L7.5 18L18 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>

              </a>
              <?php echo htmlspecialchars($challenge['title']); ?>
            </h2>
          </div>
          <div class="col-md-3 text-right">
            <a href="#" class="btn">Deelnemen</a>
          </div>

        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="card shadow-sm">
              <div class="card-body">
                <h4>Beschrijving</h4>
                <p class="card-text">
                  <?php echo htmlspecialchars($challenge['description']); ?>
                </p>
                <h4>Doel</h4>
                <p class="card-text">
                  <?php echo htmlspecialchars($challenge['goals']); ?>
                </p>
                <h4>Meer info</h4>
                <p class="card-text">
                  <?php echo htmlspecialchars($challenge['extra_info']); ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h4>Beloning</h4>
                <p>
                  <?php echo htmlspecialchars($challenge['rewards']); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>