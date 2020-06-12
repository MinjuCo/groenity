<?php 
    $pageTitle = "Jouw groene samenleving";
    session_start();
    
    unset($_SESSION['zip']);
    unset($_SESSION['street']);
    unset($_SESSION['houseNr']);

    if(isset($_SESSION['user'])){
        header("Location: application/own.php");
    }
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