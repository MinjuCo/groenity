<?php 
  include_once(__DIR__."/../classes/City.php");

  if(isset($_GET['q'])){
      $q = $_REQUEST['q'];
    if(trim($q) !== ""){
      $q = htmlspecialchars(strtoupper($q));
      $city = City::getInfoByName($q);
      if(!empty($city)){
        $response = [
          'status' => 'success',
          'zip' => htmlspecialchars($city['zip'])
        ];
      }else{
        $response = [
          'status' => 'error',
          'zip' => 'notFound'
        ];
      }

      header('Content-Type: application/json');
      echo json_encode($response);
    }
  }else{
    $response = [
      'status' => 'error',
      'zip' => 'notFound'
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
  }
  
?>