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
                <a class="navbar-brand page-scroll" href="#page-top">Strat'X</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#entreprises">Entreprises</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#market">Le marché</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#decisions">Stratégie</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<?php
                $player=3;
                // Connexion à la base de données
                try
                {
                    $bdd = new PDO('mysql:host=stratxfryzsamuel.mysql.db;dbname=stratxfryzsamuel;charset=utf8', 'stratxfryzsamuel', 'StratX01');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }



                // On trouve de quelle année il s'agit.
                $req = $bdd->query('SELECT year FROM EndYear');
                $annee=0;
                while ($donnees = $req->fetch())
                {
                    if ($donnees['year']>=$annee){$annee=$donnees['year'];}
                }
                if ($annee==0){$annee=2015;}
?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Strat'X - Business Game</h1>
                <hr>
                <p>Simulation stratégique sectorielle - Le secteur des services informatiques</p>
                <p>Tour 1 - Fin de l'année <?php echo $annee;?></p>
                <a href="#entreprises" class="btn btn-primary btn-xl page-scroll">Les entreprises du secteur</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="entreprises">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Les entreprises du secteur</h2>
                    <hr class="light">
                    <p class="text-faded">A remplir avec les données des autres !</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">En savoir plus</a>
                </div>
            </div>
        </div>
    </section>


    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dashboard</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query('SELECT player, year, sector, zone, ebitda FROM Positions WHERE year="'.$annee.'" AND player="'.$player.'"');
                        $positions=array();
                        $ca=0;
                        while ($donnees = $req->fetch())
                        {
                            $positions[$donnees['sector']][$donnees['zone']]=$donnees['ebitda'];
                            $ca=$ca+$donnees['ebitda'];
                        }
                    ?>
                    <h2 class="section-heading">Mes positions - Accenture</h2>
                    <hr class="light">
                    <p class="text">Chiffre d'affaire réalisé en <?php echo $annee; ?> sur chaque zone et chaque secteur d'activité. Total : <?php echo $ca;?> </p>
                    </br>


                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $positions[1][1]?> </td>
                            <td><?php echo $positions[1][2]?> </td>
                            <td><?php echo $positions[1][3]?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $positions[2][1]?> </td>
                            <td><?php echo $positions[2][2]?> </td>
                            <td><?php echo $positions[2][3]?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $positions[3][1]?> </td>
                            <td><?php echo $positions[3][2]?> </td>
                            <td><?php echo $positions[3][3]?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $positions[4][1]?> </td>
                            <td><?php echo $positions[4][2]?> </td>
                            <td><?php echo $positions[4][3]?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $positions[5][1]?> </td>
                            <td><?php echo $positions[5][2]?> </td>
                            <td><?php echo $positions[5][3]?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="market">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Taux de croissance sur <?php echo $annee; ?></h2>
                    <hr class="light">
                    <p class="text-faded">Matrice des taux de croissance en <?php echo $annee; ?> par activité et par zone géographique.</p>
                    </br>

                    <?php 
                        $req = $bdd->query('SELECT year, sector, zone, growth FROM GrowthRates WHERE year="'.$annee.'"');
                        $growth=array();
                        while ($donnees = $req->fetch())
                        {
                            $growth[$donnees['sector']][$donnees['zone']]=$donnees['growth'];
                        }
                    ?>

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $growth[1][1]?> </td>
                            <td><?php echo $growth[1][2]?> </td>
                            <td><?php echo $growth[1][3]?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $growth[2][1]?> </td>
                            <td><?php echo $growth[2][2]?> </td>
                            <td><?php echo $growth[2][3]?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $growth[3][1]?> </td>
                            <td><?php echo $growth[3][2]?> </td>
                            <td><?php echo $growth[3][3]?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $growth[4][1]?> </td>
                            <td><?php echo $growth[4][2]?> </td>
                            <td><?php echo $growth[4][3]?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $growth[5][1]?> </td>
                            <td><?php echo $growth[5][2]?> </td>
                            <td><?php echo $growth[5][3]?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
   
   
   <section id="decisions" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Grandes orientations stratégiques</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="text-faded">Vous avez généré <?php echo $ca;?> $ de profit sur l'année <?php echo $annee;?>.</p>
                    <p class="text-faded">Sur quels secteurs et quelle région souhaitez-vous concentrer de façon prioritaire vos efforts pour l'année <?php echo $annee+1;?> ?</p>
                    </br>
                </div>
            </div>
        </div>


        <form action=<?php echo 'sendP'.$player.'.php'; ?> method="post" class="form-horizontal">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input11"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input12"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input13"></td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input21"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input22"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input23"></td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input31"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input32"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input33"></td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input41"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input42"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input43"></td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input51"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input52"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input53"></td>
                        </tr>
                    </table>
                    <input type="HIDDEN" class="form-control" name="annee" value=<?php echo $annee+1;?>>
                    </br>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <button type="submit" class="page-scroll btn btn-primary btn-xl sr-button">Prise de décision</a>
                    </div>
                </div>
        </form>

    </section>


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
