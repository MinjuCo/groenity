    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="<?php echo ($currentPage == "index")? "pages/about.php":"about.php"; ?>" class="nav-link">Over ons</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo ($currentPage == "index")? "pages/live-map.php":"live-map.php"; ?>" class="nav-link">Live kaart</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo ($currentPage == "index")? "pages/contact.php":"contact.php"; ?>" class="nav-link">Contact</a>
        </li>
        <li class="nav-item single">
            <a href="<?php echo ($currentPage == "index")? "pages/": ""; echo ($currentPage == "login")? "../index":"login";?>.php" class="nav-link btn-gresident d-inline-block"><?php echo ($currentPage == "login")? "Schrijf je in":"Meld je aan"; ?></a>
        </li>
    </ul>