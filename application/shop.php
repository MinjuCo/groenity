<?php
    include_once(__DIR__."/../classes/User.php");
    include_once(__DIR__."/functions/appFunctions.php");
    session_start();

    $pageTitle = "Winkel";
    
    if(isset($_GET['content'])){
      $content = checkContent(htmlspecialchars($_GET['content']), "shop");
    }else{
      $content = "allProducts";
    }
    

    try{
      include_once(__DIR__."/includes/userInfo.inc.php");
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
              <a class="nav-link rounded-pill <?php echo ($content == "allProducts")? "active":"" ?>" href="?content=allProducts">Alles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "gadgets")? "active":"" ?>" href="?content=gadgets">Gadgets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "tshirts")? "active":"" ?>" href="?content=tshirts">T-shirts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded-pill <?php echo ($content == "cityProducts")? "active":"" ?> disabled" href="?content=cityProducts" tabindex="-1" aria-disabled="true">Gemeentelijk producten</a>
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
              if($content == "notFound"){
                include_once(__DIR__."/404.php");
              }else{
                include_once(__DIR__."/includes/shop/$content.php");
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