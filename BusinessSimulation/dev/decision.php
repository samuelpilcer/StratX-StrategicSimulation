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


    <?php
        include 'connectBdd.php';
        include 'getYear.php'; // j'ai une variable $year qui contient l'année courante !
    ?>

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
                        <a class="page-scroll" href="#strategy">Décisions stratégiques</a>
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
                <?php if ($step==1){ ?>
                <p>Tour 1 - Priorités stratégiques - Année <?php echo $annee;?></p>
                <?php } ?>
                <?php if ($step==2){ ?>
                <p>Tour 2 - Focus - Année <?php echo $annee;?></p>
                <?php } ?>
                <?php if ($step==3){ ?>
                <p>Tour 3 - M&A - Année <?php echo $annee;?></p>
                <?php } ?>
                <?php if ($step==4){ ?>
                <p>Tour 4 - Décisions financières - Année <?php echo $annee;?></p>
                <?php } ?>
                <a href="index.php#dashboard" class="btn btn-primary btn-xl page-scroll">Dashboard</a>
            </div>
        </div>
    </header>



   <?php if ($step==1){ ?>

    <section id="strategy" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Priorité stratégique</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="text-faded">Quelle est votre priorité pour l'année <?php echo $annee+1;?> ?</p>
                    </br>
                    <p class="text-faded">Une stratégie de croissance vous offrira 3 focus points, au prix d'un demi point de marges.</p>
                    </br>
                    <p class="text-faded">Une stratégie de marges vous fera gagner un demi point de marges, au prix de 3 focus points.</p>
                </div>
            </div>
        </div>


        <form action='decision.php' method="post" class="form-horizontal">
                <div class="container">
                    <select name="priority" class="form-control">
                        <option value="growth">La croissance</option>
                        <option value="margin">Les marges</option>
                        <option value="nothing">Stratégie équilibrée</option>
                    </select>
                    </br>
                    </br>
                    Mon identifiant :
                    <input class="form-control" name="identifiant" value=0>

                    </br>
                                
                    </br>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        
							<?php if($annee < 2020){ ?>
						<button type="submit" class="page-scroll btn btn-primary btn-xl sr-button">Prise de décision</a>
					<?php }else { ?>
					<button onclick="return false" class="page-scroll btn btn-primary btn-xl sr-button">Vous ne pouvez pas décider du prix</a>
					<?php } ?>
                    </div>
                </div>
        </form>
        <?php include 'traitementp1.php'; ?>

    </section>

   <?php } ?>

