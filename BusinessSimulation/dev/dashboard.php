<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


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
                        <a class="page-scroll" href="#market">Le marché</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#macro">Données macroéconomiques</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entreprises<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#results">Comparaison des performances</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#capgemini">Cap Gemini</a></li>
                                <li><a href="#atos">Atos</a></li>
                                <li><a href="#accenture">Accenture</a></li>
                                <li><a href="#tcs">TCS</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Dashboard</h1>
                <hr>
                <p>Simulation stratégique sectorielle - Le secteur des services informatiques</p>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="market">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                            <h2 class="section-heading">La taille du marché</h2>
                            <hr class="light"> </br>
                            <h2 class="section-heading">Le marché des services IT - Subdivision sectorielle</h2>
                            <hr class="light"> </br>
                            <div id="market-sectors" style="height: 250px;"></div>

                            </br> </br> <hr class="light"> </br>
                            <h2 class="section-heading">Le marché des services IT - Subdivision géographique</h2>
                            <hr class="light"> </br>
                            <div id="market-geography"  style="height: 250px;"></div>
                   
                </div>
            </div>
        </div>
    </section>


    <section class="bg-dark" id="macro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                        <h2 class="section-heading">Données macroéconomiques</h2>
                        <hr class="light"> </br>
                        <h2 class="section-heading">Taux de croissance des résultats - Géographie</h2>
                        <hr class="light"> </br>
                        <div id="market-geo-growth" style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Taux de croissance des marges - Géographie</h2>
                        <hr class="light"> </br>
                        <div id="margin-geo-growth" style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Taux de croissance des résultats - Secteur</h2>
                        <hr class="light"> </br>
                        <div id="market-sectors-growth" style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        </br> </br> <hr class="light"> </br>

                </div>
            </div>
        </div>
    </section>


    <section class="bg-dark" id="results">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                        <h2 class="section-heading">Résultats des entreprises</h2>
                        <hr class="light"> </br>
                        <div id="revenue-comparaison" style="height: 250px;"></div>

                        <h2 class="section-heading">Market cap'</h2>
                        <hr class="light"> </br>
                        <div id="marketcap-comparaison" style="height: 250px;"></div>

                        <h2 class="section-heading">Résultats des entreprises en 2016 par géographie</h2>
                        <hr class="light"> </br>
                        <div id="revenue-comparaison-geo" style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition géographique des revenus par secteur</h2>
                        <hr class="light"> </br>
                        <div id="revenue-comparaison-sector"  style="height: 250px;"></div>
                        
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="capgemini">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Revenus de Cap Gemini</h2>
                        <hr class="light"> </br>
                        <div id="revenue-graph-CG" style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition géographique des revenus</h2>
                        <hr class="light"> </br>
                        <div id="revenue-geography-CG"  style="height: 250px;"></div>

                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition selon les secteurs d'activité</h2>
                        <hr class="light"> </br>
                        <div id="revenue-sector-CG"  style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark" id="atos">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Revenus de Atos</h2>
                        <hr class="light"> </br>
                        <div id="revenue-graph-Atos" style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition géographique des revenus</h2>
                        <hr class="light"> </br>
                        <div id="revenue-geography-Atos"  style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition selon les secteurs d'activité</h2>
                        <hr class="light"> </br>
                        <div id="revenue-sector-Atos"  style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="accenture">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Revenus de Accenture</h2>
                        <hr class="light"> </br>
                        <div id="revenue-graph-Acc" style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition géographique des revenus</h2>
                        <hr class="light"> </br>
                        <div id="revenue-geography-Acc"  style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition selon les secteurs d'activité</h2>
                        <hr class="light"> </br>
                        <div id="revenue-sector-Acc"  style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark" id="tcs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Revenus de Tata Consulting Services</h2>
                        <hr class="light"> </br>
                        <div id="revenue-graph-TCS" style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition géographique des revenus</h2>
                        <hr class="light"> </br>
                        <div id="revenue-geography-TCS"  style="height: 250px;"></div>
                        </br> </br> <hr class="light"> </br>
                        <h2 class="section-heading">Répartition selon les secteurs d'activité</h2>
                        <hr class="light"> </br>
                        <div id="revenue-sector-TCS"  style="height: 250px;"></div>
                </div>
            </div>
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
    <script src="js/jquery.js"></script>

    <?php include 'revenue-graph-CG.php'; ?>
    <?php include 'revenue-graph-Atos.php'; ?>
    <?php include 'revenue-graph-Acc.php'; ?>
    <?php include 'revenue-graph-TCS.php'; ?>
    <?php include 'revenue-comparaison.php'; ?>
    <?php include 'macro.php'; ?>

   <script>
            

            // Partie statique

        

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'market-sectors',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Sector: 'Consulting - New products (Cloud, ...)', Revenue: 15500000 },
                    { Sector: 'Consulting - Other', Revenue: 16000000 },
                    { Sector: 'IT Outsourcing - Infrastructure (Datacenters, ...)', Revenue: 13000000 },
                    { Sector: 'IT Outsourcing - Other', Revenue: 17000000 },
                    { Sector: 'Business Process Outsourcing', Revenue: 8000000 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Sector',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Revenue'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Marché']
                // The name of the data record attribute that contains x-values.
                
            });

            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'market-geography',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    { Geo: 'North America', Revenue: 27000000 },
                    { Geo: 'EMEA', Revenue: 38000000 },
                    { Geo: 'Rest of the world', Revenue: 12000000 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Geo',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Revenue'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Marché (4 acteurs considérés)']
                // The name of the data record attribute that contains x-values.
                
            });


            
        </script>
        

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
