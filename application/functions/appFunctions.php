<?php 
  function checkProductType($queryVar){
    $validProductTypes = array("allProducts", "tshirts", "gadgets", "cityProducts");
    if(!in_array($queryVar, $validProductTypes)){
      return "notFound";
    }
    return $queryVar;
  }

?>