<?php if ($step==2){ ?>
   
   <section id="strategy" class="bg-dark">
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
                    <p class="text-faded">Sur quels secteurs et quelle région souhaitez-vous concentrer de façon prioritaire vos efforts pour l'année <?php echo $annee;?> ?</p>
                    </br>
                    <p class="text-faded">Focus point disponibles :</p></br>
                    <?php $req4 = $bdd->query("SELECT player, points FROM FocusPoints WHERE year = ".$annee." ORDER BY player ASC");
                    while ($donnees = $req4->fetch())
                    {
                            ?>Pour le joueur <?php echo $donnees['player']; ?>, <?php echo $donnees['points'];?> focus points.</br> <?php
                    }?>
                    </br>
                    </br>
                </div>
            </div>
        </div>


        <form action='decision.php' method="post" class="form-horizontal">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                            <td>#</td>
                            <td>North America</td>
                            <td>Europe/Middle-East/Africa</td>
                            <td>Asia</td>
                        </thead>
                        <tr>
                            <td>Consulting / System Integration - Old activities</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input11"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input12"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input13"></td>
                        </tr>
                        <tr>
                            <td>Consulting / System Integration - New activities</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input21"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input22"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input23"></td>
                        </tr>
                        <tr>
                            <td>IT outsourcing - Other</td>
                            <td><input type="number" class="form-control" placeholder="0" name="input31"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input32"></td>
                            <td><input type="number" class="form-control" placeholder="0" name="input33"></td>
                        </tr>
                        <tr>
                            <td>Infrastructure outsourcing</td>
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
                    </br>
                    </br>
                    Mon identifiant :
                    <input class="form-control" name="identifiant" value=0>

                    </br>
                        
                    </br>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        
						<?php if($annee < 2020){ ?>
                    <button type="submit" class="page-scroll btn btn-primary btn-xl sr-button">Prise de décision</a>
					<?php }else { ?>
					<button onclick="return false" class="page-scroll btn btn-primary btn-xl sr-button">Vous ne pouvez pas décider du prix</a>
					<?php } ?>
                    </div>
                </div>
        </form>
         <?php include 'traitementp2.php'; ?>



    </section>

<?php } ?>

   <?php if ($step==3){ ?>

<section class="bg-dark" id="strategy">
        <div class="container">
            <div class="row">
                    <?php
                        include 'MAtraitement.php';
                        
                    ?>
                <form method="post" class="col-lg-8 col-lg-offset-2 text-center" action='decision.php'>
                    <h2 class="section-heading">M&A : Entreprises à racheter</h2>
                    </br>
                    <h5>Ci-dessous, une liste d'entreprises que vous pourriez racheter. Pour chacune, émettez une offre, chiffrée en millions de dollars. Puis rentrez votre identifiant dans le formulaire en bas de la page. </h5>


                    <?php
                        $req = $bdd->query("SELECT id, year, nom, description, reservePrice, NA, EMEA, ROW, CS, NEW, OS, INFRA, BPO, margin FROM MnA WHERE year = ".$annee."");
                        
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
                                Entreprise réalisant :
                                <table class="table table-condensed">
                                    <thead>
                                        <td>North America</td>
                                        <td>Europe/Middle-East/Africa</td>
                                        <td>Asia</td>
                                    </thead>
                                    <tr>
                                        <td><?php echo $donnees["NA"];?> </td>
                                        <td><?php echo $donnees["EMEA"];?> </td>
                                        <td><?php echo $donnees["ROW"];?> </td>
                                    </tr>
                                </table>

                                <table class="table table-condensed">
                                    <thead>
                                        <td>Consulting</td>
                                        <td>Consulting - New</td>
                                        <td>Outsourcing</td>
                                        <td>OS - Infrastructure</td>
                                        <td>BPO</td>
                                    </thead>
                                    <tr>
                                        <td><?php echo $donnees["CS"];?> %</td>
                                        <td><?php echo $donnees["NEW"];?> %</td>
                                        <td><?php echo $donnees["OS"];?> %</td>
                                        <td><?php echo $donnees["INFRA"];?> %</td>
                                        <td><?php echo $donnees["BPO"];?> %</td>
                                    </tr>
                                </table>
                                </br>
                                Elle réalise le chiffre d'affaires total de 
                                    <?php
                                        $result=$donnees['NA']+$donnees['EMEA']+$donnees['BPO'];
                                        echo $result;
                                    ?> millions de dollars.
                                
                                </br>
                                Avec des marges opérationnelles de
                                <?php
                                    echo $donnees['margin'];
                                ?> %.
                                </br>
                                Soit le résultat opérationnel suivant :
                                <?php
                                    echo $result*$donnees['margin']/100;
                                ?> M$.
                                </br>
                                Prix de réserve (en Millions de dollars) : 
                                <?php
                                echo $donnees['reservePrice'];
                                ?> M$.
                                </br>
                                </br>
                                Je souhaiterais racheter cette entreprise pour (en Millions de dollars) :
                                <input type="number" class="form-control" name=<?php echo $donnees['id'];?> value=0>

                                </br>
                                Je souhaite, en cas de rachat, augmenter mon capital de (en Millions de dollars) :
                                <input type="number" class="form-control" name=<?php echo $donnees['id']."Cap";?> value=0>

                                </br>

                            </div>
                                <?php
                        }
                    ?>
                                </br>
                                </br>
                                Rentrez votre identifiant avant d'envoyer les offres d'achats :
                                <input class="form-control" name="identifiant" value=0>

                                </br>
                                </br>

                    </br>
                    
					<?php if($annee < 2020){ ?>
                    <button type="submit" class="page-scroll btn btn-dark btn-xl sr-button">Envoyer les offres d'achat</a>
					<?php }else { ?>
					<button onclick="return false" class="page-scroll btn btn-dark btn-xl sr-button">Vous ne pouvez pas envoyer d'offre d'achat</a>
					<?php } ?>
                </form>
            </div>
        </div>
    </section>

   <?php } ?>




   <?php if ($step==4) { ?>

<section class="bg-dark" id="strategy">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                    <?php
                        include 'bilan.php';
                    ?>

            

                <form method="post" class="col-lg-8 col-lg-offset-2 text-center" action='decision.php'>
                    <h2 class="section-heading">Décisions financières : dividendes, buyback.</h2>
                            <hr class="primary">
                            </br></br>

                    
                            <div class="col-lg-8 col-lg-offset-2 text-center">
                                
                                Je souhaiterais verser, pour chaque action, le dividende (en $) :
                                <input type="number" step="0.1" class="form-control" name="dividende" value=0>

                                </br>
                                Je souhaite consacrer le montant suivant (en M$) pour racheter des actions de ma société :
                                <input type="number" class="form-control" name="buyback" value=0>

                                </br>

                                </br>

                                </br>
                                </br>
                                Mon identifiant :
                                <input class="form-control" name="identifiant" value=0>

                                </br>
                                </br>

                    </br>
					<?php if($annee < 2020){ ?>
                    <button type="submit" class="page-scroll btn btn-dark btn-xl sr-button">Prise de décision</a>
					<?php }else { ?>
					<button onclick="return false" class="page-scroll btn btn-dark btn-xl sr-button">Vous ne pouvez pas prendre de décision</a>
					<?php } ?>
                </form>
            </div>
        </div>
    </section>


   <?php } ?>
   

   <?php if ($step==5) { ?>

<section class="bg-dark" id="strategy">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                    <?php
                        include 'price.php';
                    ?>

                <div class="row">
                    <h2 class="section-heading">Fin de l'année <?php echo $annee; ?>. Décision des marchés !</h2>
                    
                    </br>
                    </br>
                    
                </div>

                <form method="post" class="col-lg-8 col-lg-offset-2 text-center" action='decision.php'>
                    <h2 class="section-heading">Prix des actions :</h2>



                    
                            <div class="col-lg-8 col-lg-offset-2 text-center">
                                
                                Cap Gemini :
                                </br>
                                <?php 
                                $req = $bdd->query("SELECT player, year, step, nbActions, prix FROM Capital WHERE year = ".$annee." AND player = 1 AND step = 4");
                                while ($data = $req->fetch())
                                {
                                    $nb=$data['nbActions'];
                                    $prix=$data['prix'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 1 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 1 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $ebitPrec=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 1 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $dettePrec=$data['value'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 1 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }
                                ?>
                                Prix précédent : <?php echo $prix; ?> $/action.
                                </br>
                                Capitalisation actuelle : <?php echo $prix*$nb; ?> M$.
                                </br>
                                Multiple précédent :  <?php echo round(($prix*$nb+$dettePrec)/$ebitPrec,2); ?>.
                                </br>
                                Résultat opérationnel sur <?php echo $annee;?> :  <?php echo $ebit; ?> M$.
                                </br>
                                Dette nette sur <?php echo $annee;?> :  <?php echo $dette; ?> M$.
                                </br>
								<?php if($annee < 2020){ ?>
                                <input type="number" class="form-control" name="CG" value=0>
								<?php } ?>
                                </br>
                                Atos :
                                </br>
                                <?php 
                                $req = $bdd->query("SELECT player, year, step, nbActions, prix FROM Capital WHERE year = ".$annee." AND player = 2 AND step = 4");
                                while ($data = $req->fetch())
                                {
                                    $nb=$data['nbActions'];
                                    $prix=$data['prix'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 2 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 2 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $ebitPrec=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 2 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $dettePrec=$data['value'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 2 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }
                                ?>
                                Prix précédent : <?php echo $prix; ?> $/action.
                                </br>
                                Capitalisation actuelle : <?php echo $prix*$nb; ?> M$.
                                </br>
                                Multiple précédent :  <?php echo round(($prix*$nb+$dettePrec)/$ebitPrec,2); ?>.
                                </br>
                                Résultat opérationnel sur <?php echo $annee;?> :  <?php echo $ebit; ?> M$.
                                </br>
                                Dette nette sur <?php echo $annee;?> :  <?php echo $dette; ?> M$.
                                </br>
								<?php if($annee < 2020){ ?>
                                <input type="number" class="form-control" name="ATOS" value=0>
								 <?php } ?>	
                                </br>
                                Accenture :
                                </br>
                                <?php 
                                $req = $bdd->query("SELECT player, year, step, nbActions, prix FROM Capital WHERE year = ".$annee." AND player = 3 AND step = 4");
                                while ($data = $req->fetch())
                                {
                                    $nb=$data['nbActions'];
                                    $prix=$data['prix'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 3 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 3 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $ebitPrec=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 3 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $dettePrec=$data['value'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 3 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }
                                ?>
                                Prix précédent : <?php echo $prix; ?> $/action.
                                </br>
                                Capitalisation actuelle : <?php echo $prix*$nb; ?> M$.
                                </br>
                                Multiple précédent :  <?php echo round(($prix*$nb+$dettePrec)/$ebitPrec,2); ?>.
                                </br>
                                Résultat opérationnel sur <?php echo $annee;?> :  <?php echo $ebit; ?> M$.
                                </br>
                                Dette nette sur <?php echo $annee;?> :  <?php echo $dette; ?> M$.
                                </br>
								<?php if($annee < 2020){ ?>
                                <input type="number" class="form-control" name="ACCENTURE" value=0>
								<?php } ?>
                                </br>
                                TCS :
                                </br>
                                <?php 
                                $req = $bdd->query("SELECT player, year, step, nbActions, prix FROM Capital WHERE year = ".$annee." AND player = 4 AND step = 4");
                                while ($data = $req->fetch())
                                {
                                    $nb=$data['nbActions'];
                                    $prix=$data['prix'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 4 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $ebit=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND player = 4 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $ebitPrec=$data['EBIT'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 4 AND step = 1");
                                while ($data = $req->fetch())
                                {
                                    $dettePrec=$data['value'];
                                }
                                $req = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND player = 4 AND step = 3");
                                while ($data = $req->fetch())
                                {
                                    $dette=$data['value'];
                                }
                                ?>
                                Prix précédent : <?php echo $prix; ?> $/action.
                                </br>
                                Capitalisation actuelle : <?php echo $prix*$nb; ?> M$.
                                </br>
                                Multiple précédent :  <?php echo round(($prix*$nb+$dettePrec)/$ebitPrec,2); ?>.
                                </br>
                                Résultat opérationnel sur <?php echo $annee;?> :  <?php echo $ebit; ?> M$.
                                </br>
                                Dette nette sur <?php echo $annee;?> :  <?php echo $dette; ?> M$.
                                </br>
								<?php if($annee < 2020){ ?>
                                <input type="number" class="form-control" name="TCS" value=0>
								<?php } ?>									
                                
                                </br>

                                </br>

                                </br>
                                </br>
								<?php if($annee < 2020){ ?>
                                Mon identifiant :
                                <input class="form-control" name="identifiant" value=0>

                                </br>
                                </br>

                    </br>
                    <button type="submit" class="page-scroll btn btn-dark btn-xl sr-button">Passer à l'année suivante</a>
								<?php } else{ ?>
								<button onclick ="return false;" class="page-scroll btn btn-dark btn-xl sr-button">Vous ne pouvez pas passer à l'année prochaine</a>
								
								<?php } ?>
                </form>
            </div>
        </div>
    </section>


   <?php } ?>
   


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
