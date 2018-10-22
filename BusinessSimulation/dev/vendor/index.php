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
                        <a class="page-scroll" href="#entreprises">Entreprises</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#market">Le marché</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dashboard">Dashboard</a>
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
                <p>Tour 1 - Fin de l'année <?php echo $annee;?></p>
                <a href="decision.php" class="btn btn-primary btn-xl page-scroll">Prise de décision</a>
            </div>
        </div>
    </header>

    <section class="bg-dark" id="entreprises">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Les entreprises du secteur</h2>
                    <hr class="light"> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="CapG.php">CapGemini</a> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="Atos.php">Atos</a> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="Accenture.php">Accenture</a> </br>
                    <a type="button" class="btn btn-default btn-lg btn-block" href="TCS.php">Tata - TCS</a> </br>

                    </br></br>
                    
                    <a type="button" class="btn btn-default btn-lg btn-block" href="admin.php">Administration</a> </br>
                </div>
            </div>
        </div>
    </section>


    <section id="market">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Le marché</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM GrowthRates WHERE year = ".$annee);
                        $growth=array();
                        while ($data = $req->fetch())
                        {
                            $growth=array(
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    );
                        }
                    ?>
                    <hr class="primary">
                    <h2 class="section-heading">Taux de croissance en <?php echo $annee;?> </h2>
                    <hr class="light">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $growth["NA_CS"];?> </td>
                            <td><?php echo $growth["EMEA_CS"];?> </td>
                            <td><?php echo $growth["ROW_CS"];?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $growth["NA_NEW"];?> </td>
                            <td><?php echo $growth["EMEA_NEW"];?> </td>
                            <td><?php echo $growth["ROW_NEW"];?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $growth["NA_INFRA"];?> </td>
                            <td><?php echo $growth["EMEA_INFRA"];?> </td>
                            <td><?php echo $growth["ROW_INFRA"];?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $growth["NA_OS"];?> </td>
                            <td><?php echo $growth["EMEA_OS"];?> </td>
                            <td><?php echo $growth["ROW_OS"];?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $growth["NA_BPO"];?> </td>
                            <td><?php echo $growth["EMEA_BPO"];?> </td>
                            <td><?php echo $growth["ROW_BPO"];?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

