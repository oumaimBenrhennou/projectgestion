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
    <meta charset="UTF-8">
    <title>Gestion Ensaj</title>


    <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">

    <script src='vendor/jquery-3.2.1.min.js'></script>
    <script src='vendor/bootstrap-4.1/popper.min.js'></script>
    <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="./" class="h2 pt-2">ENSAJ</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?php
                                        if (isset($_SESSION['nom'])) {
                                            echo $_SESSION['nom'];
                                        }
                                    ?></strong>
                        </span>
                        
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>En ligne</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <b><span>GESTION</span></b>
                        </li>
                        <li>
                            <a href="./index.php?p=filiere"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Filières</a>
                        </li>
                        
                        <li>
                            <a href="./index.php?p=classes"><i class="zmdi zmdi-hc-1x zmdi-settings"></i>Classes</a>
                        </li>
                        <li>
                            <a href="./index.php?p=classificationlist"><i class="zmdi zmdi-hc-1x zmdi-settings"></i>Filtrage </a>
                        </li>
                        <li class="header-menu">
                            <span>STATISTIQUE</span>
                        </li>
                        <li>
                            <a href="./index.php?p=statistiques"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Statistiques</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="./logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>LOG OUT</span>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid" id="main-content">

                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        if($_GET['p']=="filiere"){
                            include_once './pages/filiere.php';
                        }elseif ($_GET['p']=="employe"){
                            include_once './pages/employe.php';
                        }elseif($_GET['p']=="classes"){
                            include_once './pages/classes.php';
                        }elseif($_GET['p']=="pointage"){
                            include_once './pages/Pointage.php';
                        }elseif($_GET['p']=="historique"){
                            include_once './pages/historique.php';
                        }elseif($_GET['p']=="statistiques"){
                            include_once './pages/statistiques.php';
                        }
                    elseif($_GET['p']=="classificationlist"){
                            include_once './pages/classificationlist.php';
                        }
                    }else{
                        include_once './pages/classificationlist.php';
                    }
                ?>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="script/index.js"></script>

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