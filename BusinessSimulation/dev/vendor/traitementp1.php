<?php
    
    if (isset($_POST['identifiant']) AND isset($_POST['priority']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';
        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {
                $didPlay=0;
                $req = $bdd->query("SELECT player FROM FocusPoints WHERE year = ".$annee."");
                while ($donnees = $req->fetch())
                {
                    if($donnees['player']==$id)
                    {
                        $didPlay=1;
                    }
                }

                if ($didPlay==0)
                {
                    include 'getYear.php';

                    $priority=$_POST['priority'];

                    
                    echo 'got IT';
                    $req2 = $bdd->prepare('INSERT INTO FocusPoints(year, player, points) VALUES(:year, :player, :points)');

                    if($priority="growth"){
                        $req2->execute(array(
                                    'year' => $annee,
                                    'player' => $player,
                                    'points' => 9
                        ));

                        $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                        while ($donnees = $req4->fetch())
                        {
                            $NA=$donnees['NA'];
                            $EMEA=$donnees['EMEA'];
                            $ROW=$donnees['ROW'];
                        }

                        $req3=$bdd->prepare('UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=:year AND player=:id');
                        $req->execute(array(
                            'NA' => $NA-1,
                            'EMEA' => $EMEA-1,
                            'ROW' => $ROW-1,
                            'year' => $year,
                            'player' => $player
                        ));
                        
                    }
                    elseif($priority="margin")
                    {
                        $req2->execute(array(
                                'year' => $annee,
                                'player' => $player,
                                'points' => 3
                        ));

                        $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                        while ($donnees = $req4->fetch())
                        {
                            $NA=$donnees['NA'];
                            $EMEA=$donnees['EMEA'];
                            $ROW=$donnees['ROW'];
                        }

                        $req3=$bdd->prepare('UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=:year AND player=:id');
                        $req->execute(array(
                            'NA' => $NA+1,
                            'EMEA' => $EMEA+1,
                            'ROW' => $ROW+1,
                            'year' => $year,
                            'player' => $player
                        ));
                    }

                    else
                    {
                        $req2->execute(array(
                                'year' => $annee,
                                'player' => $player,
                                'points' => 6
                        ));
                    }
                
                }


                    $req = $bdd->query("SELECT player FROM FocusPoints WHERE year = ".$annee."");
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
                                        'step' => 2
                            ));
                    }
                }
        }
    
?>