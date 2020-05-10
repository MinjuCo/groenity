<?php
    include_once(__DIR__."/../classes/Battle.php");
    include_once(__DIR__."/../classes/SingleChallenge.php");
    include_once(__DIR__."/../classes/Theme.php");

    if(isset($_GET['challenge']) && !empty($_GET['challenge'])){
      $challegeId = htmlspecialchars($_GET['challenge']);
    }else{
      header("Location: challenge.php");
    }

    $_SESSION['user'] = "Test";
    $userId = 1;

    try{
      $challenge = Challenge::getChallengeInfo($challegeId);
      $userInQueue = Battle::userIsInQueue($userId, $challegeId);
      $userDoingChallenge = Challenge::userIsDoingThisChallenge($userId, $challegeId);
    }catch(\Throwable $th){
      $error = $th->getMessage();
    }

    $pageTitle = htmlspecialchars($challenge['title']);
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
          <div class="col-md-3 d-flex justify-content-end align-items-center">
            <?php if($userDoingChallenge):?>
              <div class="card">
                <div class="card-body p-2">
                  <h4>
                    <span class="badge float-right coins">
                      <?php echo htmlspecialchars($challenge["green_points"]);?>
                    </span>
                  </h4>
                </div>
              </div>
            <?php else:
              if($userInQueue): ?>
                <h2>
                  <span class="ml-2 badge badge-warning">
                    In wacht
                  </span>
                </h2>
              <?php else: ?>
                <a href="functions/addUserToChallenge.php?challenge=<?php echo $challegeId;?>" class="btn">Deelnemen</a>
              <?php endif;
            endif; ?>
            
          </div>

        </div>
        <div class="row">
          <?php if($userDoingChallenge):
            include_once("includes/acceptedChallengeCard.php");
          else:
            include_once("includes/todoChallengeCard.php");
          endif; ?>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>