<?php 
  function checkContent($queryVar, $page){
    switch ($page) {
      case 'shop':
        $validQueries = array("allProducts", "tshirts", "gadgets", "cityProducts");
        break;
      case 'appointment':
        $validQueries = array("pending-appointments", "outstanding-balance", "history");
        break;
      case 'settings':
        $validQueries = array("general", "meters");
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

?>