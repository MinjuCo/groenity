<?php
session_start();

if(isset($_REQUEST['zip']) && isset($_REQUEST['street'])  && isset($_REQUEST['houseNr']))
{

  $zip = $_REQUEST['zip'];
  $street = $_REQUEST['street'];
  $houseNr = $_REQUEST['houseNr'];

  $_SESSION['zip'] = $zip;
  $_SESSION['street'] = $street;
  $_SESSION['houseNr'] = $houseNr;

  //header("Location: ".__DIR__."/../pages/askCode.php");
}

//header("Location: ".__DIR__."/../index.php");

?>