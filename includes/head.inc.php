<?php 
$currentPage = strtolower(basename($_SERVER['PHP_SELF'],'.php'));
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gresident - <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php if($currentPage == "index"):?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php else:?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    <?php endif;?>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <?php if(($currentPage == "own" && isset($requestedContent)) || ($currentPage == "city" && (isset($content) && $content=="realtime"))): ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="../js/liveUsage.js"></script>
    <?php endif; ?>
    <?php if($currentPage == "city"): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <?php endif; ?>
</head>