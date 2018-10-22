<?php
    
    echo "Fichier traitement bien inclus !";

    if (isset($_POST['identifiant']) AND isset($_POST['input11']) AND isset($_POST['input12']) AND isset($_POST['input13']) AND isset($_POST['input21']) AND isset($_POST['input22']) AND isset($_POST['input23']) AND isset($_POST['input31']) AND isset($_POST['input32']) AND isset($_POST['input33']) AND isset($_POST['input41']) AND isset($_POST['input42']) AND isset($_POST['input43']) AND isset($_POST['input51']) AND isset($_POST['input52']) AND isset($_POST['input53']))
    {
        echo " OK !";
        $id=$_POST['identifiant'];
        include 'player.php';


        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {

                echo " OK player valide ! ";

                $didPlay=0;
                $req4 = $bdd->query("SELECT player FROM Bet WHERE year = ".$annee."");
                while ($donnees = $req4->fetch())
                {
                    if($donnees['player']==$id){$didPlay=1;}
                }

                if ($didPlay==0){

                    echo "Pas encore joué. OK ! ";

                    include 'getYear.php';


                    $totalEffort=0;
                    $req4 = $bdd->query("SELECT points FROM FocusPoints WHERE year = ".$annee." AND player = ".$player);
                    while ($donnees = $req4->fetch())
                    {
                            $totalEffort=$donnees['points'];
                            echo "FP total : ".$totelEffort;
                    }

                    if ($_POST['input11']+$_POST['input12']+$_POST['input13']+$_POST['input21']+$_POST['input22']+$_POST['input23']+$_POST['input31']+$_POST['input32']+$_POST['input33']+$_POST['input41']+$_POST['input42']+$_POST['input43']+$_POST['input51']+$_POST['input52']+$_POST['input53']<=$totalEffort)
                    {
                        echo "Ok pour rajouter en base le jeu proposé ! ";
                        $req3 = $bdd->prepare('INSERT INTO EndYear(year,player,NA_CS,EMEA_CS,ROW_CS,NA_NEW,EMEA_NEW,ROW_NEW,NA_OS,EMEA_OS,ROW_OS,NA_INFRA,EMEA_INFRA,ROW_INFRA,NA_BPO,EMEA_BPO,ROW_BPO) VALUES(:year, :step, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS,:ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)');
                        $req3->execute(array(
                                    'year' => $annee,
                                    'player' => $player,
                                    'NA_CS' => $_POST['input11'],
                                    'EMEA_CS' => $_POST['input12'],
                                    'ROW_CS' => $_POST['input13'],
                                    'NA_NEW' => $_POST['input21'],
                                    'EMEA_NEW' => $_POST['input22'],
                                    'ROW_NEW' => $_POST['input23'],
                                    'NA_OS' => $_POST['input31'],
                                    'EMEA_OS' => $_POST['input32'],
                                    'ROW_OS' => $_POST['input33'],
                                    'NA_INFRA' => $_POST['input41'],
                                    'EMEA_INFRA' => $_POST['input42'],
                                    'ROW_INFRA' => $_POST['input43'],
                                    'NA_BPO' => $_POST['input51'],
                                    'EMEA_BPO' => $_POST['input52'],
                                    'ROW_BPO' => $_POST['input53']
                        ));
                    }


                    

                    $req = $bdd->query("SELECT player FROM Game WHERE year = ".$annee."");
                    $CGplayed=0;
                    $Atosplayed=0;
                    $TCSplayed=0;
                    $Accentureplayed=0;
                    while ($donnees = $req->fetch())
                    {
                        if($donnees['player']==1){$CGplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==2){$Atosplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==3){$TCSplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==4){$Accentureplayed=1; print $donnees['player']." a joué. ";}
                    }
                    if (($Accentureplayed==1) AND ($CGplayed==1) AND ($TCSplayed==1) AND ($Atosplayed==1))
                    {

                            //processer les points


                            $req3 = $bdd->prepare('INSERT INTO EndYear(year,step) VALUES(:year, :step)');
                            $req3->execute(array(
                                        'year' => $annee,
                                        'step' => 3
                            ));
                    }
                }
        }
    }
?>