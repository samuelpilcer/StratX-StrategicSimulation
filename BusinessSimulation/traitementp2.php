<?php
    

    if (isset($_POST['identifiant']) AND isset($_POST['input11']) AND isset($_POST['input12']) AND isset($_POST['input13']) AND isset($_POST['input21']) AND isset($_POST['input22']) AND isset($_POST['input23']) AND isset($_POST['input31']) AND isset($_POST['input32']) AND isset($_POST['input33']) AND isset($_POST['input41']) AND isset($_POST['input42']) AND isset($_POST['input43']) AND isset($_POST['input51']) AND isset($_POST['input52']) AND isset($_POST['input53']))
    {
        $id=$_POST['identifiant'];
        include 'player.php';


        if (($player == 1) OR ($player == 2) OR ($player ==3) OR ($player == 4))
        {

                $didPlay=0;
                $req4 = $bdd->query("SELECT player FROM Game WHERE year = ".$annee."");
                while ($donnees = $req4->fetch())
                {
                    if($donnees['player']==$id){$didPlay=1;}
                }

                if ($didPlay==0){


                    include 'getYear.php';


                    $totalEffort=0;
                    $req4 = $bdd->query("SELECT points FROM FocusPoints WHERE year = ".$annee." AND player = ".$player);
                    while ($donnees = $req4->fetch())
                    {
                            $totalEffort=$donnees['points'];
                    }

                    if ($_POST['input11']+$_POST['input12']+$_POST['input13']+$_POST['input21']+$_POST['input22']+$_POST['input23']+$_POST['input31']+$_POST['input32']+$_POST['input33']+$_POST['input41']+$_POST['input42']+$_POST['input43']+$_POST['input51']+$_POST['input52']+$_POST['input53']<=$totalEffort)
                    {
                        $req3 = $bdd->prepare('INSERT INTO Game(year, player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO) VALUES(:year, :player, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS,:ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)');
                        
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
                        if($donnees['player']==1){$CGplayed=1; }
                        if($donnees['player']==2){$Atosplayed=1; }
                        if($donnees['player']==3){$TCSplayed=1; }
                        if($donnees['player']==4){$Accentureplayed=1; }
                    }
                    if (($Accentureplayed==1) AND ($CGplayed==1) AND ($TCSplayed==1) AND ($Atosplayed==1))
                    {

                            //processer les points

                            $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Game WHERE year = ".$annee."");
                            $total=array(
                                "NA_CS" => 0,
                                "EMEA_CS" => 0,
                                "ROW_CS" => 0,
                                "NA_NEW" => 0,
                                "EMEA_NEW" => 0,
                                "ROW_NEW" => 0,
                                "NA_OS" => 0,
                                "EMEA_OS" => 0,
                                "ROW_OS" => 0,
                                "NA_INFRA" => 0,
                                "EMEA_INFRA" => 0,
                                "ROW_INFRA" => 0,
                                "NA_BPO" => 0,
                                "EMEA_BPO" => 0,
                                "ROW_BPO" => 0
                            );
                            while ($donnees = $req->fetch())
                            {
                                if ($donnees['NA_CS']>=1){$total['NA_CS']=$total['NA_CS']+1;}
                                if ($donnees['EMEA_CS']>=1){$total['EMEA_CS']=$total['EMEA_CS']+1;}
                                if ($donnees['ROW_CS']>=1){$total['ROW_CS']=$total['ROW_CS']+1;}
                                if ($donnees['NA_NEW']>=1){$total['NA_NEW']=$total['NA_NEW']+1;}
                                if ($donnees['EMEA_NEW']>=1){$total['EMEA_NEW']=$total['EMEA_NEW']+1;}
                                if ($donnees['ROW_NEW']>=1){$total['ROW_NEW']=$total['ROW_NEW']+1;}
                                if ($donnees['NA_OS']>=1){$total['NA_OS']=$total['NA_OS']+1;}
                                if ($donnees['EMEA_OS']>=1){$total['EMEA_OS']=$total['EMEA_OS']+1;}
                                if ($donnees['ROW_OS']>=1){$total['ROW_OS']=$total['ROW_OS']+1;}
                                if ($donnees['NA_INFRA']>=1){$total['NA_INFRA']=$total['NA_INFRA']+1;}
                                if ($donnees['EMEA_INFRA']>=1){$total['EMEA_INFRA']=$total['EMEA_INFRA']+1;}
                                if ($donnees['ROW_INFRA']>=1){$total['ROW_INFRA']=$total['ROW_INFRA']+1;}
                                if ($donnees['NA_BPO']>=1){$total['NA_BPO']=$total['NA_BPO']+1;}
                                if ($donnees['EMEA_BPO']>=1){$total['EMEA_BPO']=$total['EMEA_BPO']+1;}
                                if ($donnees['ROW_BPO']>=1){$total['ROW_BPO']=$total['ROW_BPO']+1;}
                            }

                          

                            $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Game WHERE year = ".$annee."");
                            while ($donnees = $req->fetch())
                            {
                                $req3 = $bdd->prepare('INSERT INTO Multiples(year, player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO) VALUES(:year, :player, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS,:ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)');
                        
                           
                                
                                $req3->execute(array(
                                            'year' => $annee,
                                            'player' => $donnees['player'],
                                            'NA_CS' => 1+$donnees['NA_CS']*(1-0.15*($total['NA_CS']-1)),
                                            'EMEA_CS' => 1+$donnees['EMEA_CS']*(1-0.15*($total['EMEA_CS']-1)),
                                            'ROW_CS' => 1+$donnees['ROW_CS']*(1-0.15*($total['ROW_CS']-1)),
                                            'NA_NEW' => 1+$donnees['NA_NEW']*(1-0.15*($total['NA_NEW']-1)),
                                            'EMEA_NEW' => 1+$donnees['EMEA_NEW']*(1-0.15*($total['EMEA_NEW']-1)),
                                            'ROW_NEW' => 1+$donnees['ROW_NEW']*(1-0.15*($total['ROW_NEW']-1)),
                                            'NA_OS' => 1+$donnees['NA_OS']*(1-0.15*($total['NA_OS']-1)),
                                            'EMEA_OS' => 1+$donnees['EMEA_OS']*(1-0.15*($total['EMEA_OS']-1)),
                                            'ROW_OS' => 1+$donnees['ROW_OS']*(1-0.15*($total['ROW_OS']-1)),
                                            'NA_INFRA' => 1/(1+$donnees['NA_INFRA']*(1-0.15*($total['NA_INFRA']-1))),
                                            'EMEA_INFRA' => 1/(1+$donnees['EMEA_INFRA']*(1-0.15*($total['EMEA_INFRA']-1))),
                                            'ROW_INFRA' => 1/(1+$donnees['ROW_INFRA']*(1-0.15*($total['ROW_INFRA']-1))),
                                            'NA_BPO' => 1+$donnees['NA_BPO']*(1-0.15*($total['NA_BPO']-1)),
                                            'EMEA_BPO' => 1+$donnees['EMEA_BPO']*(1-0.15*($total['EMEA_BPO']-1)),
                                            'ROW_BPO' => 1+$donnees['ROW_BPO']*(1-0.15*($total['ROW_BPO']-1))
                                ));


                                
                            }









// A COMPLETER. Fonctions Get_multiple et Get_growth
                            $req = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM GrowthRates WHERE year = ".$annee);
                            while ($donnees = $req->fetch())
                            {
                                $growth=array(
                                    "NA_CS" => $donnees["NA_CS"],
                                    "EMEA_CS" => $donnees["EMEA_CS"],
                                    "ROW_CS" => $donnees["ROW_CS"],
                                    "NA_NEW" => $donnees["NA_NEW"],
                                    "EMEA_NEW" => $donnees["EMEA_NEW"],
                                    "ROW_NEW" => $donnees["ROW_NEW"],
                                    "NA_OS" => $donnees["NA_OS"],
                                    "EMEA_OS" => $donnees["EMEA_OS"],
                                    "ROW_OS" => $donnees["ROW_OS"],
                                    "NA_INFRA" => $donnees["NA_INFRA"],
                                    "EMEA_INFRA" => $donnees["EMEA_INFRA"],
                                    "ROW_INFRA" => $donnees["ROW_INFRA"],
                                    "NA_BPO" => $donnees["NA_BPO"],
                                    "EMEA_BPO" => $donnees["EMEA_BPO"],
                                    "ROW_BPO" => $donnees["ROW_BPO"]
                                );
                            
                            }


                            $req = $bdd->query("SELECT player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Positions WHERE year = ".$annee." AND step = 0");
                            while ($positions = $req->fetch())
                            {
                        
                                
                                $req12 = $bdd->query("SELECT NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO FROM Multiples WHERE year = ".$annee." AND player=".$positions['player']);
                                

                                while ($data = $req12->fetch())
                                {
                                    $multiples=array(
                                        "NA_CS" => $data["NA_CS"],
                                        "EMEA_CS" => $data["EMEA_CS"],
                                        "ROW_CS" => $data["ROW_CS"],
                                        "NA_NEW" => $data["NA_NEW"],
                                        "EMEA_NEW" => $data["EMEA_NEW"],
                                        "ROW_NEW" => $data["ROW_NEW"],
                                        "NA_OS" => $data["NA_OS"],
                                        "EMEA_OS" => $data["EMEA_OS"],
                                        "ROW_OS" => $data["ROW_OS"],
                                        "NA_INFRA" => $data["NA_INFRA"],
                                        "EMEA_INFRA" => $data["EMEA_INFRA"],
                                        "ROW_INFRA" => $data["ROW_INFRA"],
                                        "NA_BPO" => $data["NA_BPO"],
                                        "EMEA_BPO" => $data["EMEA_BPO"],
                                        "ROW_BPO" => $data["ROW_BPO"]
                                    );
                                }
                                


                                $req3 = $bdd->prepare('INSERT INTO Positions(year, step, player, NA_CS, EMEA_CS, ROW_CS, NA_NEW, EMEA_NEW, ROW_NEW, NA_OS, EMEA_OS, ROW_OS, NA_INFRA, EMEA_INFRA, ROW_INFRA, NA_BPO, EMEA_BPO, ROW_BPO) VALUES(:year, :step, :player, :NA_CS, :EMEA_CS, :ROW_CS, :NA_NEW, :EMEA_NEW, :ROW_NEW, :NA_OS, :EMEA_OS,:ROW_OS, :NA_INFRA, :EMEA_INFRA, :ROW_INFRA, :NA_BPO, :EMEA_BPO, :ROW_BPO)');

//Step 1 : CA organique en fin d'année. 2016 --> Après le M&A.

                                $req3->execute(array(
                                            'year' => $annee,
                                            'step' => 1,
                                            'player' => $positions['player'],
                                            'NA_CS' => $positions['NA_CS']*(1+$growth["NA_CS"]*$multiples["NA_CS"]/100),
                                            'EMEA_CS' => $positions['EMEA_CS']*(1+$growth["EMEA_CS"]*$multiples['EMEA_CS']/100),
                                            'ROW_CS' => $positions['ROW_CS']*(1+$growth["ROW_CS"]*$multiples['ROW_CS']/100),
                                            'NA_NEW' => $positions['NA_NEW']*(1+$growth["NA_NEW"]*$multiples['NA_NEW']/100),
                                            'EMEA_NEW' => $positions['EMEA_NEW']*(1+$growth["EMEA_NEW"]*$multiples['EMEA_NEW']/100),
                                            'ROW_NEW' => $positions['ROW_NEW']*(1+$growth["ROW_NEW"]*$multiples['ROW_NEW']/100),
                                            'NA_OS' => $positions['NA_OS']*(1+$growth["NA_OS"]*$multiples['NA_OS']/100),
                                            'EMEA_OS' => $positions['EMEA_OS']*(1+$growth["EMEA_OS"]*$multiples['EMEA_OS']/100),
                                            'ROW_OS' => $positions['ROW_OS']*(1+$growth["ROW_OS"]*$multiples['ROW_OS']/100),
                                            'NA_INFRA' => $positions['NA_INFRA']*(1+$growth["NA_INFRA"]*$multiples['NA_INFRA']/100),
                                            'EMEA_INFRA' => $positions['EMEA_INFRA']*(1+$growth["EMEA_INFRA"]*$multiples['EMEA_INFRA']/100),
                                            'ROW_INFRA' => $positions['ROW_INFRA']*(1+$growth["ROW_INFRA"]*$multiples['ROW_INFRA']/100),
                                            'NA_BPO' => $positions['NA_BPO']*(1+$growth["NA_BPO"]*$multiples['NA_BPO']/100),
                                            'EMEA_BPO' => $positions['EMEA_BPO']*(1+$growth["EMEA_BPO"]*$multiples['EMEA_BPO']/100),
                                            'ROW_BPO' => $positions['ROW_BPO']*(1+$growth["ROW_BPO"]*$multiples['ROW_BPO']/100)
                                ));

                                $NA_CS = $positions['NA_CS']*(1+$growth["NA_CS"]*$multiples["NA_CS"]/100);
                                $EMEA_CS = $positions['EMEA_CS']*(1+$growth["EMEA_CS"]*$multiples['EMEA_CS']/100);
                                $ROW_CS = $positions['ROW_CS']*(1+$growth["ROW_CS"]*$multiples['ROW_CS']/100);
                                $NA_NEW = $positions['NA_NEW']*(1+$growth["NA_NEW"]*$multiples['NA_NEW']/100);
                                $EMEA_NEW = $positions['EMEA_NEW']*(1+$growth["EMEA_NEW"]*$multiples['EMEA_NEW']/100);
                                $ROW_NEW = $positions['ROW_NEW']*(1+$growth["ROW_NEW"]*$multiples['ROW_NEW']/100);
                                $NA_OS = $positions['NA_OS']*(1+$growth["NA_OS"]*$multiples['NA_OS']/100);
                                $EMEA_OS = $positions['EMEA_OS']*(1+$growth["EMEA_OS"]*$multiples['EMEA_OS']/100);
                                $ROW_OS = $positions['ROW_OS']*(1+$growth["ROW_OS"]*$multiples['ROW_OS']/100);
                                $NA_INFRA = $positions['NA_INFRA']*(1+$growth["NA_INFRA"]*$multiples['NA_INFRA']/100);
                                $EMEA_INFRA = $positions['EMEA_INFRA']*(1+$growth["EMEA_INFRA"]*$multiples['EMEA_INFRA']/100);
                                $ROW_INFRA = $positions['ROW_INFRA']*(1+$growth["ROW_INFRA"]*$multiples['ROW_INFRA']/100);
                                $NA_BPO = $positions['NA_BPO']*(1+$growth["NA_BPO"]*$multiples['NA_BPO']/100);
                                $EMEA_BPO = $positions['EMEA_BPO']*(1+$growth["EMEA_BPO"]*$multiples['EMEA_BPO']/100);
                                $ROW_BPO = $positions['ROW_BPO']*(1+$growth["ROW_BPO"]*$multiples['ROW_BPO']/100);



                                $req16 = $bdd->query("SELECT NA, EMEA, ROW FROM Margin WHERE year = ".$annee." AND player = ".$positions['player']);
                                
                                $margin=array(
                                        'NA' => 0,
                                        'EMEA' => 0,
                                        'ROW' => 0
                                    );

                                while ($mgn = $req16->fetch())
                                {
                                    $margin['NA']=$mgn['NA'];
                                    $margin['EMEA']=$mgn['EMEA'];
                                    $margin['ROW']=$mgn['ROW'];
                                }



                                $req5 = $bdd->prepare('INSERT INTO EBIT(year, player, step, EBIT) VALUES(:year, :player, :step, :EBIT)');
                        
                                
                                $req5->execute(array(
                                    'year' => $annee,
                                    'player' => $positions['player'],
                                    'step' => 2,
                                    'EBIT' => ($margin['NA']*($NA_CS+$NA_NEW+$NA_OS+$NA_INFRA+$NA_BPO) + $margin['EMEA']*($EMEA_CS+$EMEA_NEW+$EMEA_OS+$EMEA_INFRA+$EMEA_BPO) + $margin['ROW']*($ROW_CS+$ROW_NEW+$ROW_OS+$ROW_INFRA+$ROW_BPO))/100
                                ));


                            }
                            







                            $req4 = $bdd->prepare('INSERT INTO EndYear(year,step) VALUES(:year, :step)');
                            $req4->execute(array(
                                        'year' => $annee,
                                        'step' => 3
                            ));
                    }
                }
        }
    }
?>