</section>

    <section id="dashboard" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dashboard - CapGemini</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND player = 1");
                        $pos=array();
                        while ($data = $req->fetch())
                        {
                            $pos=array(
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    );
                        }

                        $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = 1");
                        $margin=array();
                        while ($data = $req->fetch())
                        {
                            $margin=array(
                                            'NA' => $data['NA'],
                                            'EMEA' => $data['EMEA'],
                                            'ROW' => $data['ROW']
                                    );
                        }
                    ?>
                    <hr class="primary">
                    <h2 class="section-heading">Revenus et marges sur l'année <?php echo $annee;?> </h2>
                    <hr class="light">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $pos["NA_CS"];?> </td>
                            <td><?php echo $pos["EMEA_CS"];?> </td>
                            <td><?php echo $pos["ROW_CS"];?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> </td>
                            <td><?php echo $pos["EMEA_NEW"];?> </td>
                            <td><?php echo $pos["ROW_NEW"];?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> </td>
                            <td><?php echo $pos["ROW_INFRA"];?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> </td>
                            <td><?php echo $pos["EMEA_OS"];?> </td>
                            <td><?php echo $pos["ROW_OS"];?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> </td>
                            <td><?php echo $pos["EMEA_BPO"];?> </td>
                            <td><?php echo $pos["ROW_BPO"];?> </td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td><?php echo $margin['NA'];?> </td>
                            <td><?php echo $margin['EMEA'];?> </td>
                            <td><?php echo $margin['ROW'];?> </td>
                    </table>
                </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dashboard - Atos</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND player = 2");
                        $pos=array();
                        while ($data = $req->fetch())
                        {
                            $pos=array(
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    );
                        }

                        $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = 2");
                        $margin=array();
                        while ($data = $req->fetch())
                        {
                            $margin=array(
                                            'NA' => $data['NA'],
                                            'EMEA' => $data['EMEA'],
                                            'ROW' => $data['ROW']
                                    );
                        }
                    ?>
                    <hr class="primary">
                    <h2 class="section-heading">Revenus et marges sur l'année <?php echo $annee;?> </h2>
                    <hr class="light">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $pos["NA_CS"];?> </td>
                            <td><?php echo $pos["EMEA_CS"];?> </td>
                            <td><?php echo $pos["ROW_CS"];?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> </td>
                            <td><?php echo $pos["EMEA_NEW"];?> </td>
                            <td><?php echo $pos["ROW_NEW"];?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> </td>
                            <td><?php echo $pos["ROW_INFRA"];?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> </td>
                            <td><?php echo $pos["EMEA_OS"];?> </td>
                            <td><?php echo $pos["ROW_OS"];?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> </td>
                            <td><?php echo $pos["EMEA_BPO"];?> </td>
                            <td><?php echo $pos["ROW_BPO"];?> </td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td><?php echo $margin['NA'];?> </td>
                            <td><?php echo $margin['EMEA'];?> </td>
                            <td><?php echo $margin['ROW'];?> </td>
                    </table>
                </div>
    </section>


    <section class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dashboard - Accenture</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND player = 3");
                        $pos=array();
                        while ($data = $req->fetch())
                        {
                            $pos=array(
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    );
                        }

                        $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = 3");
                        $margin=array();
                        while ($data = $req->fetch())
                        {
                            $margin=array(
                                            'NA' => $data['NA'],
                                            'EMEA' => $data['EMEA'],
                                            'ROW' => $data['ROW']
                                    );
                        }
                    ?>
                    <hr class="primary">
                    <h2 class="section-heading">Revenus et marges sur l'année <?php echo $annee;?> </h2>
                    <hr class="light">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $pos["NA_CS"];?> </td>
                            <td><?php echo $pos["EMEA_CS"];?> </td>
                            <td><?php echo $pos["ROW_CS"];?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> </td>
                            <td><?php echo $pos["EMEA_NEW"];?> </td>
                            <td><?php echo $pos["ROW_NEW"];?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> </td>
                            <td><?php echo $pos["ROW_INFRA"];?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> </td>
                            <td><?php echo $pos["EMEA_OS"];?> </td>
                            <td><?php echo $pos["ROW_OS"];?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> </td>
                            <td><?php echo $pos["EMEA_BPO"];?> </td>
                            <td><?php echo $pos["ROW_BPO"];?> </td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td><?php echo $margin['NA'];?> </td>
                            <td><?php echo $margin['EMEA'];?> </td>
                            <td><?php echo $margin['ROW'];?> </td>
                    </table>
                </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dashboard - Tata Consulting Services</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php 
                        $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND player = 4");
                        $pos=array();
                        while ($data = $req->fetch())
                        {
                            $pos=array(
                                            'NA_CS' => $data['NA_CS'],
                                            'EMEA_CS' => $data['EMEA_CS'],
                                            'ROW_CS' => $data['ROW_CS'],
                                            'NA_NEW' => $data['NA_NEW'],
                                            'EMEA_NEW' => $data['EMEA_NEW'],
                                            'ROW_NEW' => $data['ROW_NEW'],
                                            'NA_OS' => $data['NA_OS'],
                                            'EMEA_OS' => $data['EMEA_OS'],
                                            'ROW_OS' => $data['ROW_OS'],
                                            'NA_INFRA' => $data['NA_INFRA'],
                                            'EMEA_INFRA' => $data['EMEA_INFRA'],
                                            'ROW_INFRA' => $data['ROW_INFRA'],
                                            'NA_BPO' => $data['NA_BPO'],
                                            'EMEA_BPO' => $data['EMEA_BPO'],
                                            'ROW_BPO' => $data['ROW_BPO']
                                    );
                        }

                        $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = 4");
                        $margin=array();
                        while ($data = $req->fetch())
                        {
                            $margin=array(
                                            'NA' => $data['NA'],
                                            'EMEA' => $data['EMEA'],
                                            'ROW' => $data['ROW']
                                    );
                        }
                    ?>
                    <hr class="primary">
                    <h2 class="section-heading">Revenus et marges sur l'année <?php echo $annee;?> </h2>
                    <hr class="light">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><?php echo $pos["NA_CS"];?> </td>
                            <td><?php echo $pos["EMEA_CS"];?> </td>
                            <td><?php echo $pos["ROW_CS"];?> </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> </td>
                            <td><?php echo $pos["EMEA_NEW"];?> </td>
                            <td><?php echo $pos["ROW_NEW"];?> </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> </td>
                            <td><?php echo $pos["ROW_INFRA"];?> </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> </td>
                            <td><?php echo $pos["EMEA_OS"];?> </td>
                            <td><?php echo $pos["ROW_OS"];?> </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> </td>
                            <td><?php echo $pos["EMEA_BPO"];?> </td>
                            <td><?php echo $pos["ROW_BPO"];?> </td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td><?php echo $margin['NA'];?> </td>
                            <td><?php echo $margin['EMEA'];?> </td>
                            <td><?php echo $margin['ROW'];?> </td>
                    </table>
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
