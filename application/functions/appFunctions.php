<?php 
  function checkContent($queryVar, $page){
    switch ($page) {
      case 'challenge':
        $validQueries = array("onGoing", "todo", "completed");
        break;
      case 'shop':
        $validQueries = array("allProducts", "clothes", "gadgets", "cityProducts");
        break;
      case 'appointment':
        $validQueries = array("pending-appointments", "outstanding-balance", "history");
        break;
      case 'settings':
        $validQueries = array("general", "meters");
        break;
      case 'city':
        $validQueries = array("realtime", "impact");
        break;
      default:
        $validQueries = array();
        break;
    }

    if(!in_array($queryVar, $validQueries)){
      return "notFound";
    }
    return $queryVar;
  }

  function checkChallengeType($type){
    $validTypes = array("all", "duel", "single", "queued");

    if(!in_array($type, $validTypes)){
      return "notFound";
    }
    
    return $type;
  }

  function getGoalsText($goal){
    switch ($goal) {
      case '-25energy':
        $fullText = "Probeer als stad energieverbruik te <span class='link-gn'>verlagen met 25 kW</span>";
        break;
      case '-5%energy':
        $fullText = "Probeer je energieverbruik te <span class='link-gn'>verlagen met 5%</span>";
        break;
      case '-50energy':
        $fullText = "Probeer als stad energieverbruik te <span class='link-gn'>verlagen met 50 kW</span>";
        break;
      case '-50water':
        $fullText = "Probeer als stad waterverbruik te <span class='link-gn'>verlagen met 50 kW</span>";
        break;
      case 'remove1StandBy':
        $fullText = "Zet 1 apparaat die op <span class='link-gn'>stand-by</span> staat volledig af";
        break;
      case 'noPhoneChargeNight':
        $fullText = "Laad je gsm 's nachts niet op";
        break;
      default:
        $fullText = "Voltooi deze uitdaging";
        break;
    }

    return $fullText;
  }

  function participateToChallenge($userId, $challengeId){
    try{
      $chosenChallenge = Challenge::getChallengeInfo($challengeId);
      if($chosenChallenge['is_battle']){
        $newChallenge = new Battle();
      }else{
        $newChallenge = new SingleChallenge();
      }
  
      $newChallenge->setChallengeId($challengeId);
  
      return $newChallenge->acceptChallenge($userId);
    }catch(\Throwable $th){
      return $th->getMessage();
    }
    
  }

?>