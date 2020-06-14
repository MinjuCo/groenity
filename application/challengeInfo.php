<?php
    include_once(__DIR__."/../classes/Battle.php");
    include_once(__DIR__."/../classes/SingleChallenge.php");
    include_once(__DIR__."/../classes/Theme.php");
    include_once(__DIR__."/functions/appFunctions.php");
    session_start();

    if(isset($_GET['challenge']) && !empty($_GET['challenge'])){
      $challegeId = htmlspecialchars($_GET['challenge']);
    }else{
      header("Location: challenge.php");
    }

    try{
      include_once(__DIR__."/includes/userInfo.inc.php");
      $challenge = Challenge::getChallengeInfo($challegeId);
      $userInQueue = ($challenge['is_battle'] && Challenge::challengeAlreadyAccepted($userId, $challegeId, $challenge['is_battle']))? true: false;;
      $userDoingChallenge = Challenge::userIsDoingThisChallenge($userId, $challegeId);
      $challengeCompleted = Challenge::challengeCompleted($userId, $challegeId);

      $challengeGoals = getGoalsText($challenge['goals']);
      $rewards = explode(";", $challenge['rewards']);

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
                    <span class="price float-right d-flex align-items-center"><?php echo htmlspecialchars($challenge["green_points"]);?><img class="coins" src="../img/g_coins.svg" alt="GP"></span>
                  </h4>
                </div>
              </div>
            <?php elseif($userInQueue): ?>
              <h2>
                <span class="ml-2 badge badge-warning">
                  In wacht
                </span>
              </h2>
            <?php elseif($challengeCompleted):?>
              <h2>
                <span class="ml-2 badge badge-success">
                  Voltooid
                </span>
              </h2>
              <?php else: ?>
                <button class="btn btn-gresident btn-participate ml-2" data-challengeid="<?php echo htmlspecialchars($challenge['id']);?>">Deelnemen</button>
              <?php
            endif; ?>
            
          </div>

        </div>
        <div class="row mb-3">
          <?php if($userDoingChallenge):
            include_once("includes/challenge/acceptedChallengeCard.php");
          elseif($challengeCompleted):
            include_once("includes/challenge/completedChallengeCard.php");
          else:
            include_once("includes/challenge/todoChallengeCard.php");
          endif; ?>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
        if(!$userDoingChallenge && !$challengeCompleted):
    ?>
        <script>
          let btnsParticipate = document.querySelectorAll(".btn-participate");

          btnsParticipate.forEach(btnParticipate => {
            let btn = this;
            btnParticipate.addEventListener("click", (e) => {
              let thisElem = e.currentTarget;
              let challengeId = thisElem.dataset.challengeid;

              //send to database
              let formData = new FormData();
              formData.append('challengeId', challengeId);

              fetch('../ajax/acceptChallenge.php', {
                method: 'POST',
                body: formData
              })
              .then(response => response.json())
              .then(result => {
                if(result.status === "success"){
                  window.location.replace("?content=onGoing");
                }

                if(result.status === "error"){
                  alert(result.message);
                }

              })
              .catch(error => {
                console.error('Error:', error);
              });
            });
          });
        </script>
        <?php endif; ?>
</body>
</html>