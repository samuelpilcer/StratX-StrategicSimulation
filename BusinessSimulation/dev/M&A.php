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


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.js"></script>

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
                        <a class="page-scroll" href="#entreprises">Entreprises</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#admin">Interface d'administration</a>
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
                <h1 id="homeHeading">Strat'X - Business Game</h1>
                <hr>
                <p>Simulation stratégique sectorielle - Le secteur des services informatiques</p>
                <p>Philippe Tibi - Walter Vejdovsky</p>
                <a href="#entreprises" class="btn btn-default btn-xl page-scroll">Business simulation</a>
            </div>
        </div>
    </header>

    <?php
        include 'connectBdd.php';
        include 'getYear.php'; // j'ai une variable $year qui contient l'année courante !
    ?>

    <section class="bg-success" id="entreprises">
        <div class="container">
            <div class="row">
                    <?php
                        include 'MAtraitement.php';
                        
                    ?>
                <form method="post" class="col-lg-8 col-lg-offset-2 text-center" action='M&A.php'>
                    <h2 class="section-heading">M&A : Entreprises à racheter <?php echo $annee; echo " étape "; echo $step;?></h2>



                    <?php
                        $req = $bdd->query("SELECT id, year, nom, description, reservePrice FROM MnA WHERE year = ".$annee."");
                        
                        ?></br></br>
                        
                        
                        <?php
                        while ($donnees = $req->fetch())
                        {
                            ?>
                            <div class="col-lg-8 col-lg-offset-2 text-center">
                                <strong>
                                <?php
                                echo $donnees['nom'];
                                ?>
                                </strong>
                                </br>
                                <?php
                                echo $donnees['description'];
                                ?>
                                </br>
                                Prix de réserve (en Millions de dollars) : 
                                <?php
                                echo $donnees['reservePrice'];
                                ?>
                                </br>
                                </br>
                                Je souhaiterais racheter cette entreprise pour (en Millions de dollars) :
                                <input type="number" class="form-control" name=<?php echo $donnees['id'];?> value=0>

                                </br>

                                <strong> 
                                <div id=<?php echo $donnees['id'];?>  style="height: 250px;"></div>

                                </br>
                                </br>

                                <script>
                                    new Morris.Bar({
                                        // ID of the element in which to draw the chart.
                                        element: <?php echo $donnees['id'];?>,
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
                                </script>
                            </div>
                                <?php
                        }
                    ?>
                                </br>
                                </br>
                                Mon identifiant :
                                <input class="form-control" name="identifiant" value=0>

                                </br>
                                </br>

                    </br>
                    <button type="submit" class="page-scroll btn btn-dark btn-xl sr-button">Envoyer les offres d'achat</a>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-dark" id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Dashboard</h2>
                    <hr class="light"> </br>
                    <h4>Cette interface vous permettra d'accéder à toutes les données nécessaires sur le marché et sur votre entreprise !</h4>
                    </br> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="dashboard.php">Données de marché</a> </br>


                </div>
            </div>
        </div>
    </section>

    <section class="bg-success" id="admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Interface d'administration</h2>
                    <hr class="light"> </br>
                    <h4>Cette page est réservée à l'arbitre du business game. Ne vous y rendez pas.</h4>
                    </br> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="admin.php">Administration</a> </br>


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

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
