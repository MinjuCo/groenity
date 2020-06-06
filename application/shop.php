<?php
    include_once(__DIR__."/../classes/User.php");
    include_once(__DIR__."/functions/appFunctions.php");

    $pageTitle = "Winkel";
    $_SESSION['user'] = "Test";
    $userId = 1;
    
    if(isset($_GET['productType'])){
      $productType = checkProductType(htmlspecialchars($_GET['productType']));
    }else{
      $productType = "allProducts";
    }
    

    try{
    }catch(\Throwable $th){
      $error = $th->getMessage();
      echo $error;
    }
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
        <h2 class="mb-4">Winkel</h2>
        <div class="content__tabs d-flex align-items-center justify-content-between mb-4">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($productType == "allProducts")? "active":"" ?>" href="?productType=allProducts">Alles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($productType == "gadgets")? "active":"" ?>" href="?productType=gadgets">Gadgets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($productType == "tshirts")? "active":"" ?>" href="?productType=tshirts">T-shirts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($productType == "cityProducts")? "active":"" ?> disabled" href="?productType=cityProducts" tabindex="-1" aria-disabled="true">Gemeentelijk producten</a>
            </li>
          </ul>
          <form class="form-inline">
            <label for="filter" class="mr-sm-2">Sorteer op:</label>
            <select class="form-control" id="filter">
              <option>Populariteit</option>
              <option>Punten oplopend (GP)</option>
              <option>Punten aflopend (GP)</option>
              <option>Prijs oplopend (€)</option>
              <option>Prijs aflopend (€)</option>
            </select>
          </form>
        </div>
        <div class="card col-12 shadow mb-4 pb-3">
          <div class="card-body pb-4">
            <?php 
              if($productType == "notFound"){
                include_once(__DIR__."/404.php");
              }else{
                include_once(__DIR__."/includes/shop/$productType.php");
              }
            ?>
          </div>
        </div>
    </div>
    
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/../includes/footer.inc.php"); 
    ?>
</body>
</html>