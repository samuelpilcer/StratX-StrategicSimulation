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
                        <a class="page-scroll" href="#market">Le marché</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#history">Historique</a>
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
                <a href="decision.php" class="btn btn-primary btn-xl page-scroll">Prise de décision</a>
            </div>
        </div>
    </header>



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
                    <h2 class="section-heading">Taux de croissance prévus pour <?php echo $annee;?> </h2>
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
                            <td><?php echo $growth["NA_CS"];?> % </td>
                            <td><?php echo $growth["EMEA_CS"];?> % </td>
                            <td><?php echo $growth["ROW_CS"];?> % </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $growth["NA_NEW"];?> % </td>
                            <td><?php echo $growth["EMEA_NEW"];?> % </td>
                            <td><?php echo $growth["ROW_NEW"];?> % </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $growth["NA_INFRA"];?> % </td>
                            <td><?php echo $growth["EMEA_INFRA"];?> % </td>
                            <td><?php echo $growth["ROW_INFRA"];?> % </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $growth["NA_OS"];?> % </td>
                            <td><?php echo $growth["EMEA_OS"];?> % </td>
                            <td><?php echo $growth["ROW_OS"];?> % </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $growth["NA_BPO"];?> % </td>
                            <td><?php echo $growth["EMEA_BPO"];?> % </td>
                            <td><?php echo $growth["ROW_BPO"];?> % </td>
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
                            $resultats=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
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
                            <td><?php echo $pos["NA_CS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_CS"];?> M$ </td>
                            <td><?php echo $pos["ROW_CS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> M$ </td>
                            <td><?php echo $pos["EMEA_NEW"];?> M$ </td>
                            <td><?php echo $pos["ROW_NEW"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["ROW_INFRA"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_OS"];?> M$ </td>
                            <td><?php echo $pos["ROW_OS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> M$ </td>
                            <td><?php echo $pos["EMEA_BPO"];?> M$ </td>
                            <td><?php echo $pos["ROW_BPO"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td><?php echo $margin['NA'];?> % </td>
                            <td><?php echo $margin['EMEA'];?> % </td>
                            <td><?php echo $margin['ROW'];?> % </td>
                    </table>
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 1");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }

                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 1");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }

                                $req = $bdd->query("SELECT NbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND player = 1");
                                while ($data = $req->fetch())
                                {
                                    $valo=$data["NbActions"]*$data["prix"];
                                    $cours=$data["prix"];
                                    $div=$data["dividende"];
                                }
                            ?>
                            <h3>Chiffre d'affaire total : <?php echo $resultats; ?> millions de dollars.</h3>
                            <h3>Résultat opérationnel : <?php echo $ebit; ?> millions de dollars.</h3>
                            <h3>Marge opérationnelle totale : <?php echo round(100*$ebit/$resultats, 2); ?> %.</h3>
                            <h3>Dette nette : <?php echo $dette; ?> millions de dollars.</h3>
                            </br>
                            <h3>Capitalisation boursière : <?php echo $valo; ?> millions de dollars.</h3>
                            <h3>Cours de l'action : <?php echo $cours; ?> $/action.</h3>
                            <h3>Dividendes versés aux actionnaires au titre de <?php echo ($annee-1); ?> : <?php echo $div; ?> $/action.</h3>
                        </div>
                    </div>
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
                            $resultats=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
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
                            <td><?php echo $pos["NA_CS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_CS"];?> M$ </td>
                            <td><?php echo $pos["ROW_CS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> M$ </td>
                            <td><?php echo $pos["EMEA_NEW"];?> M$ </td>
                            <td><?php echo $pos["ROW_NEW"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["ROW_INFRA"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_OS"];?> M$ </td>
                            <td><?php echo $pos["ROW_OS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> M$ </td>
                            <td><?php echo $pos["EMEA_BPO"];?> M$ </td>
                            <td><?php echo $pos["ROW_BPO"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td><?php echo $margin['NA'];?> % </td>
                            <td><?php echo $margin['EMEA'];?> % </td>
                            <td><?php echo $margin['ROW'];?> % </td>
                    </table>
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 2");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }

                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 2");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }

                                $req = $bdd->query("SELECT NbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND player = 2");
                                while ($data = $req->fetch())
                                {
                                    $valo=$data["NbActions"]*$data["prix"];
                                    $cours=$data["prix"];
                                    $div=$data["dividende"];
                                }
                            ?>
                            <h3>Chiffre d'affaire total : <?php echo $resultats; ?> millions de dollars.</h3>
                            <h3>Résultat opérationnel : <?php echo $ebit; ?> millions de dollars.</h3>
                            <h3>Marge opérationnelle totale : <?php echo round(100*$ebit/$resultats, 2); ?> %.</h3>
                            <h3>Dette nette : <?php echo $dette; ?> millions de dollars.</h3>
                            </br>
                            <h3>Capitalisation boursière : <?php echo $valo; ?> millions de dollars.</h3>
                            <h3>Cours de l'action : <?php echo $cours; ?> $/action.</h3>
                            <h3>Dividendes versés aux actionnaires au titre de <?php echo ($annee-1); ?> : <?php echo $div; ?> $/action.</h3>
                        </div>
                    </div>
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
                            $resultats=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
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
                            <td><?php echo $pos["NA_CS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_CS"];?> M$ </td>
                            <td><?php echo $pos["ROW_CS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> M$ </td>
                            <td><?php echo $pos["EMEA_NEW"];?> M$ </td>
                            <td><?php echo $pos["ROW_NEW"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["ROW_INFRA"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_OS"];?> M$ </td>
                            <td><?php echo $pos["ROW_OS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> M$ </td>
                            <td><?php echo $pos["EMEA_BPO"];?> M$ </td>
                            <td><?php echo $pos["ROW_BPO"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td><?php echo $margin['NA'];?> % </td>
                            <td><?php echo $margin['EMEA'];?> % </td>
                            <td><?php echo $margin['ROW'];?> % </td>
                    </table>
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 3");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }

                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 3");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }

                                $req = $bdd->query("SELECT NbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND player = 3");
                                while ($data = $req->fetch())
                                {
                                    $valo=$data["NbActions"]*$data["prix"];
                                    $cours=$data["prix"];
                                    $div=$data["dividende"];
                                }
                            ?>
                            <h3>Chiffre d'affaire total : <?php echo $resultats; ?> millions de dollars.</h3>
                            <h3>Résultat opérationnel : <?php echo $ebit; ?> millions de dollars.</h3>
                            <h3>Marge opérationnelle totale : <?php echo round(100*$ebit/$resultats, 2); ?> %.</h3>
                            <h3>Dette nette : <?php echo $dette; ?> millions de dollars.</h3>
                            </br>
                            <h3>Capitalisation boursière : <?php echo $valo; ?> millions de dollars.</h3>
                            <h3>Cours de l'action : <?php echo $cours; ?> $/action.</h3>
                            <h3>Dividendes versés aux actionnaires au titre de <?php echo ($annee-1); ?> : <?php echo $div; ?> $/action.</h3>
                        </div>
                    </div>
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
                            $resultats=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
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
                            <td><?php echo $pos["NA_CS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_CS"];?> M$ </td>
                            <td><?php echo $pos["ROW_CS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><?php echo $pos["NA_NEW"];?> M$ </td>
                            <td><?php echo $pos["EMEA_NEW"];?> M$ </td>
                            <td><?php echo $pos["ROW_NEW"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
                            <td><?php echo $pos["NA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["EMEA_INFRA"];?> M$ </td>
                            <td><?php echo $pos["ROW_INFRA"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><?php echo $pos["NA_OS"];?> M$ </td>
                            <td><?php echo $pos["EMEA_OS"];?> M$ </td>
                            <td><?php echo $pos["ROW_OS"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Business process outsourcing</td>
                            <td><?php echo $pos["NA_BPO"];?> M$ </td>
                            <td><?php echo $pos["EMEA_BPO"];?> M$ </td>
                            <td><?php echo $pos["ROW_BPO"];?> M$ </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td><?php echo $margin['NA'];?> % </td>
                            <td><?php echo $margin['EMEA'];?> % </td>
                            <td><?php echo $margin['ROW'];?> % </td>
                    </table>
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 4");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }

                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 4");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }

                                $req = $bdd->query("SELECT NbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND player = 4");
                                while ($data = $req->fetch())
                                {
                                    $valo=$data["NbActions"]*$data["prix"];
                                    $cours=$data["prix"];
                                    $div=$data["dividende"];
                                }
                            ?>
                            <h3>Chiffre d'affaire total : <?php echo $resultats; ?> millions de dollars.</h3>
                            <h3>Résultat opérationnel : <?php echo $ebit; ?> millions de dollars.</h3>
                            <h3>Marge opérationnelle totale : <?php echo round(100*$ebit/$resultats, 2); ?> %.</h3>
                            <h3>Dette nette : <?php echo $dette; ?> millions de dollars.</h3>
                            </br>
                            <h3>Capitalisation boursière : <?php echo $valo; ?> millions de dollars.</h3>
                            <h3>Cours de l'action : <?php echo $cours; ?> $/action.</h3>
                            <h3>Dividendes versés aux actionnaires au titre de <?php echo ($annee-1); ?> : <?php echo $div; ?> $/action.</h3>
                        </div>
                    </div>
                </div>
    </section>





    <section id="history" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Historique - CapGemini</h2>
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
                            $resultats=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
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
                            <td>2016 orga</td>
                            <td>2016</td>
                            <td>2017 orga</td>
                            <td>2017</td>
                            <td>2018 orga</td>
                            <td>2018</td>
                            <td>2019 orga</td>
                            <td>2019</td>
                            <td>2020 orga</td>
                            <td>2020</td>
                        </thead>
                        <tr>
                            <td>Chiffre d'affaires total</td>
                            <td>13500 M$</td>
                            <td>14069 M$</td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 1 AND player = 1");
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
                                    $resultats2017org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017org;
                            ?>
                             M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 3 AND player = 1");
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
                                    $resultats2017=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 1 AND player = 1");
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
                                    $resultats2018org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 3 AND player = 1");
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
                                    $resultats2018=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 1 AND player = 1");
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
                                    $resultats2019org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 3 AND player = 1");
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
                                    $resultats2019=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 1 AND player = 1");
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
                                    $resultats2020org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 3 AND player = 1");
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
                                    $resultats2020=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020;
                            ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Résultat opérationnel</td>
                            <td>1511 M$ </td>
                            <td>1613 M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 2 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017org=$data["EBIT"];
                                }
                                echo $ebit2017org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 2 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018org=$data["EBIT"];
                                }
                                echo $ebit2018org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 2 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019org=$data["EBIT"];
                                }
                                echo $ebit2019org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 2 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020org=$data["EBIT"];
                                }
                                echo $ebit2020org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Flux de trésorerie</td>
                            <td>/ </td>
                            <td>1187 M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020*0.78;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Dette nette</td>
                            <td>/ </td>
                            <td>1500 M$ </td>
                            <td>/</td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2017 AND step = 3 AND player = 1");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2017=$data["value"];
                                }
                                echo $dette2017;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2018 AND step = 3 AND player = 1");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2018=$data["value"];
                                }
                                echo $dette2018;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2019 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2019=$data["value"];
                                }
                                echo $dette2019;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2020 AND step = 3 AND player = 1");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2020=$data["value"];
                                }
                                echo $dette2020;
                                ?> M$ </td>
                        </tr>

                        <tr>
                            <td>Croissance</td>
                            <td>3.40 % </td>
                            <td>7.80 % </td>
                            <td><?php echo round(100*($resultats2017org*$resultats2017org/(14070*$resultats2017org)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2017*$resultats2017/($resultats2017*14070)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018org*$resultats2018org/($resultats2018org*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018*$resultats2018/($resultats2018*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019org*$resultats2019org/($resultats2019org*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019*$resultats2019/($resultats2019*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020org*$resultats2020org/($resultats2020org*$resultats2019)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020*$resultats2020/($resultats2020*$resultats2019)-1),2);?> % </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td>/ </td>
                            <td>11.5 % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND player = 1");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2017 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $margin2017=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td> / </td>
                            <td><?php echo round($margin2017, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND player = 1");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2018 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $margin2018=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2018, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND player = 1");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2019 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $margin2019=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2019, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND player = 1");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2020 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $margin2020=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td><?php echo round($margin2020, 2);?> % </td>
                            <td>/ </td>
                        </tr>
                        <tr>
                            <td>Prix de l'action</td>
                            <?php
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2017 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $prix2017=$data["prix"];
                               $nbActions2017=$data["nbActions"];
                               $cap2017=$data["prix"]*$data["nbActions"];
                               $div2017=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2018 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $prix2018=$data["prix"];
                               $nbActions2018=$data["nbActions"];
                               $cap2018=$data["prix"]*$data["nbActions"];
                               $div2018=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2019 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $prix2019=$data["prix"];
                               $nbActions2019=$data["nbActions"];
                               $cap2019=$data["prix"]*$data["nbActions"];
                               $div2019=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2020 AND player = 1");
                            while ($data = $req->fetch())
                            {
                               $prix2020=$data["prix"];
                               $nbActions2020=$data["nbActions"];
                               $cap2020=$data["prix"]*$data["nbActions"];
                               $div2020=$data["dividende"];
                            }
                            ?>
                            <td>/ </td>
                            <td>88 $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2017;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2018;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2019;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2020;?> $ </td>
                        </tr>

                        <tr>
                            <td>Nombre d'actions</td>
                            <td>/ </td>
                            <td>170 M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2017;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2018;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2019;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2020;?> M </td>
                        </tr>

                        <tr>
                            <td>Capitalisation boursière</td>
                            <td>/ </td>
                            <td>14960 M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2017;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2018;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2019;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2020;?> M$ </td>
                        </tr>
                        
                        <tr>
                            <td>Dividendes versés</td>
                            <td>/ </td>
                            <td>1.3 $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2017;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2018;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2019;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2020;?> $/action </td>
                        </tr>
                    </table>
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                    
                    </div>
                </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Historique - Atos</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     
                    <hr class="primary">
                    
                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>2016 orga</td>
                            <td>2016</td>
                            <td>2017 orga</td>
                            <td>2017</td>
                            <td>2018 orga</td>
                            <td>2018</td>
                            <td>2019 orga</td>
                            <td>2019</td>
                            <td>2020 orga</td>
                            <td>2020</td>
                        </thead>
                        <tr>
                            <td>Chiffre d'affaires total</td>
                            <td>11794 M$</td>
                            <td>13094 M$</td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 1 AND player = 2");
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
                                    $resultats2017org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017org;
                            ?>
                             M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 3 AND player = 2");
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
                                    $resultats2017=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 1 AND player = 2");
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
                                    $resultats2018org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 3 AND player = 2");
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
                                    $resultats2018=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 1 AND player = 2");
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
                                    $resultats2019org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 3 AND player = 2");
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
                                    $resultats2019=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 1 AND player = 2");
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
                                    $resultats2020org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 3 AND player = 2");
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
                                    $resultats2020=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020;
                            ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Résultat opérationnel</td>
                            <td>1120 M$ </td>
                            <td>1198 M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 2 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017org=$data["EBIT"];
                                }
                                echo $ebit2017org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 2 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018org=$data["EBIT"];
                                }
                                echo $ebit2018org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 2 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019org=$data["EBIT"];
                                }
                                echo $ebit2019org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 2 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020org=$data["EBIT"];
                                }
                                echo $ebit2020org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Flux de trésorerie</td>
                            <td>/ </td>
                            <td>846 M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020*0.78;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Dette nette</td>
                            <td>/ </td>
                            <td>-480 M$ </td>
                            <td>/</td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2017 AND step = 3 AND player = 2");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2017=$data["value"];
                                }
                                echo $dette2017;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2018 AND step = 3 AND player = 2");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2018=$data["value"];
                                }
                                echo $dette2018;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2019 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2019=$data["value"];
                                }
                                echo $dette2019;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2020 AND step = 3 AND player = 2");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2020=$data["value"];
                                }
                                echo $dette2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Croissance</td>
                            <td>1.20 % </td>
                            <td>12.30 % </td>
                            <td><?php echo round(100*($resultats2017org*$resultats2017org/(13094*$resultats2017org)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2017*$resultats2017/($resultats2017*13094)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018org*$resultats2018org/($resultats2018org*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018*$resultats2018/($resultats2018*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019org*$resultats2019org/($resultats2019org*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019*$resultats2019/($resultats2019*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020org*$resultats2020org/($resultats2020org*$resultats2019)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020*$resultats2020/($resultats2020*$resultats2019)-1),2);?> % </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td>/ </td>
                            <td>9.2 % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND player = 2");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2017 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $margin2017=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td> / </td>
                            <td><?php echo round($margin2017, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND player = 2");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2018 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $margin2018=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2018, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND player = 2");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2019 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $margin2019=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2019, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND player = 2");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2020 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $margin2020=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td><?php echo round($margin2020, 2);?> % </td>
                            <td>/ </td>
                        </tr>
                        <tr>
                            <td>Prix de l'action</td>
                            <?php
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2017 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $prix2017=$data["prix"];
                               $nbActions2017=$data["nbActions"];
                               $cap2017=$data["prix"]*$data["nbActions"];
                               $div2017=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2018 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $prix2018=$data["prix"];
                               $nbActions2018=$data["nbActions"];
                               $cap2018=$data["prix"]*$data["nbActions"];
                               $div2018=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2019 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $prix2019=$data["prix"];
                               $nbActions2019=$data["nbActions"];
                               $cap2019=$data["prix"]*$data["nbActions"];
                               $div2019=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2020 AND player = 2");
                            while ($data = $req->fetch())
                            {
                               $prix2020=$data["prix"];
                               $nbActions2020=$data["nbActions"];
                               $cap2020=$data["prix"]*$data["nbActions"];
                               $div2020=$data["dividende"];
                            }
                            ?>
                            <td>/ </td>
                            <td>88 $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2017;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2018;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2019;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2020;?> $ </td>
                        </tr>

                        <tr>
                            <td>Nombre d'actions</td>
                            <td>/ </td>
                            <td>104 M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2017;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2018;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2019;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2020;?> M </td>
                        </tr>

                        <tr>
                            <td>Capitalisation boursière</td>
                            <td>/ </td>
                            <td>10400 M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2017;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2018;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2019;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2020;?> M$ </td>
                        </tr>
                        <tr>
                            <td>Dividendes versés</td>
                            <td>/ </td>
                            <td>1.1 $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2017;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2018;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2019;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2020;?> $/action </td>
                        </tr>
                    </table>
                    
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            
                        </div>
                    </div>
                </div>
    </section>


    <section class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Historique - Accenture</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     
                    <hr class="primary">
                    
                    
                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>2016 orga</td>
                            <td>2016</td>
                            <td>2017 orga</td>
                            <td>2017</td>
                            <td>2018 orga</td>
                            <td>2018</td>
                            <td>2019 orga</td>
                            <td>2019</td>
                            <td>2020 orga</td>
                            <td>2020</td>
                        </thead>
                        <tr>
                            <td>Chiffre d'affaires total</td>
                            <td>33390 M$</td>
                            <td>34300 M$</td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 1 AND player = 3");
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
                                    $resultats2017org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017org;
                            ?>
                             M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 3 AND player = 3");
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
                                    $resultats2017=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 1 AND player = 3");
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
                                    $resultats2018org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 3 AND player = 3");
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
                                    $resultats2018=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 1 AND player = 3");
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
                                    $resultats2019org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 3 AND player = 3");
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
                                    $resultats2019=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 1 AND player = 3");
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
                                    $resultats2020org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 3 AND player = 3");
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
                                    $resultats2020=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020;
                            ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Résultat opérationnel</td>
                            <td>4771 M$ </td>
                            <td>4819 M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 2 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017org=$data["EBIT"];
                                }
                                echo $ebit2017org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 2 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018org=$data["EBIT"];
                                }
                                echo $ebit2018org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 2 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019org=$data["EBIT"];
                                }
                                echo $ebit2019org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 2 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020org=$data["EBIT"];
                                }
                                echo $ebit2020org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Flux de trésorerie</td>
                            <td>/ </td>
                            <td>3834 M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018*0.78;
                                ?> M$ </td>
                            <td> </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020*0.78;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Dette nette</td>
                            <td>/ </td>
                            <td>-4800 M$ </td>
                            <td>/</td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2017 AND step = 3 AND player = 3");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2017=$data["value"];
                                }
                                echo $dette2017;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2018 AND step = 3 AND player = 3");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2018=$data["value"];
                                }
                                echo $dette2018;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2019 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2019=$data["value"];
                                }
                                echo $dette2019;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2020 AND step = 3 AND player = 3");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2020=$data["value"];
                                }
                                echo $dette2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Croissance</td>
                            <td>7.70 % </td>
                            <td>10.60 % </td>
                            <td><?php echo round(100*($resultats2017org*$resultats2017org/(34300*$resultats2017org)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2017*$resultats2017/($resultats2017*34300)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018org*$resultats2018org/($resultats2018org*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018*$resultats2018/($resultats2018*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019org*$resultats2019org/($resultats2019org*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019*$resultats2019/($resultats2019*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020org*$resultats2020org/($resultats2020org*$resultats2019)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020*$resultats2020/($resultats2020*$resultats2019)-1),2);?> % </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td>/ </td>
                            <td>14.1 % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND player = 3");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2017 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $margin2017=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td> / </td>
                            <td><?php echo round($margin2017, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND player = 3");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2018 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $margin2018=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2018, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND player = 3");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2019 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $margin2019=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2019, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND player = 3");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2020 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $margin2020=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td><?php echo round($margin2020, 2);?> % </td>
                            <td>/ </td>
                        </tr>
                        <tr>
                            <td>Prix de l'action</td>
                            <?php
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2017 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $prix2017=$data["prix"];
                               $nbActions2017=$data["nbActions"];
                               $cap2017=$data["prix"]*$data["nbActions"];
                               $div2017=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2018 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $prix2018=$data["prix"];
                               $nbActions2018=$data["nbActions"];
                               $cap2018=$data["prix"]*$data["nbActions"];
                               $div2018=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2019 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $prix2019=$data["prix"];
                               $nbActions2019=$data["nbActions"];
                               $cap2019=$data["prix"]*$data["nbActions"];
                               $div2019=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2020 AND player = 3");
                            while ($data = $req->fetch())
                            {
                               $prix2020=$data["prix"];
                               $nbActions2020=$data["nbActions"];
                               $cap2020=$data["prix"]*$data["nbActions"];
                               $div2020=$data["dividende"];
                            }
                            ?>
                            <td>/ </td>
                            <td>120 $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2017;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2018;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2019;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2020;?> $ </td>
                        </tr>

                        <tr>
                            <td>Nombre d'actions</td>
                            <td>/ </td>
                            <td>668 M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2017;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2018;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2019;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2020;?> M </td>
                        </tr>

                        <tr>
                            <td>Capitalisation boursière</td>
                            <td>/ </td>
                            <td>80160 M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2017;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2018;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2019;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2020;?> M$ </td>
                        </tr>
                        <tr>
                            <td>Dividendes versés</td>
                            <td>/ </td>
                            <td>2.2 $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2017;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2018;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2019;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2020;?> $/action </td>
                        </tr>
                    </table>
                    
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            
                        </div>
                    </div>
                </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Historique - Tata Consulting Services</h2>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-lg-offset-2 text-center">
                     
                    <hr class="primary">
                    

                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>2016 orga</td>
                            <td>2016</td>
                            <td>2017 orga</td>
                            <td>2017</td>
                            <td>2018 orga</td>
                            <td>2018</td>
                            <td>2019 orga</td>
                            <td>2019</td>
                            <td>2020 orga</td>
                            <td>2020</td>
                        </thead>
                        <tr>
                            <td>Chiffre d'affaires total</td>
                            <td>17623 M$</td>
                            <td>17623 M$</td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 1 AND player = 4");
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
                                    $resultats2017org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017org;
                            ?>
                             M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND step = 3 AND player = 4");
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
                                    $resultats2017=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2017;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 1 AND player = 4");
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
                                    $resultats2018org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND step = 3 AND player = 4");
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
                                    $resultats2018=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2018;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 1 AND player = 4");
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
                                    $resultats2019org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND step = 3 AND player = 4");
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
                                    $resultats2019=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2019;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 1 AND player = 4");
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
                                    $resultats2020org=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020org;
                            ?> M$ </td>
                            <td><?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND step = 3 AND player = 4");
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
                                    $resultats2020=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"]+$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"]+$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            echo $resultats2020;
                            ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Résultat opérationnel</td>
                            <td>4329 M$ </td>
                            <td>4329 M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 2 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017org=$data["EBIT"];
                                }
                                echo $ebit2017org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 2 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018org=$data["EBIT"];
                                }
                                echo $ebit2018org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 2 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019org=$data["EBIT"];
                                }
                                echo $ebit2019org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 2 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020org=$data["EBIT"];
                                }
                                echo $ebit2020org;
                                ?> M$ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020;
                                ?> M$ </td>
                        </tr>

                        <tr>
                            <td>Flux de trésorerie</td>
                            <td>/ </td>
                            <td>3464 M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2017 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2017=$data["EBIT"];
                                }
                                echo $ebit2017*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2018 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2018=$data["EBIT"];
                                }
                                echo $ebit2018*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2019 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2019=$data["EBIT"];
                                }
                                echo $ebit2019*0.78;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = 2020 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $ebit2020=$data["EBIT"];
                                }
                                echo $ebit2020*0.78;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Dette nette</td>
                            <td>/ </td>
                            <td>-5600 M$ </td>
                            <td>/</td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2017 AND step = 3 AND player = 4");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2017=$data["value"];
                                }
                                echo $dette2017;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2018 AND step = 3 AND player = 4");
                                
                                while ($data = $req->fetch())
                                {
                                    $dette2018=$data["value"];
                                }
                                echo $dette2018;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2019 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2019=$data["value"];
                                }
                                echo $dette2019;
                                ?> M$ </td>
                            <td>/ </td>
                            <td><?php $req = $bdd->query("SELECT value FROM Dette WHERE year = 2020 AND step = 3 AND player = 4");
                                $pos=array();
                                while ($data = $req->fetch())
                                {
                                    $dette2020=$data["value"];
                                }
                                echo $dette2020;
                                ?> M$ </td>
                        </tr>


                        <tr>
                            <td>Croissance</td>
                            <td>7.50 % </td>
                            <td>7.50 % </td>
                            <td><?php echo round(100*($resultats2017org*$resultats2017org/(17623*$resultats2017org)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2017*$resultats2017/($resultats2017*17623)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018org*$resultats2018org/($resultats2018org*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2018*$resultats2018/($resultats2018*$resultats2017)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019org*$resultats2019org/($resultats2019org*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2019*$resultats2019/($resultats2019*$resultats2018)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020org*$resultats2020org/($resultats2020org*$resultats2019)-1),2);?> % </td>
                            <td><?php echo round(100*($resultats2020*$resultats2020/($resultats2020*$resultats2019)-1),2);?> % </td>
                        </tr>
                        <tr>
                            <td>Marge opérationnelle</td>
                            <td>/ </td>
                            <td>24.6 % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2017 AND player = 4");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2017 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $margin2017=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td> / </td>
                            <td><?php echo round($margin2017, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2018 AND player = 4");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2018 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $margin2018=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2018, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2019 AND player = 4");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2019 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $margin2019=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td>/ </td>
                            <td><?php echo round($margin2019, 2);?> % </td>
                            <?php 
                                $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = 2020 AND player = 4");
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
                                    $resultatsNA=$pos["NA_CS"]+$pos["NA_NEW"]+$pos["NA_OS"]+$pos["NA_BPO"]+$pos["NA_INFRA"];
                                    $resultatsEMEA=$pos["EMEA_CS"]+$pos["EMEA_NEW"]+$pos["EMEA_OS"]+$pos["EMEA_BPO"]+$pos["EMEA_INFRA"];
                                    $resultatsROW=$pos["ROW_CS"]+$pos["ROW_NEW"]+$pos["ROW_OS"]+$pos["ROW_BPO"]+$pos["ROW_INFRA"];
                            }
                            $req = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = 2020 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $margin2020=($data["NA"]*$resultatsNA+$data["EMEA"]*$resultatsEMEA+$data["ROW"]*$resultatsROW)/($resultatsNA+$resultatsEMEA+$resultatsROW);
                            }
                            ?>
                            <td><?php echo round($margin2020, 2);?> % </td>
                            <td>/ </td>
                        </tr>
                        <tr>
                            <td>Prix de l'action</td>
                            <?php
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2017 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $prix2017=$data["prix"];
                               $nbActions2017=$data["nbActions"];
                               $cap2017=$data["prix"]*$data["nbActions"];
                               $div2017=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2018 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $prix2018=$data["prix"];
                               $nbActions2018=$data["nbActions"];
                               $cap2018=$data["prix"]*$data["nbActions"];
                               $div2018=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2019 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $prix2019=$data["prix"];
                               $nbActions2019=$data["nbActions"];
                               $cap2019=$data["prix"]*$data["nbActions"];
                               $div2019=$data["dividende"];
                            }
                            $req = $bdd->query("SELECT prix, dividende, nbActions FROM Capital WHERE year = 2020 AND player = 4");
                            while ($data = $req->fetch())
                            {
                               $prix2020=$data["prix"];
                               $nbActions2020=$data["nbActions"];
                               $cap2020=$data["prix"]*$data["nbActions"];
                               $div2020=$data["dividende"];
                            }
                            ?>
                            <td>/ </td>
                            <td>37 $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2017;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2018;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2019;?> $ </td>
                            <td>/ </td>
                            <td><?php echo $prix2020;?> $ </td>
                        </tr>

                        <tr>
                            <td>Nombre d'actions</td>
                            <td>/ </td>
                            <td>1970 M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2017;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2018;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2019;?> M </td>
                            <td>/ </td>
                            <td><?php echo $nbActions2020;?> M </td>
                        </tr>

                        <tr>
                            <td>Capitalisation boursière</td>
                            <td>/ </td>
                            <td>72890 M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2017;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2018;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2019;?> M$ </td>
                            <td>/ </td>
                            <td><?php echo $cap2020;?> M$ </td>
                        </tr>
                        <tr>
                            <td>Dividendes versés</td>
                            <td>/ </td>
                            <td>0.7 $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2017;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2018;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2019;?> $/action </td>
                            <td>/ </td>
                            <td><?php echo $div2020;?> $/action </td>
                        </tr>
                    </table>
                    
                    
                    </br>
                    </br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                     
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
