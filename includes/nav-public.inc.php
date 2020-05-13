    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link">Over ons</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Live kaart</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item aanmelden">
            <a href="<?php echo ($currentPage == "index")? "pages/": ""; echo ($currentPage == "login")? "../index":"login";?>.php" class="nav-link aanmelden d-inline-block"><?php echo ($currentPage == "login")? "Schrijf je in":"Meld je aan"; ?></a>
        </li>
    </ul>