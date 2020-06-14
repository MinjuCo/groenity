<?php
    include_once(__DIR__."/../classes/Challenge.php");
    include_once(__DIR__."/../classes/SingleChallenge.php");
    include_once(__DIR__."/../classes/Battle.php");
    include_once(__DIR__."/functions/appFunctions.php");
    session_start();

    $pageTitle = "Uitdaging";

    if(isset($_GET['content'])){
      $content = checkContent(htmlspecialchars($_GET['content']), "challenge");
    }else{
      $content = "onGoing";
    }

    if(isset($_GET['challengeType'])){
      $challengeType = checkChallengeType(htmlspecialchars($_GET['challengeType']));
    }else{
      $challengeType = "all";
    }

    try{
      include_once(__DIR__."/includes/userInfo.inc.php");
      switch($content){
        case 'todo':
          $challenges = Challenge::getUserTodoChallenges($userId);
          break;
        case 'completed':
          $challenges = Challenge::getUserCompletedChallenge($userId);
          break;
        default:
          $challenges = Challenge::getUserOngoingChallenges($userId);
          break;
      }

      if($content == "onGoing"){
        $battleChallenges = Challenge::getUserCategorizedChallenges("battle", $userId); //Get user battles
        $singleChallenges = Challenge::getUserCategorizedChallenges("single", $userId); //Get user own challenges
        $queuedChallenges = Challenge::getUserCategorizedChallenges("queue", $userId); //Get user queued challenges
      }

    }catch(\Throwable $th){
      $error = $th->getMessage();
    }

    include_once(__DIR__."/includes/challenge/completeChallenge.inc.php");
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
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
          <strong>Pas op!</strong> <?php echo $error; ?>
        </div>
      <?php endif; ?>
        <h2 class="mb-4">Uitdagingen</h2>
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "onGoing")? "active":"" ?>" id="pills-ongoingChallenges-tab" href="?content=onGoing">Lopende uitdagingen</a>
          </li>
          <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "todo")? "active":"" ?>" id="pills-todoChallenges-tab" href="?content=todo">Beschikbare uitdagingen</a>
          </li>
          <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "completed")? "active":"" ?>" id="pills-completedChallenges-tab" href="?content=completed">Voltooide uitdagingen</a>
          </li>
        </ul>
        <?php 
          if($content == "notFound"){
            include_once(__DIR__."/404.php");
          }else{
            include_once(__DIR__."/includes/challenge/$content.php");
          }
        ?>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>