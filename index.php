<?php 
    $pageTitle = "Jouw groene samenleving";
?>

<!DOCTYPE html>
<html lang="nl">
<?php include_once("includes/head.inc.php"); ?> 
<body>
    <?php
        //Navbar
        include_once(__DIR__."/includes/nav.inc.php"); 
    ?>
    
    <?php 
        //landingpage
        include_once(__DIR__."/pages/landingpage.php"); 
    ?>
    
    <?php 
        //Footer + scripts
        include_once(__DIR__."/includes/footer.inc.php"); 
    ?>
</body>
</html>