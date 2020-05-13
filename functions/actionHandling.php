<?php

  function participateToChallenge($userId, $challengeId){
    try{
      $chosenChallenge = Challenge::getChallengeInfo($challengeId);
      if($chosenChallenge['is_battle']){
        $newChallenge = new Battle();
      }else{
        $newChallenge = new SingleChallenge();
      }

      $newChallenge->setId($challengeId);

      return $newChallenge->acceptChallenge($userId);
    }catch(\Throwable $th){
      return $th->getMessage();
    }
    
    
  }
  
?>