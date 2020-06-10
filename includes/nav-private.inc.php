<form class="form-inline mr-auto my-2 my-lg-0 w-50">
    <div class="input-group w-100">
    <input type="text" class="form-control" name="searchUser" placeholder="Zoek een gebruiker op" aria-label="Gebruiker opzoeken">
    <div class="input-group-append">
        <button class="btn btn-gresident" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
    </div>
    </div>
</form>
<ul class="navbar-nav">
    <li class="d-flex flex-row align-items-center link-gn col-5">
        <div class="saldo-label col-6">Saldo:</div>
        <div class="saldo-block col-6 p-0 d-flex p-0 justify-content-end">
            <?php echo $userInfo['green_points']; ?>
            <img class="coins" src="../img/g_coins.svg" alt="GP">
        </div>
    </li>
    <li class="nav-item d-flex align-items-center dropdown mx-1">
        <a href="#" class="nav-link" id="notification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        </a>
        <div class="dropdown-menu notifications dropdown-menu-right p-0" aria-labelledby="notification">
            <div class="card border-0">
                <div class="card-header bg-gresigreen">
                    Notificaties
                </div>
                <div class="card-body p-0">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item d-flex align-items-center dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="avatar thumb-45 mr-2" src="../img/avatar/<?php echo (!empty($userInfo))? htmlspecialchars($userInfo['avatar']): "default.png"; ?>" alt="User avatar">
            <?php echo (!empty($fullName))? $fullName: "[Placeholder name]"; ?>
        </a>
        <div class="dropdown-menu profile dropdown-menu-right" aria-labelledby="profile">
            <a class="dropdown-item" href="#">Profiel</a>
            <a class="dropdown-item" href="#">Instellingen</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../pages/logout.php">Afmelden</a>
        </div>
    </li>
</ul>