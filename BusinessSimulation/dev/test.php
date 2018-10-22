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
                <a class="navbar-brand page-scroll" href="#page-top">Strat'X - Ecole Polytechnique</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#header">Accueil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#results">Décisions</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<?php
                // Connexion à la base de données
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=SimulationStrat;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }



                    //On remplit un tableau avec les mises de chacun
                    $req = $bdd->query('SELECT player, year, sector, zone, ebitda FROM Positions WHERE year=2015');
                    $positions=array();
                    $ca=0;
                    while ($donnees = $req->fetch())
                    {
                        $positions[$donnees['player']][$donnees['sector']][$donnees['zone']]=$donnees['ebitda'];
                        echo 'Le joueur '.$donnees['player'].' a réalisé '.$positions[$donnees['player']][$donnees['sector']][$donnees['zone']].' sur le secteur '.$donnees['sector'].' et la zone géographique '.$donnees['zone'].' cette année !';
                    }

                    $req = $bdd->query('SELECT year, sector, zone, growth FROM GrowthRates WHERE year=2015');
                    $growth=array();
                    $nPlayers=array();
                    while ($donnees = $req->fetch())
                    {
                        $nPlayers[$donnees['sector']][$donnees['zone']]=0;
                        $growth[$donnees['sector']][$donnees['zone']]=$donnees['growth'];
                        echo 'La croissance a été de '.$growth[$donnees['sector']][$donnees['zone']].' sur le secteur '.$donnees['sector'].' et la zone géographique '.$donnees['zone'].' cette année !';
                    }


                    $req = $bdd->query('SELECT player, year, sector, zone, value FROM Game WHERE year=2015');
                    $game=array();
                    while ($donnees = $req->fetch())
                    {
                        $game[$donnees['player']][$donnees['sector']][$donnees['zone']]=$donnees['value'];
                        if($donnees['value']>=1)
                        {
                             $nPlayers[$donnees['sector']][$donnees['zone']]=$nPlayers[$donnees['sector']][$donnees['zone']]+1;
                        }
                    }

                    for($player=1;$player<=4;$player++)
                    {
                        for($sector=1; $sector<=5; $sector++)
                        {
                            for($zone=1; $zone<=3; $zone++)
                            {
                                echo 'Le joueur '.$player.' va réaliser '.$positions[$player][$sector][$zone].' sur le secteur '.$sector.' et la zone géographique '.$zone.' !';
                                if($nPlayers[$sector][$zone]==0)
                                {
                                    $positions[$player][$sector][$zone]=$positions[$player][$sector][$zone]*(1+$growth[$sector][$zone]/100);
                                }
                                else
                                {
                                    $positions[$player][$sector][$zone]=$positions[$player][$sector][$zone]*(1 + $growth[$sector][$zone]*(1+$game[$player][$sector][$zone]/(100*$nPlayers[$sector][$zone])));
                                }
                                echo 'Le joueur '.$player.' va réaliser '.$positions[$player][$sector][$zone].' sur le secteur '.$sector.' et la zone géographique '.$zone.' !';

                            }
                        }
                    }
                
                


                // On trouve de quelle année il s'agit.
                $req = $bdd->query('SELECT year FROM EndYear');
                $annee=0;
                while ($donnees = $req->fetch())
                {
                    if ($donnees['year']>=$annee){$annee=$donnees['year'];}
                }
                if ($annee==0){$annee=2015;}
                $annee=$annee+1;
                
?>

    <header id="header">
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Strat'X - Business Game</h1>
                <hr>
                <p>Simulation stratégique sectorielle - Le secteur des services informatiques</p>
                <p>Tour 1 - Vos décisions pour <?php echo $annee;?>.</p>
                <a href="#entreprises" class="btn btn-primary btn-xl page-scroll">Décisions stratégiques <?php echo $annee;?></a>
            </div>
        </div>
    </header>

   
   <section id="results" class="bg-dark">
        

        <div class="container">
            <div class="row">
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
                            <p class="text-faded">Les valeurs suivantes ont été enregistrées : </p>
                            </br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-lg-offset-2 text-center">

                    <?php
                                    $req = $bdd->query('SELECT player, year, sector, zone, value FROM Game ORDER BY year ASC, player ASC');
                                    $positions=array();
                                    $ca=0;
                                    while ($donnees = $req->fetch())
                                    {
                                        if($donnees['value']>=1){
                                            echo "Année : ".$donnees['year'].". Le joueur " .$donnees['player'] ." a mis ".$donnees['value']." sur le secteur ".$donnees['sector']." et la zone ".$donnees['zone']." !";
                    ?> 
                                    </br>
                    <?php
                                        }
                                }
                            ?>
                            </br>
                            <?php echo "On est en : ".$annee; ?>
                </div>
            </div>
        </div>
        </br>
        <form class="col-lg-8 col-lg-offset-2 text-center" action="admin.php" method="post">
            <input type="HIDDEN" class="form-control" name="annee" value=<?php echo $annee;?>>
            <button type="submit" class="page-scroll btn btn-primary btn-xl sr-button">Terminer la période</a>
        </div>


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
