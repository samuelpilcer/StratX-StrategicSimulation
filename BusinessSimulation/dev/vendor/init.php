<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Strat'X</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">Strat'X</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php">Retour au jeu</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<?php
                
                // Connexion à la base de données
                include 'connectBdd.php';
                include 'getYear.php';
?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Strat'X - Business Game</h1>
                <hr>
                <p>Simulation stratégique sectorielle - Le secteur des services informatiques</p>
                <p>Année <?php echo $annee;?></p>
                <a href="init.php" class="btn btn-primary btn-xl page-scroll">Initialize</a>
            </div>
        </div>
    </header>



    <?php
        $req = $bdd->prepare('DELETE FROM `Bet` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Capital` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Dette` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `EBIT` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `EndYear` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `FocusPoints` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Game` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `GrowthRates` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Integrations` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Margin` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `MnA` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Multiples` WHERE 1');
        $req->execute();
        $req = $bdd->prepare('DELETE FROM `Positions` WHERE 1');
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `Capital` (`player`, `year`, `step`, `nbActions`, `dividende`, `prix`) VALUES
(1, 2017, 1, 170, 1.34, 88),
(2, 2017, 1, 104, 1.1, 100),
(3, 2017, 1, 668, 2.2, 120),
(4, 2017, 1, 1970, 0.68, 37);");
        $req->execute();
        $req = $bdd->prepare("INSERT INTO `Dette` (`player`, `year`, `step`, `value`) VALUES
(1, 2017, 1, 1500),
(2, 2017, 1, -480),
(4, 2017, 1, -4800),
(3, 2017, 1, -5600);");
        $req->execute();
        
    $req = $bdd->prepare("INSERT INTO `EBIT` (`player`, `year`, `step`, `EBIT`) VALUES
        (1, 2017, 1, 1613),
        (2, 2017, 1, 1200),
        (3, 2017, 1, 4800),
        (4, 2017, 1, 4300);");
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `EndYear` (`Year`, `Step`) VALUES
(2017, 1);");
        $req->execute();

         $req = $bdd->prepare("INSERT INTO `GrowthRates` (`year`, `NA_CS`, `EMEA_CS`, `ROW_CS`, `NA_NEW`, `EMEA_NEW`, `ROW_NEW`, `NA_OS`, `EMEA_OS`, `ROW_OS`, `NA_INFRA`, `EMEA_INFRA`, `ROW_INFRA`, `NA_BPO`, `EMEA_BPO`, `ROW_BPO`) VALUES
(2017, 2, 3, 2, 7, 8, 10, 2, 2, 2, -15, -10, -10, 6, 6, 6);");
        $req->execute();

         $req = $bdd->prepare("INSERT INTO `GrowthRates` (`year`, `NA_CS`, `EMEA_CS`, `ROW_CS`, `NA_NEW`, `EMEA_NEW`, `ROW_NEW`, `NA_OS`, `EMEA_OS`, `ROW_OS`, `NA_INFRA`, `EMEA_INFRA`, `ROW_INFRA`, `NA_BPO`, `EMEA_BPO`, `ROW_BPO`) VALUES
(2018, 2, 2, 3, 8, 9, 9, 1, 3, 1, -12, -13, -11, 5, 5, 5);");
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `GrowthRates` (`year`, `NA_CS`, `EMEA_CS`, `ROW_CS`, `NA_NEW`, `EMEA_NEW`, `ROW_NEW`, `NA_OS`, `EMEA_OS`, `ROW_OS`, `NA_INFRA`, `EMEA_INFRA`, `ROW_INFRA`, `NA_BPO`, `EMEA_BPO`, `ROW_BPO`) VALUES
(2019, 2, 2, 3, 8, 9, 9, 1, 3, 1, -12, -13, -11, 5, 5, 5);");
        $req->execute();
        
        $req = $bdd->prepare("INSERT INTO `GrowthRates` (`year`, `NA_CS`, `EMEA_CS`, `ROW_CS`, `NA_NEW`, `EMEA_NEW`, `ROW_NEW`, `NA_OS`, `EMEA_OS`, `ROW_OS`, `NA_INFRA`, `EMEA_INFRA`, `ROW_INFRA`, `NA_BPO`, `EMEA_BPO`, `ROW_BPO`) VALUES
(2020, 4, 3, 2, 10, 11, 15, 2, 2, 2, -10, -10, -10, 8, 8, 8);");
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `Margin` (`year`, `player`, `NA`, `EMEA`, `ROW`) VALUES
(2017, 1, 14.7, 10.8, 6),
(2017, 2, 8, 9.5, 9.5),
(2017, 3, 15.7, 12.8, 12.8),
(2017, 4, 28, 16, 28);");
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `MnA` (`id`, `nom`, `description`, `reservePrice`, `year`, `NA`, `EMEA`, `ROW`, `CS`, `New`, `OS`, `Infra`, `BPO`, `margin`) VALUES
(1, 'Digit US', 'American consulting firm based in SF, working on digital transformation, cloud storage, and artificial intelligence.', 800, 2017, 400, 0, 0, 0, 100, 0, 0, 0, 7),
(2, 'Infra US', 'Datacenter management firm based in San Francisco.', 1000, 2017, 2000, 0, 0, 0, 0, 0, 100, 0, 8),
(3, 'Digital diversification', 'A digital consulting firm working in Paris, London, Shanghai, NY and SF.', 300, 2017, 100, 50, 30, 0, 100, 0, 0, 0, 7),
(4, 'Outsourcing US/Canada', 'A consulting firm that mainly outsources tech department for banks and hedge funds.', 1800, 2017, 1500, 0, 0, 0, 0, 100, 0, 0, 13),
(5, 'Outsourcing Europe', 'Outsourcing of IT services for government and industry.', 1500, 2017, 0, 2000, 0, 0, 0, 100, 0, 0, 8);");
        $req->execute();

        $req = $bdd->prepare("INSERT INTO `Positions` (`player`, `year`, `step`, `NA_CS`, `EMEA_CS`, `ROW_CS`, `NA_NEW`, `EMEA_NEW`, `ROW_NEW`, `NA_OS`, `EMEA_OS`, `ROW_OS`, `NA_INFRA`, `EMEA_INFRA`, `ROW_INFRA`, `NA_BPO`, `EMEA_BPO`, `ROW_BPO`) VALUES
(1, 2017, 0, 2228, 4286, 606, 464, 1155, 171, 946, 2439, 348, 147, 380, 54, 214, 552, 79),
(2, 2017, 0, 300, 2500, 200, 50, 300, 20, 300, 2200, 200, 1400, 3400, 250, 200, 1800, 150),
(3, 2017, 0, 5000, 4300, 2000, 3200, 2900, 1500, 4400, 3900, 2000, 350, 300, 150, 1800, 1600, 800),
(4, 2017, 0, 2600, 1500, 1000, 300, 200, 150, 4500, 2500, 2000, 350, 200, 150, 1200, 700, 500);");
        $req->execute();

    ?>

   


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
