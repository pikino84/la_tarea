<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="relatives_list.php" class="logo">
                    <img src="assets/images/logo_sm.png" alt="" height="26" class="logo-small">
                    <img src="assets/images/logo.png" alt="" height="50" class="logo-large">
                </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras topbar-custom">
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
            </div>
            <!-- end menu-extras -->
            <div class="clearfix"></div>
        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                <?php  
                //Array                
                $menu[] = array('relatives_list.php', 'fi-heart', 'Familia');
                $menu[] = array('users_list.php', 'icon-people' ,'Usuarios');
                $menu[] = array('login_out.php', 'icon-logout', 'Salir', );
                $i = 0;
                //ESTRUCTURA DE CONTROL DO WHILE
                do {
                ?>
                    <li class="has-submenu">
                        <a href="<?= $menu[$i][0]; ?>"><i class="<?= $menu[$i][1]; ?>"></i><?= $menu[$i][2]; ?></a>
                    </li>
                <?php
                    $i++;
                } while ($i <= 2);
                ?>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>