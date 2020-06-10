<?php 
//User informations
include_once(__DIR__."/../../classes/User.php");
include_once(__DIR__."/../../classes/City.php");

$userInfo = User::userInformation($_SESSION['user']);
if(empty($userInfo)){
  session_destroy();
  header("Location: ../index.php");
}
$userId = $userInfo['id'];
$fullName = htmlspecialchars($userInfo['first_name'])." ".htmlspecialchars($userInfo['last_name']);

$userCityInfo = City::getInfoByZip($userInfo['zip']);

?>