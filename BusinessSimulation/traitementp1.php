<?php
    
    if (isset($_POST['identifiant']) AND isset($_POST['priority']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';
        if (($player == 1) OR ($player == 2) OR ($player ==3))
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
                    
                    $req2 = $bdd->prepare('INSERT INTO FocusPoints(year, player, points, priority) VALUES(:year, :player, :points, :priority)');

                    if($priority=="growth"){
                        $req2->execute(array(
                                    'year' => $annee,
                                    'player' => $player,
                                    'points' => 9,
                                    'priority' => $priority

                        ));

                        $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                        while ($donnees = $req4->fetch())
                        {
                            $NA=$donnees['NA'];
                            $EMEA=$donnees['EMEA'];
                            $ROW=$donnees['ROW'];
                        }

                        $req10=$bdd->prepare("UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=".$annee." AND player=".$player."");
                        $req10->execute(array(
                            'NA' => $NA-0.5,
                            'EMEA' => $EMEA-0.5,
                            'ROW' => $ROW-0.5
                        ));   
                    }

                    elseif($priority=="margin")
                    {
                        $req2->execute(array(
                                'year' => $annee,
                                'player' => $player,
                                'points' => 3,
                                'priority' => $priority
                        ));

                        $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                        while ($donnees = $req4->fetch())
                        {
                            $NA=$donnees['NA'];
                            $EMEA=$donnees['EMEA'];
                            $ROW=$donnees['ROW'];
                        }

                        $req10=$bdd->prepare("UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=".$annee." AND player=".$player."");
                        $req10->execute(array(
                            'NA' => $NA+0.5,
                            'EMEA' => $EMEA+0.5,
                            'ROW' => $ROW+0.5
                        ));
                    }

                    else
                    {
                        $req2->execute(array(
                                'year' => $annee,
                                'player' => $player,
                                'points' => 6,
                                'priority' => $priority
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
                                        'step' => 2
                            ));
                    }
                }
                if ($player==4)
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
                        
                        
                        $req2 = $bdd->prepare('INSERT INTO FocusPoints(year, player, points, priority) VALUES(:year, :player, :points, :priority)');

                        if($priority=="growth"){
                            $req2->execute(array(
                                        'year' => $annee,
                                        'player' => $player,
                                        'points' => 18,
                                        'priority' => $priority

                            ));

                            $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                            while ($donnees = $req4->fetch())
                            {
                                $NA=$donnees['NA'];
                                $EMEA=$donnees['EMEA'];
                                $ROW=$donnees['ROW'];
                            }

                            $req10=$bdd->prepare("UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=".$annee." AND player=".$player."");
                            $req10->execute(array(
                                'NA' => $NA-0.5,
                                'EMEA' => $EMEA-0.5,
                                'ROW' => $ROW-0.5
                            ));   
                        }

                        elseif($priority=="margin")
                        {
                            $req2->execute(array(
                                    'year' => $annee,
                                    'player' => $player,
                                    'points' => 12,
                                    'priority' => $priority
                            ));

                            $req4 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$player);
                            while ($donnees = $req4->fetch())
                            {
                                $NA=$donnees['NA'];
                                $EMEA=$donnees['EMEA'];
                                $ROW=$donnees['ROW'];
                            }

                            $req10=$bdd->prepare("UPDATE Margin SET NA=:NA, EMEA=:EMEA, ROW=:ROW WHERE year=".$annee." AND player=".$player."");
                            $req10->execute(array(
                                'NA' => $NA+0.5,
                                'EMEA' => $EMEA+0.5,
                                'ROW' => $ROW+0.5
                            ));
                        }

                        else
                        {
                            $req2->execute(array(
                                    'year' => $annee,
                                    'player' => $player,
                                    'points' => 15,
                                    'priority' => $priority
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
                                            'step' => 2
                                ));
                        }
                }
        }
    
?>