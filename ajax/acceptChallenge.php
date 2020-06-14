<?php 
include_once(__DIR__."/../classes/Battle.php");
include_once(__DIR__."/../classes/SingleChallenge.php");
include_once(__DIR__."/../application/functions/appFunctions.php");
session_start();

if(!empty($_POST)){
  $challengeId = $_POST['challengeId'];
  try{
    include_once(__DIR__."/../application/includes/userInfo.inc.php");
    $result = participateToChallenge($userId, $challengeId);

    if($result){
      $challenge = Challenge::getChallengeInfo($challengeId);
      
      $response = [
        'status' => 'success',
        'body' => $challenge,
        'message' => 'U hebt succesvol deelgenomen aan deze uitdaging.'
      ];
    }else{
      $response = [
        'status' => 'error',
        'message' => 'Er is een technisch probleem opgetreden'
      ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }catch(\Throwable $th){
    $response = [
      'status' => 'error',
      'message' => $th->getMessage()
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
  }
}

?>