<?php
  include_once(__DIR__."/functions/appFunctions.php");

  $pageTitle = "Instellingen";
  $_SESSION['user'] = "Test";
  $userId = 1;

  if(isset($_GET['content'])){
    $content = checkContent(htmlspecialchars($_GET['content']), "settings");
  }else{
    $content = "general";
  }
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once(__DIR__ . "/../includes/head.inc.php"); ?>
<body>
    <?php
      //Navbar
      include_once(__DIR__ . "/../includes/nav.inc.php");
    ?>

    <div class="container application">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>
        <ul class="nav nav-pills mb-4" id="pills-settings-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php echo ($content == "general")? "active":"" ?> rounded-pill" href="?content=general" aria-selected="true">Algemeen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($content == "meters")? "active":"" ?> rounded-pill" href="?content=meters" aria-selected="false">Meters</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-settingsContent">
            <div class="card mb-4 shadow">
              <?php 
                if($content == "notFound"){
                  include_once(__DIR__."/404.php");
                }else{
                  include_once(__DIR__."/includes/settings/$content.php");
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