<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>

    <div class="container-fluid" style="margin-top: 5%;">
        <div class="">
            <p class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques Classes/Filières</p>
            <hr class="line-seprate">
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=filiere" class="col-md-6 col-lg-3" style="margin: auto;">  
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">...</h2>
                                <span class="desc">filières</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-group-work"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=classes" class="col-md-6 col-lg-3" style="margin: auto;">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">...</h2>
                                <span class="desc">classes</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <script src="script/chart.min.js" type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" type="text/javascript"></script>
                        <canvas id="myChart" width="100" height="100"></canvas>
                        <script src="script/test.js" type="text/javascript"></script>
                        
                        
                        
                    </div>
                </div>
        </div>
    </div>
    <script src="script/statistique.js" type="text/javascript"></script>
    <?php
} else {
    header("Location: ../index.php");
}
?>