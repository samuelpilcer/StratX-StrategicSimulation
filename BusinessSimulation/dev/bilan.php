<?php
    
    if (isset($_POST['identifiant']) AND isset($_POST['dividende']) AND isset($_POST['buyback']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';
        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {
                
                $didPlay=0;
                $req4 = $bdd->query("SELECT player FROM Capital WHERE year = ".$annee." AND step = 4");
                while ($donnees = $req4->fetch())
                {
                    if($donnees['player']==$player){$didPlay=1;}
                }

                if ($didPlay==0){
                    include 'getYear.php';

                    $req = $bdd->query("SELECT nbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND step = 3 AND player = ".$player);
                    while ($donnees = $req->fetch())
                    {
                        
                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => $player,
                                    'year' => $annee,
                                    'step' => 4,
                                    'nbActions' => $donnees["nbActions"]-$_POST["buyback"]/$donnees["prix"],
                                    'dividende' => $_POST["dividende"],
                                    'prix' => $donnees["prix"]
                        ));

                        $req10 = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND step = 3 AND player = ".$player);

                        while ($dette = $req10->fetch())
                        {
                            // Calcul EBIT, FCF, intégration dans la dette des revenus puis des dividendes / buybacks
                            $endett=$dette['value'] + $_POST["buyback"] + $_POST["dividende"]*($donnees["nbActions"]-$_POST["buyback"]/$donnees["prix"]);

                           

                            $req20 = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND step = 3 AND player = ".$player);
                            while ($ebit = $req20->fetch())
                            {
                                $req21 = $bdd->prepare("UPDATE Dette SET value=:value WHERE player = ".$player." AND year = ".$annee." AND step = 3");
                                $req21->execute(array(
                                                    'value' => $endett - $ebit['EBIT']*(0.78)
                                        ));
                            }
                        }
   
                    }





                    $req = $bdd->query("SELECT player FROM Capital WHERE year = ".$annee." AND step = 4");
                    $CGplayed=0;
                    $Atosplayed=0;
                    $TCSplayed=0;
                    $Accentureplayed=0;
                    while ($donnees = $req->fetch())
                    {
                        if($donnees['player']==1){$CGplayed=1; }
                        if($donnees['player']==2){$Atosplayed=1; }
                        if($donnees['player']==3){$TCSplayed=1; }
                        if($donnees['player']==4){$Accentureplayed=1; }
                    }
                    if (($Accentureplayed==1) AND ($CGplayed==1) AND ($TCSplayed==1) AND ($Atosplayed==1))
                    {
                            $req3 = $bdd->prepare('INSERT INTO EndYear(year,step) VALUES(:year, :step)');
                            $req3->execute(array(
                                        'year' => $annee,
                                        'step' => 5
                            ));
                    }
                }
        }
    }
?>