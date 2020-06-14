<?php

if(!empty($_POST['challenge'])){
  $challengeId = htmlspecialchars($_POST['challenge']);

  try{
    if(SingleChallenge::completeChallenge($userId, $challengeId)){
      $challengeInfo = Challenge::getChallengeInfo($challengeId);
      $points = $challengeInfo['green_points'];
      if(User::updatePoints($points,$userId) && City::updatePoints($points, $userCityInfo['id'])){
        header("Location: ?content=completed");
      }else{
        throw new Exception("Uitdaging niet voltooid.");
      }
    }
  
  }catch(\Throwable $th){
    $error = $th->getMessage();
  }
}

?>