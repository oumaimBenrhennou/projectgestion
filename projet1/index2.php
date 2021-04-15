<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "Admin") {
        ?>
        <!DOCTYPE html>
        <html lang="FR">

            <head>
                <!-- Required meta tags-->
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Title Page-->
                <title>Gestion de pointage</title>

                <!-- Fontfaces CSS-->
                <link href="style/font-face.css" rel="stylesheet" media="all">
                <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
                <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

                <!-- Bootstrap CSS-->
                <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

                <!-- Vendor CSS-->
                <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
                <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
                <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
                <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
                <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
                <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

                <!-- JS -->
                <script src="script/jquery-3.3.1.min.js" type="text/javascript"></script>
                <script src="script/main.js" type="text/javascript"></script>
                <!-- Main CSS-->
                <link href="style/theme.css" rel="stylesheet" media="all">
                <link href="style/main.css" rel="stylesheet" type="text/css"/>
            </head>

            <body class="animsition">
                <div class="page-wrapper">
                    <!-- HEADER MOBILE-->
                    <header class="header-mobile d-block d-lg-none">
                        <div class="header-mobile__bar">
                            <div class="container-fluid">
                                <div class="header-mobile-inner">
                                    <a class="logo" href="./">
                                        <span class="h2 text-light">Pointage</span>
                                    </a>
                                    <button class="hamburger hamburger--slider" type="button">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <nav class="navbar-mobile">
                            <div class="container-fluid">
                                <ul class="navbar-mobile__list list-unstyled">
                                    <li class="has-sub">
                                        <a class="js-arrow" href="#">
                                            <i class="zmdi zmdi-hc-1x zmdi-chart"></i>GESTION</a>
                                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                            <li>
                                                <a href="#filieres" class="filiere"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>filieres</a>
                                            </li>
                                            <li>
                                                <a href="#Employés" class="employe"><i class="zmdi zmdi-hc-1x zmdi-accounts"></i>Employés</a>
                                            </li>
                                            <li>
                                                <a href="#classess" class="classes"><i class="zmdi zmdi-hc-1x zmdi-settings"></i>classess</a>
                                            </li>
                                            <li>
                                                <a href="#Pointages" class="pointage"><i class="zmdi zmdi-hc-1x zmdi-check"></i>Pointages</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a href="#Statistiques" class="statistiques"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Statistiques</a>
                                    </li>
                                    <li class="has-sub">
                                        <a href="#Historique" class="historique"><i class="zmdi zmdi-hc-1x zmdi-accounts"></i>Historique</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!-- END HEADER MOBILE-->

                    <!-- MENU SIDEBAR-->
                    <aside class="menu-sidebar d-none d-lg-block">
                        <div class="logo">
                            <a href="./">
                                <span class="h2 text-light">Pointage</span>
                            </a>
                        </div>
                        <div class="menu-sidebar__content js-scrollbar1">
                            <nav class="navbar-sidebar">
                                <ul class="list-unstyled navbar__list">
                                    <li class="has-sub">
                                        <a class="js-arrow" href="#">
                                            <i class="zmdi zmdi-hc-1x zmdi-chart"></i>Gestion</a>
                                        <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                                            <li>
                                                <a href="#filieres" class="filiere"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>filieres</a>
                                            </li>
                                            <li>
                                                <a href="#Employés" class="employe"><i class="zmdi zmdi-hc-1x zmdi-accounts"></i>Employés</a>
                                            </li>
                                            <li>
                                                <a href="#classess" class="classes"><i class="zmdi zmdi-hc-1x zmdi-settings"></i>classess</a>
                                            </li>
                                            <li>
                                                <a href="#Pointages" class="pointage"><i class="zmdi zmdi-hc-1x zmdi-check"></i>Pointages</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="has-sub">
                                        <a href="#Statistiques" class="statistiques"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Statistiques</a>
                                    </li>
                                    <li class="has-sub">
                                        <a href="#Historique" class="historique"><i class="zmdi zmdi-hc-1x zmdi-accounts"></i>Historique</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </aside>
                    <!-- END MENU SIDEBAR-->

                    <!-- PAGE CONTAINER-->
                    <div class="page-container">
                        <!-- HEADER DESKTOP-->
                        <header class="header-desktop">
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="header-wrap">
                                        <div class="form-header">

                                        </div>
                                        <div class="header-button">

                                            <div class="account-wrap">
                                                <div class="account-item clearfix js-item-menu">
                                                    <div class="image">
                                                        <img src="img/<?php
                                                        if (isset($_SESSION['photo'])) {
                                                            echo $_SESSION['photo'];
                                                        } else
                                                            echo 'no-photo.png'
                                                            ?>" class="img-fluid h-100 w-100" style="object-fit: cover" alt="" />
                                                    </div>
                                                    <div class="content">
                                                        <a class="js-acc-btn text-light" href="#"><?php
                                                            if (isset($_SESSION['IdFiliere'])) {
                                                                echo $_SESSION['IdFiliere'];
                                                            }
                                                            ?></a>
                                                    </div>
                                                    <div class="account-dropdown js-dropdown">
                                                        <div class="info clearfix">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="img/<?php
                                                                    if (isset($_SESSION['photo'])) {
                                                                        echo $_SESSION['photo'];
                                                                    }
                                                                    ?>" class="img-fluid h-100 w-100" style="object-fit: cover" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h5 class="name">
                                                                    <a href="#"><?php
                                                                        if (isset($_SESSION['IdFiliere'])) {
                                                                            echo $_SESSION['IdFiliere'];
                                                                        }
                                                                        ?></a>
                                                                </h5>
                                                                <span class="email"><?php
                                                                    if (isset($_SESSION['email'])) {
                                                                        echo $_SESSION['email'];
                                                                    }
                                                                    ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="account-dropdown__footer">
                                                            <a href="./logout.php">
                                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content">
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 mb-4" id="main-content">
                                            <?php
                                            include_once './pages/statistiques.php';
                                            ?>
                                        </div>
                                        <div style="height: 15px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTAINER-->

                </div>

                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="vendor/slick/slick.min.js">
                </script>
                <script src="vendor/wow/wow.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="vendor/circle-progress/circle-progress.min.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="vendor/select2/select2.min.js">
                </script>

                <!-- Main JS-->
                <script src="js/main.js"></script>

            </body>

        </html>
        <?php
    } else {
        include_once './pages/HistoriqueSimple.php';
    }
} else {
    header('Location:./login.php');
}
?>
