<?php
    
    if (isset($_POST['identifiant']) AND isset($_POST['dividendes']) AND isset($_POST['buyback']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';
        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {
                echo "On y est. ";
                $didPlay=0;
                $req4 = $bdd->query("SELECT player FROM Capital WHERE year = ".$annee." AND step = 4");
                while ($donnees = $req4->fetch())
                {
                    if($donnees['player']==$id){$didPlay=1;}
                }

                if ($didPlay==0){
                    echo "OK ";
                    include 'getYear.php';

                    $req = $bdd->query("SELECT nbActions, dividende, prix FROM Capital WHERE year = ".$annee." AND step = 4 AND player = ".$player);
                    while ($donnees = $req->fetch())
                    {
                        echo "Capital nb actions : ".$donnees["nbActions"];
                        $req2 = $bdd->prepare('INSERT INTO Capital(player, year, step, nbActions, dividende, prix) VALUES(:player, :year, :step, :nbActions, :dividende, :prix)');
                        $req2->execute(array(
                                    'player' => $player,
                                    'year' => $annee,
                                    'step' => 4,
                                    'nbActions' => $donnees["nbActions"]-$_POST["buybacks"],
                                    'dividende' => $_POST["dividende"],
                                    'prix' => $donnees["prix"]
                        ));

                        $req10 = $bdd->query("SELECT value FROM Dette WHERE year = ".$annee." AND step = 3 AND player = ".$i);

                        while ($dette = $req10->fetch())
                        {
                            echo "Dette update ! ";
                            // Calcul EBIT, FCF, intégration dans la dette des revenus puis des dividendes / buybacks

                            $req11 = $bdd->prepare("UPDATE Dette SET value=:value WHERE player = ".$i." AND year = ".$annee." AND step = 3");
                            $req11->execute(array(
                                                'value' => $dette['value'] + $_POST["buybacks"] + $_POST["dividende"]*$donnees['nbActions']
                                    ));
                            
                            $req20 = $bdd->query("SELECT EBIT FROM EBIT WHERE year = ".$annee." AND step = 3 AND player = ".$player);
                            while ($ebit = $req20->fetch())
                            {
                                $req21 = $bdd->prepare("UPDATE Dette SET value=:value WHERE player = ".$i." AND year = ".$annee." AND step = 3");
                                $req21->execute(array(
                                                    'value' => $dette['value'] - $ebit['EBIT']*(1-0.3)
                                        ));
                                        echo "Second update ! ";
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
                        if($donnees['player']==1){$CGplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==2){$Atosplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==3){$TCSplayed=1; print $donnees['player']." a joué. ";}
                        if($donnees['player']==4){$Accentureplayed=1; print $donnees['player']." a joué. ";}
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