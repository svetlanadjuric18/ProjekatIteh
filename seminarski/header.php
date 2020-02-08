<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <nav class="classy-navbar" id="essenceNav">
            <a class="nav-brand" href="index.html"><img src="img/logo.png" alt=""></a>
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <div class="classy-menu">
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <div class="classynav">
                    <ul>
                        <li><a href="index.php">Pocetna</a></li>
                        <li><a href="vesti.php">Vesti</a></li>
                        <?php if($_SESSION['ulogovaniUser']->ulogovan === true){
                          ?>
                          <li><a href="proizvodi.php">Proizvodi</a></li>
                          <?php
                                if($_SESSION['ulogovaniUser']->isAdmin()){
                                    ?>
                                        <li><a href="adminStrane.php">Admin Strane</a></li>
                                    <?php
                                }
                                ?>
                                  <li><a href="logout.php">Logout</a></li>
                                <?php
                        }else{
                          ?>
                          <li><a href="registracija.php">Registracija</a></li>
                          <li><a href="login.php">Login</a></li>
                          <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
